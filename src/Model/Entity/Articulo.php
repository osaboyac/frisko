<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Articulo Entity.
 *
 * @property int $id
 * @property int $artfamilia_id
 * @property \App\Model\Entity\Artfamilia $artfamilia
 * @property int $artmarca_id
 * @property \App\Model\Entity\Artmarca $artmarca
 * @property int $umedida_id
 * @property \App\Model\Entity\Umedida $umedida
 * @property string $codigo
 * @property string $nombre
 * @property string $descripcion
 * @property string|resource $imagen
 * @property int $tipo
 * @property int $estado
 * @property int $pdv
 * @property \App\Model\Entity\Impuesto $impuesto
 */
class Articulo extends Entity
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
