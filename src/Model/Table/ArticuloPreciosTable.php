<?php
namespace App\Model\Table;

use App\Model\Entity\ArticuloPrecio;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArticuloPrecios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Depositos
 * @property \Cake\ORM\Association\BelongsTo $ListaPrecios
 * @property \Cake\ORM\Association\BelongsTo $Articulos
 * @property \Cake\ORM\Association\BelongsTo $Impuestos
 */
class ArticuloPreciosTable extends Table
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

        $this->table('articulo_precios');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Depositos', [
            'foreignKey' => 'deposito_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ListaPrecios', [
            'foreignKey' => 'lista_precio_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Articulos', [
            'foreignKey' => 'articulo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Impuestos', [
            'foreignKey' => 'impuesto_id',
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
            ->decimal('precio_minimo')
            ->allowEmpty('precio_minimo');

        $validator
            ->decimal('precio_estandar')
            ->allowEmpty('precio_estandar');

        $validator
            ->decimal('precio_maximo')
            ->allowEmpty('precio_maximo');

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
        $rules->add($rules->existsIn(['lista_precio_id'], 'ListaPrecios'));
        $rules->add($rules->existsIn(['articulo_id'], 'Articulos'));
        $rules->add($rules->existsIn(['impuesto_id'], 'Impuestos'));
        return $rules;
    }
}
