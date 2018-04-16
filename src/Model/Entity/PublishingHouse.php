<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PublishingHouse Entity
 *
 * @property int $id
 * @property string $publishing_house_name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted_at
 *
 * @property \App\Model\Entity\Author[] $authors
 */
class PublishingHouse extends Entity
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
        'publishing_house_name' => true,
        'created' => true,
        'modified' => true,
        'deleted_at' => true,
        'authors' => true
    ];
}
