<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ListaPrecio Entity.
 *
 * @property int $id
 * @property int $socio_id
 * @property \App\Model\Entity\Socio $socio
 * @property string $nombre
 * @property int $moneda_id
 * @property \App\Model\Entity\Moneda $moneda
 * @property int $tipo_lista
 * @property int $incluir_impuesto
 * @property int $estado
 * @property \App\Model\Entity\ArticuloPrecio[] $articulo_precios
 * @property \App\Model\Entity\OrdenCompra[] $orden_compras
 */
class ListaPrecio extends Entity
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
