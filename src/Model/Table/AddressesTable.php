<?php
namespace App\Model\Table;

use App\Model\Entity\Address;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Addresses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Departamentos
 * @property \Cake\ORM\Association\BelongsTo $Provincias
 * @property \Cake\ORM\Association\BelongsTo $Distritos
 * @property \Cake\ORM\Association\BelongsTo $Socios
 * @property \Cake\ORM\Association\HasMany $Socios
 */
class AddressesTable extends Table
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

        $this->table('addresses');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Departamentos', [
            'foreignKey' => 'departamento_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Provincias', [
            'foreignKey' => 'provincia_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Distritos', [
            'foreignKey' => 'distrito_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Socios', [
            'foreignKey' => 'socio_id'
        ]);
        $this->hasMany('Socios', [
            'foreignKey' => 'address_id'
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('zona');

        $validator
            ->allowEmpty('direccion');

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
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['departamento_id'], 'Departamentos'));
        $rules->add($rules->existsIn(['provincia_id'], 'Provincias'));
        $rules->add($rules->existsIn(['distrito_id'], 'Distritos'));
        $rules->add($rules->existsIn(['socio_id'], 'Socios'));
        return $rules;
    }
}
