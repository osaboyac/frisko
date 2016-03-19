<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CtacorrientesFixture
 *
 */
class CtacorrientesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'banco_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'deposito_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'socio_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'moneda_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'descripcion' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'nro_cuenta' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'tipo' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '0=Ahorros
1=Cuenta Corriente', 'precision' => null, 'autoIncrement' => null],
        'estado' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'banco_id_fk_ctaco_idx' => ['type' => 'index', 'columns' => ['banco_id'], 'length' => []],
            'socio_id_fk_ctaco_idx' => ['type' => 'index', 'columns' => ['socio_id'], 'length' => []],
            'moneda_id_fk_ctaco_idx' => ['type' => 'index', 'columns' => ['moneda_id'], 'length' => []],
            'deposito_id_fk_ctaco_idx' => ['type' => 'index', 'columns' => ['deposito_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'banco_id_fk_ctaco' => ['type' => 'foreign', 'columns' => ['banco_id'], 'references' => ['bancos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'moneda_id_fk_ctaco' => ['type' => 'foreign', 'columns' => ['moneda_id'], 'references' => ['monedas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'socio_id_fk_ctaco' => ['type' => 'foreign', 'columns' => ['socio_id'], 'references' => ['socios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'deposito_id_fk_ctaco' => ['type' => 'foreign', 'columns' => ['deposito_id'], 'references' => ['depositos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'banco_id' => 1,
            'deposito_id' => 1,
            'socio_id' => 1,
            'moneda_id' => 1,
            'descripcion' => 'Lorem ipsum dolor sit amet',
            'nro_cuenta' => 'Lorem ipsum dolor sit amet',
            'tipo' => 1,
            'estado' => 1,
            'created' => '2016-03-16 12:32:51',
            'modified' => '2016-03-16 12:32:51'
        ],
    ];
}
