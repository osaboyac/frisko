<?php
namespace App\Model\Table;

use App\Model\Entity\Umedida;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Umedidas Model
 *
 * @property \Cake\ORM\Association\HasMany $Articulos
 */
class UmedidasTable extends Table
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

        $this->table('umedidas');
        $this->displayField('nombre');
        $this->primaryKey('id');

        $this->hasMany('Articulos', [
            'foreignKey' => 'umedida_id'
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
            ->requirePresence('simbolo', 'create')
            ->notEmpty('simbolo');

        return $validator;
    }
}
