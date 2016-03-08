<?php
namespace App\Model\Table;

use App\Model\Entity\GuiasDetalle;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GuiasDetalle Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Guias
 * @property \Cake\ORM\Association\BelongsTo $Articulos
 * @property \Cake\ORM\Association\BelongsTo $Depositos
 */
class GuiasDetalleTable extends Table
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

        $this->table('guias_detalle');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Guias', [
            'foreignKey' => 'guia_id',
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

        $validator
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

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
        $rules->add($rules->existsIn(['guia_id'], 'Guias'));
        $rules->add($rules->existsIn(['articulo_id'], 'Articulos'));
        $rules->add($rules->existsIn(['deposito_id'], 'Depositos'));
        return $rules;
    }
}
