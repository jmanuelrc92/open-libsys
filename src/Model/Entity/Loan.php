<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Loan Entity
 *
 * @property string $id
 * @property int $user_id
 * @property string $book_inventory_id
 * @property \Cake\I18n\FrozenTime $loan_date_start
 * @property \Cake\I18n\FrozenTime $loan_date_end
 * @property bool $active_loan
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\BookInventory $book_inventory
 */
class Loan extends Entity
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
        'user_id' => true,
        'book_inventory_id' => true,
        'loan_date_start' => true,
        'loan_date_end' => true,
        'active_loan' => true,
        'user' => true,
        'book_inventory' => true
    ];
}
