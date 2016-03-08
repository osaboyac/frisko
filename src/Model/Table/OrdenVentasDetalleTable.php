<?php
namespace App\Model\Table;

use App\Model\Entity\OrdenVentasDetalle;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdenVentasDetalle Model
 *
 * @property \Cake\ORM\Association\BelongsTo $OrdenVentas
 * @property \Cake\ORM\Association\BelongsTo $Articulos
 * @property \Cake\ORM\Association\BelongsTo $Depositos
 */
class OrdenVentasDetalleTable extends Table
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

        $this->table('orden_ventas_detalle');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('OrdenVentas', [
            'foreignKey' => 'orden_venta_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['orden_venta_id'], 'OrdenVentas'));
        $rules->add($rules->existsIn(['articulo_id'], 'Articulos'));
        return $rules;
    }	
}
