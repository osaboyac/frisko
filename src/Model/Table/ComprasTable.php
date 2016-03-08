<?php
namespace App\Model\Table;

use App\Model\Entity\Compra;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Compras Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Socios
 * @property \Cake\ORM\Association\BelongsTo $OrdenCompras
 * @property \Cake\ORM\Association\BelongsTo $Ingresos
 * @property \Cake\ORM\Association\HasMany $ComprasDetalle
 * @property \Cake\ORM\Association\HasMany $Ingresos
 */
class ComprasTable extends Table
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

        $this->table('compras');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Socios', [
            'foreignKey' => 'socio_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OrdenCompras', [
            'foreignKey' => 'orden_compra_id'
        ]);
        $this->belongsTo('Ingresos', [
            'foreignKey' => 'ingreso_id'
        ]);
        $this->hasMany('ComprasDetalle', [
            'foreignKey' => 'compra_id'
        ]);
        $this->hasMany('Ingresos', [
            'foreignKey' => 'compra_id'
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
            ->requirePresence('serie', 'create')
            ->notEmpty('serie');

        $validator
            ->requirePresence('numero', 'create')
            ->notEmpty('numero');

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
        $rules->add($rules->existsIn(['socio_id'], 'Socios'));
        $rules->add($rules->existsIn(['orden_compra_id'], 'OrdenCompras'));
        $rules->add($rules->existsIn(['ingreso_id'], 'Ingresos'));
        return $rules;
    }
}
