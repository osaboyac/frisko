<?php
namespace App\Model\Table;

use App\Model\Entity\ListaPrecio;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ListaPrecios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Socios
 * @property \Cake\ORM\Association\BelongsTo $Monedas
 * @property \Cake\ORM\Association\HasMany $ArticuloPrecios
 * @property \Cake\ORM\Association\HasMany $OrdenCompras
 */
class ListaPreciosTable extends Table
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

        $this->table('lista_precios');
        $this->displayField('nombre');
        $this->primaryKey('id');

        $this->belongsTo('Socios', [
            'foreignKey' => 'socio_id'
        ]);
        $this->belongsTo('Monedas', [
            'foreignKey' => 'moneda_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ArticuloPrecios', [
            'foreignKey' => 'lista_precio_id'
        ]);
        $this->hasMany('OrdenCompras', [
            'foreignKey' => 'lista_precio_id'
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
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->integer('tipo_lista')
            ->requirePresence('tipo_lista', 'create')
            ->notEmpty('tipo_lista');

        $validator
            ->integer('incluir_impuesto')
            ->requirePresence('incluir_impuesto', 'create')
            ->notEmpty('incluir_impuesto');

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
        $rules->add($rules->existsIn(['moneda_id'], 'Monedas'));
        return $rules;
    }
}
