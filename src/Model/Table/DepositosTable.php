<?php
namespace App\Model\Table;

use App\Model\Entity\Deposito;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Depositos Model
 *
 * @property \Cake\ORM\Association\HasMany $ArticuloPrecios
 * @property \Cake\ORM\Association\HasMany $ArticulosInfo
 * @property \Cake\ORM\Association\HasMany $Docseries
 * @property \Cake\ORM\Association\HasMany $Docseriev
 * @property \Cake\ORM\Association\HasMany $Guias
 * @property \Cake\ORM\Association\HasMany $Ingresos
 * @property \Cake\ORM\Association\HasMany $IngresosDetalle
 * @property \Cake\ORM\Association\HasMany $OrdenVentas
 * @property \Cake\ORM\Association\HasMany $Ventas
 */
class DepositosTable extends Table
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

        $this->table('depositos');
        $this->displayField('nombre');
        $this->primaryKey('id');

        $this->hasMany('ArticuloPrecios', [
            'foreignKey' => 'deposito_id'
        ]);
        $this->hasMany('ArticulosInfo', [
            'foreignKey' => 'deposito_id'
        ]);
        $this->hasMany('Docseries', [
            'foreignKey' => 'deposito_id'
        ]);
        $this->hasMany('Docseriev', [
            'foreignKey' => 'deposito_id'
        ]);
        $this->hasMany('Guias', [
            'foreignKey' => 'deposito_id'
        ]);
        $this->hasMany('Ingresos', [
            'foreignKey' => 'deposito_id'
        ]);
        $this->hasMany('IngresosDetalle', [
            'foreignKey' => 'deposito_id'
        ]);
        $this->hasMany('OrdenVentas', [
            'foreignKey' => 'deposito_id'
        ]);
        $this->hasMany('Ventas', [
            'foreignKey' => 'deposito_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->requirePresence('direccion', 'create')
            ->notEmpty('direccion');

        $validator
            ->allowEmpty('telefono');

        $validator
            ->email('email')
            ->allowEmpty('email');

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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
