<?php
namespace App\Model\Table;

use App\AppConfiguration\Templates;
use App\Model\Entity\Loan;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Loans Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property |\Cake\ORM\Association\HasMany $LoanDetails
 *
 * @method \App\Model\Entity\Loan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Loan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Loan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Loan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Loan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Loan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Loan findOrCreate($search, callable $callback = null, $options = [])
 */
class LoansTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('loans');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('LoanDetails', [
            'foreignKey' => 'loan_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('active_loan')
            ->requirePresence('active_loan', 'create')
            ->notEmpty('active_loan');

        $validator
            ->boolean('expired_loan')
            ->notEmpty('expired_loan');

        $validator
            ->date('loan_date_end')
            ->requirePresence('loan_date_end', 'create')
            ->notEmpty('loan_date_end');

        $validator
            ->date('loan_date_start')
            ->requirePresence('loan_date_start', 'create')
            ->notEmpty('loan_date_start');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
    
    //2018-07-08 @jmrc92
    //function that save the detail of bookInventories
    public function saveDetails(Loan $loan, array $data, string $action)
    {
        $loanDetailsTable = TableRegistry::get('LoanDetails');
        $bookInventoryTable = TableRegistry::get('BookInventories');
        //if the action that invokes the function is edit, just make the inventorie available again
        if ($action == 'edit') {
            foreach ($data as $loanDetail) {
                $bookInventory = $bookInventoryTable->get($loanDetail['book_inventory_id']);
                $bookInventory->available = !$loan->active_loan;
                $bookInventoryTable->save($bookInventory);
            }
        } elseif ($action == 'add') {
            //if the action is add, it fetch the inventories table to get the id, and make the relational table
            //between inventories and detail
            $bookInventoryTable = TableRegistry::get('BookInventories');
            $loanDetailsData = [];
            foreach ($data as $detail) {
                if ($detail['serial'] != null) {
                    $bookInventory = $bookInventoryTable->findBySerial($detail['serial'])->first();
                    $loanDetailsData[] = [
                        'loan_id' => $loan->id,
                        'book_inventory_id' => $bookInventory['id'],
                        'id' => $loan->id.'-'.$bookInventory['id']
                    ];
                }
            }
            $loanDetails = $loanDetailsTable->newEntities($loanDetailsData);
            return $loanDetailsTable->saveMany($loanDetails);
        }        
    }
    
    public function beforeMarshal (Event $event, \ArrayObject $data, \ArrayObject $options)
    {
        if (!isset($data['loan_date_start'])) {
            $data['loan_date_start'] = date(Templates::DATE_FORMAT, time());
        }
        if (!isset($data['active_loan'])) {
            $data['active_loan'] = true;
        }
    }
    
    //2018-07-08 @jmrc92 custom finder for execute a query that fetch loans table for expiredloans
    public function findExpiredLoans(Query $query, array $config)
    {
        return $query->where([
                'active_loan' => true,
                'expired_loan' => true
        ])->orderAsc('loan_date_end');
    }
}
