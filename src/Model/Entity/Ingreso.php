<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ingreso Entity.
 *
 * @property int $id
 * @property int $deposito_id
 * @property \App\Model\Entity\Deposito $deposito
 * @property int $socio_id
 * @property \App\Model\Entity\Socio $socio
 * @property int $orden_compra_id
 * @property \App\Model\Entity\OrdenCompra $orden_compra
 * @property \Cake\I18n\Time $fecha
 * @property \App\Model\Entity\IngresosDetalle[] $ingresos_detalles
 */
class Ingreso extends Entity
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
