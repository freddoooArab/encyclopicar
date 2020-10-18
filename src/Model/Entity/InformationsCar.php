<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InformationsCar Entity
 *
 * @property int $id
 * @property int $cars_id
 * @property int $informations_id
 *
 * @property \App\Model\Entity\Car $car
 * @property \App\Model\Entity\Information $information
 */
class InformationsCar extends Entity
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
        'cars_id' => true,
        'informations_id' => true,
        'car' => true,
        'information' => true,
    ];
}
