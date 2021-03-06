<?php
namespace App\Model\Table;

use App\Model\Entity\Provincia;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Provincias Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Departamentos
 * @property \Cake\ORM\Association\HasMany $Address
 * @property \Cake\ORM\Association\HasMany $Distritos
 */
class ProvinciasTable extends Table
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

        $this->table('provincias');
        $this->displayField('nombre');
        $this->primaryKey('id');

        $this->belongsTo('Departamentos', [
            'foreignKey' => 'departamento_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Address', [
            'foreignKey' => 'provincia_id'
        ]);
        $this->hasMany('Distritos', [
            'foreignKey' => 'provincia_id'
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
        $rules->add($rules->existsIn(['departamento_id'], 'Departamentos'));
        return $rules;
    }
}
