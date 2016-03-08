<?php
namespace App\Model\Table;

use App\Model\Entity\FormaPago;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormaPagos Model
 *
 * @property \Cake\ORM\Association\HasMany $OrdenVentas
 * @property \Cake\ORM\Association\HasMany $Ventas
 */
class FormaPagosTable extends Table
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

        $this->table('forma_pagos');
        $this->displayField('nombre');
        $this->primaryKey('id');

        $this->hasMany('OrdenVentas', [
            'foreignKey' => 'forma_pago_id'
        ]);
        $this->hasMany('Ventas', [
            'foreignKey' => 'forma_pago_id'
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
            ->integer('cantidad')
            ->requirePresence('cantidad', 'create')
            ->notEmpty('cantidad');

        return $validator;
    }
}
