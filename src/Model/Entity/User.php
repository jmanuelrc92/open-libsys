<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use App\AppConfiguration\Templates;

/**
 * User Entity
 *
 * @property int $id
 * @property int $person_id
 * @property string $username
 * @property string $password
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $role_id
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Loan[] $loans
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'created' => true,
        'modified' => true,
        'role_id' => true,
        'person' => true,
        'role' => true,
        'loans' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    
    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
    
    protected  function _getCreated($created)
    {
        $dateObject = date_create($created); 
        return date_format($dateObject, Templates::DATETIME_FORMAT);
    }
}
