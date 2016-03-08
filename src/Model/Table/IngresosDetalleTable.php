<?php
namespace App\Model\Table;

use App\Model\Entity\IngresosDetalle;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IngresosDetalle Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ingresos
 * @property \Cake\ORM\Association\BelongsTo $Articulos
 * @property \Cake\ORM\Association\BelongsTo $Depositos
 */
class IngresosDetalleTable extends Table
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

        $this->table('ingresos_detalle');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Ingresos', [
            'foreignKey' => 'ingreso_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Articulos', [
            'foreignKey' => 'articulo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Depositos', [
            'foreignKey' => 'deposito_id',
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
            ->decimal('cantidad')
            ->requirePresence('cantidad', 'create')
            ->notEmpty('cantidad');

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
        $rules->add($rules->existsIn(['ingreso_id'], 'Ingresos'));
        $rules->add($rules->existsIn(['articulo_id'], 'Articulos'));
        $rules->add($rules->existsIn(['deposito_id'], 'Depositos'));
        return $rules;
    }
}
