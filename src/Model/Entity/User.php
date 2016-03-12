<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 *
 * @property int $id
 * @property int $socio_id
 * @property \App\Model\Entity\Socio $socio
 * @property int $role_id
 * @property \App\Model\Entity\Role $role
 * @property string $username
 * @property string $password
 * @property int $agente
 * @property string $visibility_roles
 * @property bool $estado
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Acl\Model\Entity\Aro[] $aro
 * @property \App\Model\Entity\OrdenVenta[] $orden_ventas
 * @property \App\Model\Entity\Venta[] $ventas
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
	protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
    
    public function parentNode()
    {
        if (!$this->id) {
            return null;
        }
        if (isset($this->role_id)) {
            $roleId = $this->role_id;
        } else {
            $Users = TableRegistry::get('Users');
            $user = $Users->find('all', ['fields' => ['role_id']])->where(['id' => $this->id])->first();
            $groupId = $user->role_id;
        }
        if (!$roleId) {
            return null;
        }
        return ['Roles' => ['id' => $roleId]];
    }
}
