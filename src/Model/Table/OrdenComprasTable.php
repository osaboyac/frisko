<?php
namespace App\Model\Table;

use App\Model\Entity\OrdenCompra;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdenCompras Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Socios
 * @property \Cake\ORM\Association\HasOne $Compras
 * @property \Cake\ORM\Association\HasOne $Ingresos
 * @property \Cake\ORM\Association\HasMany $OrdenComprasDetalle
 */
class OrdenComprasTable extends Table
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

        $this->table('orden_compras');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Socios', [
            'foreignKey' => 'socio_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('OrdenComprasDetalle', [
            'foreignKey' => 'orden_compra_id'
        ]);
        $this->hasOne('Compras');
        $this->hasOne('Ingresos');
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
        $rules->add($rules->existsIn(['socio_id'], 'Socios'));
        return $rules;
    }
}
