<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Guia Entity.
 *
 * @property int $id
 * @property int $deposito_id
 * @property \App\Model\Entity\Deposito $deposito
 * @property int $orden_venta_id
 * @property \App\Model\Entity\OrdenVenta $orden_venta
 * @property int $socio_id
 * @property \App\Model\Entity\Socio $socio
 * @property int $documento_id
 * @property \App\Model\Entity\Documento $documento
 * @property string $direccion
 * @property \Cake\I18n\Time $fecha
 * @property int $serie
 * @property int $numero
 * @property int $docserie_id
 * @property \App\Model\Entity\Docseries $docseries
 * @property string $codigo_unico
 * @property int $estado
 * @property \App\Model\Entity\GuiasDetalle[] $guias_detalle
 */
class Guia extends Entity
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
