<?php
namespace App\Model\Table;

use App\Model\Entity\Book;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuthorsBooks Model
 *
 * @property \App\Model\Table\AuthorsTable|\Cake\ORM\Association\BelongsTo $Authors
 * @property \App\Model\Table\BooksTable|\Cake\ORM\Association\BelongsTo $Books
 *
 * @method \App\Model\Entity\AuthorsBook get($primaryKey, $options = [])
 * @method \App\Model\Entity\AuthorsBook newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AuthorsBook[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AuthorsBook|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AuthorsBook patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AuthorsBook[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AuthorsBook findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuthorsBooksTable extends Table
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

        $this->setTable('authors_books');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Authors', [
            'foreignKey' => 'author_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
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
        $rules->add($rules->existsIn(['author_id'], 'Authors'));
        $rules->add($rules->existsIn(['book_id'], 'Books'));

        return $rules;
    }
    
    public function _saveAuthorsForBook(Book $book, array $authors)
    {
        $data = [];
        $this->deleteAll(['book_id' => $book->id]);
        foreach ($authors as $author) {
            $data[] = [
                'id' => $author.'-'.$book->id,
                'book_id' => $book->id,
                'author_id' => $author,
                'created' => date('Y-m-d H:i:s')
            ];
        }
        $authorsBooks = $this->newEntities($data);
        return $this->saveMany($authorsBooks);
    }
}
