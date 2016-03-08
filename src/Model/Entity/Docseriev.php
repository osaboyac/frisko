<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Docseriev Entity.
 *
 * @property int $id
 * @property string $nombre
 * @property int $deposito_id
 * @property \App\Model\Entity\Deposito $deposito
 * @property int $serie
 * @property int $numero
 * @property int $tipo
 */
class Docseriev extends Entity
{

}
