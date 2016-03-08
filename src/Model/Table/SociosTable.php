<?php
namespace App\Model\Table;

use App\Model\Entity\Socio;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Socios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Addresses
 * @property \Cake\ORM\Association\HasMany $Addresses
 * @property \Cake\ORM\Association\HasMany $Compras
 * @property \Cake\ORM\Association\HasMany $Ctacorrientes
 * @property \Cake\ORM\Association\HasMany $Guias
 * @property \Cake\ORM\Association\HasMany $Ingresos
 * @property \Cake\ORM\Association\HasMany $ListaPrecios
 * @property \Cake\ORM\Association\HasMany $OrdenCompras
 * @property \Cake\ORM\Association\HasMany $OrdenVentas
 * @property \Cake\ORM\Association\HasMany $Users
 * @property \Cake\ORM\Association\HasMany $Ventas
 */
class SociosTable extends Table
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

        $this->table('socios');
        $this->displayField('nombre');
        $this->primaryKey('id');

        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Addresses', [
            'foreignKey' => 'socio_id'
        ]);
        $this->hasMany('Compras', [
            'foreignKey' => 'socio_id'
        ]);
        $this->hasMany('Ctacorrientes', [
            'foreignKey' => 'socio_id'
        ]);
        $this->hasMany('Guias', [
            'foreignKey' => 'socio_id'
        ]);
        $this->hasMany('Ingresos', [
            'foreignKey' => 'socio_id'
        ]);
        $this->hasMany('ListaPrecios', [
            'foreignKey' => 'socio_id'
        ]);
        $this->hasMany('OrdenCompras', [
            'foreignKey' => 'socio_id'
        ]);
        $this->hasMany('OrdenVentas', [
            'foreignKey' => 'socio_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'socio_id'
        ]);
        $this->hasMany('Ventas', [
            'foreignKey' => 'socio_id'
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
            ->integer('tipo_doc')
            ->requirePresence('tipo_doc', 'create')
            ->notEmpty('tipo_doc');

        $validator
            ->integer('codigo')
            ->allowEmpty('codigo');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->allowEmpty('descripcion');

        $validator
            ->allowEmpty('telefono');

        $validator
            ->allowEmpty('movil');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->integer('cliente')
            ->allowEmpty('cliente');

        $validator
            ->integer('proveedor')
            ->allowEmpty('proveedor');

        $validator
            ->integer('empleado')
            ->allowEmpty('empleado');

        $validator
            ->integer('estado')
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
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));
        return $rules;
    }
}
