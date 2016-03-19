<?php
namespace App\Model\Table;

use App\Model\Entity\Articulo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articulos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Artfamilias
 * @property \Cake\ORM\Association\BelongsTo $Artmarcas
 * @property \Cake\ORM\Association\BelongsTo $Umedidas
 * @property \Cake\ORM\Association\HasMany $ArticuloPrecios
 * @property \Cake\ORM\Association\HasMany $ArticulosInfo
 * @property \Cake\ORM\Association\HasMany $ComprasDetalle
 * @property \Cake\ORM\Association\HasMany $GuiasDetalle
 * @property \Cake\ORM\Association\HasMany $IngresosDetalle
 * @property \Cake\ORM\Association\HasMany $OrdenComprasDetalle
 * @property \Cake\ORM\Association\HasMany $OrdenVentasDetalle
 * @property \Cake\ORM\Association\HasMany $VentasDetalle
 */
class ArticulosTable extends Table
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

        $this->table('articulos');
        $this->displayField('nombre');
        $this->primaryKey('id');
		
		 $this->addBehavior('Josegonzalez/Upload.Upload', [
            'imagen' => [
				'path' => 'webroot{DS}files{DS}{model}{DS}{field}{DS}{primaryKey}',
				'fields' => [
                    'dir' => 'imagen_dir', // defaults to `dir`
                ]
			]
        ]);

        $this->belongsTo('Artfamilias', [
            'foreignKey' => 'artfamilia_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Artmarcas', [
            'foreignKey' => 'artmarca_id'
        ]);
        $this->belongsTo('Umedidas', [
            'foreignKey' => 'umedida_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ArticuloPrecios', [
            'foreignKey' => 'articulo_id'
        ]);
        $this->hasMany('ArticulosInfo', [
            'foreignKey' => 'articulo_id'
        ]);
        $this->hasMany('ComprasDetalle', [
            'foreignKey' => 'articulo_id'
        ]);
        $this->hasMany('GuiasDetalle', [
            'foreignKey' => 'articulo_id'
        ]);
        $this->hasMany('IngresosDetalle', [
            'foreignKey' => 'articulo_id'
        ]);
        $this->hasMany('OrdenComprasDetalle', [
            'foreignKey' => 'articulo_id'
        ]);
        $this->hasMany('OrdenVentasDetalle', [
            'foreignKey' => 'articulo_id'
        ]);
        $this->hasMany('VentasDetalle', [
            'foreignKey' => 'articulo_id'
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
            ->allowEmpty('codigo');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->allowEmpty('descripcion');

        $validator
            ->allowEmpty('imagen');

        $validator
            ->integer('tipo')
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

        $validator
            ->integer('estado')
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');
			
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
        $rules->add($rules->existsIn(['artfamilia_id'], 'Artfamilias'));
        $rules->add($rules->existsIn(['artmarca_id'], 'Artmarcas'));
        $rules->add($rules->existsIn(['umedida_id'], 'Umedidas'));
        return $rules;
    }
}
