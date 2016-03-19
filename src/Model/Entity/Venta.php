<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
/**
 * Venta Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $socio_id
 * @property \App\Model\Entity\Socio $socio
 * @property int $orden_venta_id
 * @property int $documento_id
 * @property \App\Model\Entity\Documento $documento
 * @property int $deposito_id
 * @property \App\Model\Entity\Deposito $deposito
 * @property int $forma_pago_id
 * @property \App\Model\Entity\FormaPago $forma_pago
 * @property \Cake\I18n\Time $fecha
 * @property int $serie
 * @property int $numero
 * @property int $estado
 * @property int $docserie_id
 * @property \App\Model\Entity\Docseries $docseries
 * @property string $codigo_unico
 * @property float $total
 * @property float $impuesto
 * @property float $grantotal
 * @property float $saldo
 * @property \App\Model\Entity\OrdenVenta[] $orden_ventas
 * @property \App\Model\Entity\Guia[] $guias
 * @property \App\Model\Entity\VentasDetalle[] $ventas_detalle
 */
class Venta extends Entity
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
	/*protected function _getFullName()
    {
//        return $this->serie . '-' . $this->numero . ' S/.' . $this->grantotal;
        return $this->_properties['Ventas.serie'] . '-' .$this->_properties['Ventas.numero']. ' S/. ' .$this->_properties['Ventas.grantotal'];
    }*/
}
