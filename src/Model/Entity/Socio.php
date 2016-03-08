<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Socio Entity.
 *
 * @property int $id
 * @property int $tipo_doc
 * @property int $codigo
 * @property string $nombre
 * @property string $descripcion
 * @property string $telefono
 * @property string $movil
 * @property string $email
 * @property int $address_id
 * @property int $cliente
 * @property int $proveedor
 * @property int $empleado
 * @property int $estado
 * @property \App\Model\Entity\Addres[] $address
 * @property \App\Model\Entity\Compra[] $compras
 * @property \App\Model\Entity\Ctacorriente[] $ctacorrientes
 * @property \App\Model\Entity\Guia[] $guias
 * @property \App\Model\Entity\Ingreso[] $ingresos
 * @property \App\Model\Entity\ListaPrecio[] $lista_precios
 * @property \App\Model\Entity\OrdenCompra[] $orden_compras
 * @property \App\Model\Entity\OrdenVenta[] $orden_ventas
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Venta[] $ventas
 */
class Socio extends Entity
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
