<?php
namespace App\Model\Entity;

use App\AppConfiguration\Templates;
use Cake\ORM\Entity;

/**
 * Loan Entity
 *
 * @property int $id
 * @property int $user_id
 * @property bool $active_loan
 * @property bool $expired_loan
 * @property \Cake\I18n\FrozenDate $loan_date_start
 * @property \Cake\I18n\FrozenDate $loan_date_end
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
        'active_loan' => true,
        'expired_loan' => true,
        'loan_date_start' => true,
        'loan_date_end' => true,
        'user' => true,
        'book_inventory' => true
    ];
    
    protected function _getLoanDateStart($loan_date_start)
    {
        $dateObject = date_create($loan_date_start);
        return date_format($dateObject, Templates::DATETIME_FORMAT);
    }
    
    protected function _getLoanDateEnd($loan_date_end)
    {
        $dateObject = date_create($loan_date_end);
        return date_format($dateObject, Templates::DATETIME_FORMAT);
    }
}
