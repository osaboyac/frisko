<?php
namespace App\Model\Table;

use App\Model\Entity\Venta;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ventas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Socios
 * @property \Cake\ORM\Association\BelongsTo $Documentos
 * @property \Cake\ORM\Association\BelongsTo $Depositos
 * @property \Cake\ORM\Association\BelongsTo $FormaPagos
 * @property \Cake\ORM\Association\BelongsTo $Docseries
 * @property \Cake\ORM\Association\HasMany $Guias
 * @property \Cake\ORM\Association\HasMany $VentasDetalle
 */
class VentasTable extends Table
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

        $this->table('ventas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Socios', [
            'foreignKey' => 'socio_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Documentos', [
            'foreignKey' => 'documento_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Depositos', [
            'foreignKey' => 'deposito_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FormaPagos', [
            'foreignKey' => 'forma_pago_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Docseries', [
            'foreignKey' => 'docserie_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OrdenVentas', [
            'foreignKey' => 'orden_venta_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Guias', [
            'foreignKey' => 'venta_id'
        ]);
        $this->hasMany('VentasDetalle', [
            'foreignKey' => 'venta_id'
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
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

        $validator
            ->integer('serie')
            ->requirePresence('serie', 'create')
            ->notEmpty('serie');

        $validator
            ->integer('numero')
            ->requirePresence('numero', 'create')
            ->notEmpty('numero');

        $validator
            ->integer('estado')
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');

        $validator
            ->allowEmpty('codigo_unico')
            ->add('codigo_unico', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['codigo_unico']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['socio_id'], 'Socios'));
        $rules->add($rules->existsIn(['documento_id'], 'Documentos'));
        $rules->add($rules->existsIn(['deposito_id'], 'Depositos'));
        $rules->add($rules->existsIn(['forma_pago_id'], 'FormaPagos'));
        $rules->add($rules->existsIn(['docserie_id'], 'Docseries'));
        return $rules;
    }
}
