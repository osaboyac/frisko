<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ArticuloPrecio Entity.
 *
 * @property int $id
 * @property int $deposito_id
 * @property int $lista_precio_id
 * @property \App\Model\Entity\ListaPrecio $lista_precio
 * @property int $articulo_id
 * @property \App\Model\Entity\Articulo $articulo
 * @property int $impuesto_id
 * @property \App\Model\Entity\Impuesto $impuesto
 * @property float $precio_minimo
 * @property float $precio_estandar
 * @property float $precio_maximo
 * @property int $impuesto_incluido
 */
class ArticuloPrecio extends Entity
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
