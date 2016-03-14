<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VentasFixture
 *
 */
class VentasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'user_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'socio_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'orden_venta_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'documento_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'deposito_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'forma_pago_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => '0000-00-00', 'comment' => '', 'precision' => null],
        'serie' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => '000', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'numero' => ['type' => 'integer', 'length' => 7, 'unsigned' => true, 'null' => false, 'default' => '0000000', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'estado' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '0=Grabado
1=Procesado', 'precision' => null, 'autoIncrement' => null],
        'docserie_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'codigo_unico' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'total' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
        'impuesto' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
        'grantotal' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
        '_indexes' => [
            'socio_id_fk_v_idx' => ['type' => 'index', 'columns' => ['socio_id'], 'length' => []],
            'documento_id_fk_v_idx' => ['type' => 'index', 'columns' => ['documento_id'], 'length' => []],
            'deposito_id_fk_v_idx' => ['type' => 'index', 'columns' => ['deposito_id'], 'length' => []],
            'user_id_fk_v_idx' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'forma_pago_id_fk_v_idx' => ['type' => 'index', 'columns' => ['forma_pago_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'codigo_unico_UNIQUE' => ['type' => 'unique', 'columns' => ['codigo_unico'], 'length' => []],
            'deposito_id_fk_v' => ['type' => 'foreign', 'columns' => ['deposito_id'], 'references' => ['depositos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'documento_id_fk_v' => ['type' => 'foreign', 'columns' => ['documento_id'], 'references' => ['documentos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'forma_pago_id_fk_v' => ['type' => 'foreign', 'columns' => ['forma_pago_id'], 'references' => ['forma_pagos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'socio_id_fk_v' => ['type' => 'foreign', 'columns' => ['socio_id'], 'references' => ['socios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'user_id_fk_v' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'user_id' => 1,
            'socio_id' => 1,
            'orden_venta_id' => 1,
            'documento_id' => 1,
            'deposito_id' => 1,
            'forma_pago_id' => 1,
            'fecha' => '2016-03-13',
            'serie' => 1,
            'numero' => 1,
            'estado' => 1,
            'docserie_id' => 1,
            'codigo_unico' => 'Lorem ipsum dolor sit amet',
            'total' => 1.5,
            'impuesto' => 1.5,
            'grantotal' => 1.5
        ],
    ];
}
