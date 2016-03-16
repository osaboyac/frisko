<?php
namespace App\Model\Table;

use App\Model\Entity\CajasMovimiento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CajasMovimientos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cajas
 * @property \Cake\ORM\Association\BelongsTo $Compras
 * @property \Cake\ORM\Association\BelongsTo $Ventas
 * @property \Cake\ORM\Association\BelongsTo $Cargos
 * @property \Cake\ORM\Association\BelongsTo $Monedas
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class CajasMovimientosTable extends Table
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

        $this->table('cajas_movimientos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cajas', [
            'foreignKey' => 'caja_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Compras', [
            'foreignKey' => 'compra_id'
        ]);
        $this->belongsTo('Ventas', [
            'foreignKey' => 'venta_id'
        ]);
        $this->belongsTo('Cargos', [
            'foreignKey' => 'cargo_id'
        ]);
        $this->belongsTo('Monedas', [
            'foreignKey' => 'moneda_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('concepto');

        $validator
            ->decimal('tipo_cambio')
            ->allowEmpty('tipo_cambio');

        $validator
            ->decimal('entrada')
            ->requirePresence('entrada', 'create')
            ->notEmpty('entrada');

        $validator
            ->decimal('salida')
            ->allowEmpty('salida');

        $validator
            ->integer('tipo_movimiento')
            ->requirePresence('tipo_movimiento', 'create')
            ->notEmpty('tipo_movimiento');

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
        $rules->add($rules->existsIn(['caja_id'], 'Cajas'));
        $rules->add($rules->existsIn(['moneda_id'], 'Monedas'));
        return $rules;
    }
}
