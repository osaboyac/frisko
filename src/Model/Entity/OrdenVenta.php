<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrdenVenta Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $deposito_id
 * @property \App\Model\Entity\Deposito $deposito
 * @property int $socio_id
 * @property \App\Model\Entity\Socio $socio
 * @property int $forma_pago_id
 * @property \App\Model\Entity\FormaPago $forma_pago
 * @property \Cake\I18n\Time $fecha
 * @property float $total
 * @property float $impuesto
 * @property float $grantotal
 * @property int $estado
 * @property int $status
 * @property float $total
 * @property float $impuesto
 * @property float $grantotal
 * @property int $venta_id
 * @property \App\Model\Entity\Venta $venta
 * @property int $guia_id
 * @property \App\Model\Entity\Guia $guia
 * @property \App\Model\Entity\OrdenVentasDetalle[] $orden_ventas_detalle
 */
class OrdenVenta extends Entity
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
