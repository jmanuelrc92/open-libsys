<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Author Entity
 *
 * @property int $id
 * @property int $person_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Book[] $books
 * @property \App\Model\Entity\PublishingHouse[] $publishing_houses
 */
class Author extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'person_id' => true,
        'created' => true,
        'modified' => true,
        'person' => true,
        'books' => true,
        'publishing_houses' => true
    ];
    
    public function _getFullName()
    {
        $person = TableRegistry::get('people')->get($this->person_id);
        return $person->last_name.' '.$person->sur_name.', '.$person->first_name.' '.$person->middle_name;
    }
}
