<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ctacorriente Entity.
 *
 * @property int $id
 * @property int $banco_id
 * @property \App\Model\Entity\Banco $banco
 * @property int $deposito_id
 * @property \App\Model\Entity\Deposito $deposito
 * @property int $socio_id
 * @property \App\Model\Entity\Socio $socio
 * @property int $moneda_id
 * @property \App\Model\Entity\Moneda $moneda
 * @property string $descripcion
 * @property string $nro_cuenta
 * @property int $tipo
 * @property int $estado
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Ctacorriente extends Entity
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
