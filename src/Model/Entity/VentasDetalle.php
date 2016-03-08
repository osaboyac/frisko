<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VentasDetalle Entity.
 *
 * @property int $id
 * @property int $venta_id
 * @property \App\Model\Entity\Venta $venta
 * @property int $articulo_id
 * @property \App\Model\Entity\Articulo $articulo
 * @property float $cantidad
 * @property float $precio
 * @property string $serie
 */
class VentasDetalle extends Entity
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
