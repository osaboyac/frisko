<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PosSetting Entity.
 *
 * @property int $id
 * @property int $deposito_id
 * @property \App\Model\Entity\Deposito $deposito
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $docserie_id
 * @property \App\Model\Entity\Docseries $docseries
 * @property string $documento_venta
 * @property int $caja_id
 * @property \App\Model\Entity\Caja $caja
 * @property int $socio_id
 * @property \App\Model\Entity\Socio $socio
 * @property int $estado
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class PosSetting extends Entity
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
