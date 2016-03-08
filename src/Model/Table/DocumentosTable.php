<?php
namespace App\Model\Table;

use App\Model\Entity\Documento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Documentos Model
 *
 * @property \Cake\ORM\Association\HasMany $Docseries
 * @property \Cake\ORM\Association\HasMany $Ventas
 */
class DocumentosTable extends Table
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

        $this->table('documentos');
        $this->displayField('nombre');
        $this->primaryKey('id');

        $this->hasMany('Docseries', [
            'foreignKey' => 'documento_id'
        ]);
        $this->hasMany('Ventas', [
            'foreignKey' => 'documento_id'
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
            ->requirePresence('abreviatura', 'create')
            ->notEmpty('abreviatura');

        return $validator;
    }
}
