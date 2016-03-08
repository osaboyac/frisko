<?php
namespace App\Model\Table;

use App\Model\Entity\VentasDetalle;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VentasDetalle Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ventas
 * @property \Cake\ORM\Association\BelongsTo $Articulos
 */
class VentasDetalleTable extends Table
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

        $this->table('ventas_detalle');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Ventas', [
            'foreignKey' => 'venta_id'
        ]);
        $this->belongsTo('Articulos', [
            'foreignKey' => 'articulo_id',
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
            ->decimal('precio')
            ->requirePresence('precio', 'create')
            ->notEmpty('precio');

        $validator
            ->allowEmpty('serie');

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
        $rules->add($rules->existsIn(['venta_id'], 'Ventas'));
        $rules->add($rules->existsIn(['articulo_id'], 'Articulos'));
        return $rules;
    }
}
