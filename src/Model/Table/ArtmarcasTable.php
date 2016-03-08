<?php
namespace App\Model\Table;

use App\Model\Entity\Artmarca;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Artmarcas Model
 *
 * @property \Cake\ORM\Association\HasMany $Articulos
 */
class ArtmarcasTable extends Table
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

        $this->table('artmarcas');
        $this->displayField('nombre');
        $this->primaryKey('id');

        $this->hasMany('Articulos', [
            'foreignKey' => 'artmarca_id'
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
            ->allowEmpty('nombre');

        return $validator;
    }
}
