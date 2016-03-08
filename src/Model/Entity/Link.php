<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Link Entity.
 *
 * @property int $id
 * @property int $parent_id
 * @property \App\Model\Entity\ParentLink $parent_link
 * @property int $menu_id
 * @property \App\Model\Entity\Menu $menu
 * @property string $title
 * @property string $class
 * @property string $description
 * @property string $link
 * @property string $target
 * @property string $rel
 * @property int $status
 * @property int $lft
 * @property int $rght
 * @property string $visibility_roles
 * @property string $params
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\ChildLink[] $child_links
 */
class Link extends Entity
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
