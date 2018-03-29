<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PublishingHouses Model
 *
 * @property \App\Model\Table\AuthorsTable|\Cake\ORM\Association\BelongsToMany $Authors
 *
 * @method \App\Model\Entity\PublishingHouse get($primaryKey, $options = [])
 * @method \App\Model\Entity\PublishingHouse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PublishingHouse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PublishingHouse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PublishingHouse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PublishingHouse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PublishingHouse findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PublishingHousesTable extends Table
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

        $this->setTable('publishing_houses');
        $this->setDisplayField('publishing_house_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Authors', [
            'foreignKey' => 'publishing_house_id',
            'targetForeignKey' => 'author_id',
            'joinTable' => 'authors_publishing_houses'
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
            ->scalar('publishing_house_name')
            ->maxLength('publishing_house_name', 250)
            ->requirePresence('publishing_house_name', 'create')
            ->notEmpty('publishing_house_name');

        return $validator;
    }
}
