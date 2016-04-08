<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrdenCompra Entity.
 *
 * @property int $id
 * @property int $socio_id
 * @property \App\Model\Entity\Socio $socio
 * @property \Cake\I18n\Time $fecha
 * @property int $estado
 * @property int $compra_id
 * @property int $guia_id
 * @property float $total
 * @property float $impuesto
 * @property float $grantotal
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property \App\Model\Entity\Compra[] $compras
 * @property \App\Model\Entity\Ingreso[] $ingresos
 * @property \App\Model\Entity\OrdenComprasDetalle[] $orden_compras_detalle
 */
class OrdenCompra extends Entity
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
