<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Author[] $authors
 * @property \App\Model\Entity\User[] $users
 */
class Person extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'created' => true,
        'modified' => true,
        'authors' => true,
        'users' => true
    ];
    
    protected $_virtual = [
        'informal_name',
        'formal_name'
    ];
    
    protected function _getInformalName()
    {
        return $this->first_name.' '.$this->last_name;
    }
    
    protected function _getFormalName()
    {
        return $this->last_name.', '.$this->first_name;
    }
}
