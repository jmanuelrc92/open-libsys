<?php
namespace App\Model\Entity;

use App\AppConfiguration\Templates;
use Cake\ORM\Entity;

/**
 * BookInventory Entity
 *
 * @property int $id
 * @property int $book_id
 * @property bool $available
 * @property int $location_id
 * @property string $serial
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted_at
 *
 * @property \App\Model\Entity\Book $book
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Loan[] $loans
 */
class BookInventory extends Entity
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
        'book_id' => true,
        'available' => true,
        'location_id' => true,
        'serial' => true,
        'created' => true,
        'modified' => true,
        'deleted_at' => true,
        'book' => true,
        'location' => true,
        'loans' => true
    ];
    
    protected function _getModified($modified)
    {
        $dateObject = date_create($modified);
        return date_format($dateObject, Templates::DATETIME_FORMAT);
    }
    
}
