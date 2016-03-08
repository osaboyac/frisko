<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Compra Entity.
 *
 * @property int $id
 * @property int $socio_id
 * @property \App\Model\Entity\Socio $socio
 * @property int $orden_compra_id
 * @property \App\Model\Entity\OrdenCompra $orden_compra
 * @property int $ingreso_id
 * @property string $serie
 * @property string $numero
 * @property \Cake\I18n\Time $fecha
 * @property int $estado
 * @property \App\Model\Entity\ListaPrecio $lista_precio
 * @property \App\Model\Entity\Ingreso[] $ingresos
 * @property \App\Model\Entity\ComprasDetalle[] $compras_detalle
 */
class Compra extends Entity
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
