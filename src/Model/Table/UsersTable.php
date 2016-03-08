<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Socios
 * @property \Cake\ORM\Association\BelongsTo $Roles
 * @property \Cake\ORM\Association\HasMany $OrdenVentas
 * @property \Cake\ORM\Association\HasMany $Ventas
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('username');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Acl.Acl', ['type' => 'requester']);

        $this->belongsTo('Socios', [
            'foreignKey' => 'socio_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('OrdenVentas', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Ventas', [
            'foreignKey' => 'user_id'
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->integer('agente')
            ->requirePresence('agente', 'create')
            ->notEmpty('agente');

        $validator
            ->boolean('estado')
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['socio_id'], 'Socios'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        return $rules;
    }
}
