<?php
namespace App\Model\Table;

use App\Model\Entity\Impuesto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Impuestos Model
 *
 * @property \Cake\ORM\Association\HasMany $Articulos
 */
class ImpuestosTable extends Table
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

        $this->table('impuestos');
        $this->displayField('nombre');
        $this->primaryKey('id');

        $this->hasMany('Articulos', [
            'foreignKey' => 'impuesto_id'
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
            ->allowEmpty('descripcion');

        $validator
            ->decimal('tasa')
            ->requirePresence('tasa', 'create')
            ->notEmpty('tasa');

        return $validator;
    }
}
