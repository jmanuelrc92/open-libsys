<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LoanDetail Entity
 *
 * @property string $id
 * @property int $loan_id
 * @property int $book_inventory_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Loan $loan
 * @property \App\Model\Entity\BookInventory $book_inventory
 */
class LoanDetail extends Entity
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
        'loan_id' => true,
        'book_inventory_id' => true,
        'created' => true,
        'loan' => true,
        'book_inventory' => true,
        'id' => true
    ];
    
}
