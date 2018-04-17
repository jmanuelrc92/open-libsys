<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $sur_name
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
        'middle_name' => true,
        'last_name' => true,
        'sur_name' => true,
        'created' => true,
        'modified' => true,
        'authors' => true,
        'users' => true
    ];
    
    protected function _getInformalName()
    {
        $informalName = $this->first_name;
        if ($this->middle_name!= '' && !is_null($this->middle_name)) {
            $informalName.=' '.$this->middle_name;
        }
        
        $informalName.=' '.$this->last_name;
        if ($this->sur_name!= '' && !is_null($this->sur_name)) {
            $informalName.=' '.$this->sur_name;
        }
        
        return $informalName;
    }
    
    protected function _getFormalName()
    {
        $formalName = $this->last_name;
        if ($this->sur_name!= '' && !is_null($this->sur_name)) {
            $formalName.=' '.$this->sur_name;
        }
        
        $formalName .= ', '.$this->first_name;
        if ($this->middle_name!= '' && !is_null($this->middle_name)) {
            $formalName.=' '.$this->middle_name;
        }
        
        return $formalName;
    }
}
