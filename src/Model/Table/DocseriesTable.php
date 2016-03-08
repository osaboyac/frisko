<?php
namespace App\Model\Table;

use App\Model\Entity\Docseries;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Docseries Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Documentos
 * @property \Cake\ORM\Association\BelongsTo $Depositos
 */
class DocseriesTable extends Table
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

        $this->table('docseries');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Documentos', [
            'foreignKey' => 'documento_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Depositos', [
            'foreignKey' => 'deposito_id',
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
            ->integer('serie')
            ->requirePresence('serie', 'create')
            ->notEmpty('serie');

        $validator
            ->integer('numero')
            ->requirePresence('numero', 'create')
            ->notEmpty('numero');

        $validator
            ->integer('tipo')
            ->allowEmpty('tipo');

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
        $rules->add($rules->existsIn(['documento_id'], 'Documentos'));
        $rules->add($rules->existsIn(['deposito_id'], 'Depositos'));
        return $rules;
    }
}
