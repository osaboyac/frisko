<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ComprasDetalle Entity.
 *
 * @property int $id
 * @property int $compra_id
 * @property \App\Model\Entity\Compra $compra
 * @property int $articulo_id
 * @property \App\Model\Entity\Articulo $articulo
 * @property float $cantidad
 * @property float $precio
 * @property float $tasa_impuesto
 * @property int $incluir_impuesto
 */
class ComprasDetalle extends Entity
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
