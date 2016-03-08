<?php
namespace App\Model\Table;

use App\Model\Entity\ArticulosInfo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArticulosInfo Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Articulos
 * @property \Cake\ORM\Association\BelongsTo $Depositos
 * @property \Cake\ORM\Association\BelongsTo $ListaPrecios
 * @property \Cake\ORM\Association\BelongsTo $ArticuloPrecios
 */
class ArticulosInfoTable extends Table
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

        $this->table('articulos_info');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Articulos', [
            'foreignKey' => 'articulo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Depositos', [
            'foreignKey' => 'deposito_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ListaPrecios', [
            'foreignKey' => 'lista_precio_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ArticuloPrecios', [
            'foreignKey' => 'articulo_precio_id'
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
            ->decimal('existencia')
            ->requirePresence('existencia', 'create')
            ->notEmpty('existencia');

        $validator
            ->decimal('reservada')
            ->requirePresence('reservada', 'create')
            ->notEmpty('reservada');

        $validator
            ->decimal('disponible')
            ->requirePresence('disponible', 'create')
            ->notEmpty('disponible');

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
        $rules->add($rules->existsIn(['articulo_id'], 'Articulos'));
        $rules->add($rules->existsIn(['deposito_id'], 'Depositos'));
        $rules->add($rules->existsIn(['lista_precio_id'], 'ListaPrecios'));
        $rules->add($rules->existsIn(['articulo_precio_id'], 'ArticuloPrecios'));
        return $rules;
    }
}
