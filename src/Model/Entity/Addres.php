<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Addres Entity.
 *
 * @property int $id
 * @property int $departamento_id
 * @property \App\Model\Entity\Departamento $departamento
 * @property int $provincia_id
 * @property \App\Model\Entity\Provincia $provincia
 * @property int $distrito_id
 * @property \App\Model\Entity\Distrito $distrito
 * @property string $zona
 * @property string $direccion
 * @property int $socio_id
 * @property \App\Model\Entity\Socio $socio
 */
class Addres extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
