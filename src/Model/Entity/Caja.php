<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Caja Entity.
 *
 * @property int $id
 * @property int $libro_caja_id
 * @property \App\Model\Entity\LibroCaja $libro_caja
 * @property int $deposito_id
 * @property \App\Model\Entity\Deposito $deposito
 * @property string $nombre
 * @property string $descripcion
 * @property \Cake\I18n\Time $fecha
 * @property \Cake\I18n\Time $fecha_cierre
 * @property int $estado
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property int $user_id
 * @property \App\Model\Entity\CajasMovimiento[] $cajas_movimientos
 */
class Caja extends Entity
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
