<?php
namespace App\Model\Table;

use App\Model\Entity\Ingreso;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ingresos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Depositos
 * @property \Cake\ORM\Association\BelongsTo $Socios
 * @property \Cake\ORM\Association\BelongsTo $Compras
 * @property \Cake\ORM\Association\BelongsTo $OrdenCompras
 * @property \Cake\ORM\Association\HasMany $Compras
 * @property \Cake\ORM\Association\HasMany $IngresosDetalle
 */
class IngresosTable extends Table
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

        $this->table('ingresos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Depositos', [
            'foreignKey' => 'deposito_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Socios', [
            'foreignKey' => 'socio_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('IngresosDetalle', [
            'foreignKey' => 'ingreso_id'
        ]);
        $this->hasOne('OrdenCompras');
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
            ->allowEmpty('fecha');

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
        $rules->add($rules->existsIn(['deposito_id'], 'Depositos'));
        $rules->add($rules->existsIn(['socio_id'], 'Socios'));
        $rules->add($rules->existsIn(['compra_id'], 'Compras'));
        $rules->add($rules->existsIn(['orden_compra_id'], 'OrdenCompras'));
        return $rules;
    }
}
