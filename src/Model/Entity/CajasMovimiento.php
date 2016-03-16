<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CajasMovimiento Entity.
 *
 * @property int $id
 * @property int $caja_id
 * @property \App\Model\Entity\Caja $caja
 * @property int $compra_id
 * @property \App\Model\Entity\Compra $compra
 * @property int $venta_id
 * @property \App\Model\Entity\Venta $venta
 * @property int $cargo_id
 * @property \App\Model\Entity\Cargo $cargo
 * @property int $moneda_id
 * @property \App\Model\Entity\Moneda $moneda
 * @property string $concepto
 * @property float $tipo_cambio
 * @property float $entrada
 * @property float $salida
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $tipo_movimiento
 * @property int $user_id
 * @property int $socio_id
 * @property string $venta_text
 * @property string $compra_text
 * @property string $descripcion
 */
class CajasMovimiento extends Entity
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
