<?php
namespace App\Model\Table;

use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BookInventories Model
 *
 * @property \App\Model\Table\BooksTable|\Cake\ORM\Association\BelongsTo $Books
 * @property \App\Model\Table\LocationsTable|\Cake\ORM\Association\BelongsTo $Locations
 * @property |\Cake\ORM\Association\HasMany $LoanDetails
 *
 * @method \App\Model\Entity\BookInventory get($primaryKey, $options = [])
 * @method \App\Model\Entity\BookInventory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BookInventory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BookInventory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookInventory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BookInventory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BookInventory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BookInventoriesTable extends Table
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

        $this->setTable('book_inventories');
        $this->setDisplayField('serial');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('LoanDetails', [
            'foreignKey' => 'book_inventory_id'
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
            ->boolean('available')
            ->requirePresence('available', 'create')
            ->notEmpty('available');

        $validator
            ->scalar('serial')
            ->maxLength('serial', 20)
            ->requirePresence('serial', 'create')
            ->notEmpty('serial');

        $validator
            ->dateTime('deleted_at')
            ->allowEmpty('deleted_at');

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
        $rules->add($rules->existsIn(['book_id'], 'Books'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
    
    public function beforeMarshal(Event $event, \ArrayObject $data, \ArrayObject $options)
    {
        if (!array_key_exists('serial', $data)) {
            $consecutiveBookNumber = $this->find('all')
            ->select(['serial'])
            ->where([
                    'book_id' => $data['book_id']
            ])->count();
            $consecutiveBookNumber = ($consecutiveBookNumber == 0) ? 1 : $consecutiveBookNumber + 1;
            $data['serial'] = date('y.m') . '.' . $data['book_id'] . '.' . $consecutiveBookNumber;
        }
        $data['available'] = true;
    }
    
}
