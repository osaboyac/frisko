<?php
namespace App\Model\Table;

use App\Model\Entity\OrdenVenta;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * OrdenVentas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Depositos
 * @property \Cake\ORM\Association\BelongsTo $Socios
 * @property \Cake\ORM\Association\BelongsTo $FormaPagos
 * @property \Cake\ORM\Association\HasMany $Guias
 * @property \Cake\ORM\Association\HasMany $OrdenVentasDetalle
 */
class OrdenVentasTable extends Table
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

        $this->table('orden_ventas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Depositos', [
            'foreignKey' => 'deposito_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Socios', [
            'foreignKey' => 'socio_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FormaPagos', [
            'foreignKey' => 'forma_pago_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Guias', [
            'foreignKey' => 'orden_venta_id'
        ]);
        $this->hasMany('Ventas', [
            'foreignKey' => 'orden_venta_id'
        ]);
        $this->hasMany('OrdenVentasDetalle', [
            'foreignKey' => 'orden_venta_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['deposito_id'], 'Depositos'));
        $rules->add($rules->existsIn(['socio_id'], 'Socios'));
        $rules->add($rules->existsIn(['forma_pago_id'], 'FormaPagos'));
        return $rules;
    }

}
