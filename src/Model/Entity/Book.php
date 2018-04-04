<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property string $title
 * @property string $isbn_code
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted_at
 *
 * @property \App\Model\Entity\BookInventory[] $book_inventories
 * @property \App\Model\Entity\Author[] $authors
 */
class Book extends Entity
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
        'title' => true,
        'isbn_code' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'deleted_at' => true,
        'book_inventories' => true,
        'authors' => true
    ];
}
