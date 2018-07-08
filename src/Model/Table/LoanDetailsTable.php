<?php
namespace App\Model\Table;

use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use ArrayObject;
use Cake\ORM\TableRegistry;

/**
 * LoanDetails Model
 *
 * @property \App\Model\Table\LoansTable|\Cake\ORM\Association\BelongsTo $Loans
 * @property \App\Model\Table\BookInventoriesTable|\Cake\ORM\Association\BelongsTo $BookInventories
 *
 * @method \App\Model\Entity\LoanDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\LoanDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LoanDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LoanDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LoanDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LoanDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LoanDetail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LoanDetailsTable extends Table
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

        $this->setTable('loan_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Loans', [
            'foreignKey' => 'loan_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('BookInventories', [
            'foreignKey' => 'book_inventory_id',
            'joinType' => 'INNER'
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
            ->scalar('id')
            ->maxLength('id', 20)
            ->allowEmpty('id', 'create');

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
        $rules->add($rules->existsIn(['loan_id'], 'Loans'));
        $rules->add($rules->existsIn(['book_inventory_id'], 'BookInventories'));

        return $rules;
    }
    
    public function afterSave(Event $event, EntityInterface $entity, ArrayObject $options)
    {
        $loan = TableRegistry::get('Loans')->get($entity->loan_id);
        $bookInventory = $this->BookInventories->get($entity->book_inventory_id);
        $bookInventory->available = $loan->active_loan;
        $this->BookInventories->save($bookInventory);
    }
}
