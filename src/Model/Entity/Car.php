<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Car Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $brand
 * @property int $model
 * @property float $price
 * @property string $description
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Photo[] $photos
 * @property \App\Model\Entity\Information[] $informations
 */
class Car extends Entity
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
        'brand' => true,
        'model' => true,
        'price' => true,
        'slug' => true,
        'description' => true,
        'user' => true,
        'photos' => true,
        'informations' => true,
    ];
}
