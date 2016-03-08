<?php
namespace App\Model\Table;

use App\Model\Entity\Menu;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Menus Model
 *
 * @property \Cake\ORM\Association\HasMany $Links
 */
class MenusTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('menus');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Links', [
            'foreignKey' => 'menu_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('alias', 'create')
            ->notEmpty('alias');

        $validator
            ->allowEmpty('class');

        $validator
            ->allowEmpty('description');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('weight')
            ->allowEmpty('weight');

        $validator
            ->allowEmpty('params');

        return $validator;
    }
}
