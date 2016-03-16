<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CajasMovimientosFixture
 *
 */
class CajasMovimientosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'caja_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'compra_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'venta_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cargo_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'moneda_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'concepto' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'tipo_cambio' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'entrada' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'salida' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'updated' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'tipo_movimiento' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '0=Entrada
1=Salida', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'caja_id_fk_cm_idx' => ['type' => 'index', 'columns' => ['caja_id'], 'length' => []],
            'cargo_id_fk_cm_idx' => ['type' => 'index', 'columns' => ['cargo_id'], 'length' => []],
            'compra_id_fk_cm_idx' => ['type' => 'index', 'columns' => ['compra_id'], 'length' => []],
            'venta_id_fk_cm_idx' => ['type' => 'index', 'columns' => ['venta_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'user_id_fk_cm' => ['type' => 'foreign', 'columns' => ['id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'caja_id_fk_cm' => ['type' => 'foreign', 'columns' => ['caja_id'], 'references' => ['cajas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'cargo_id_fk_cm' => ['type' => 'foreign', 'columns' => ['cargo_id'], 'references' => ['cargos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'compra_id_fk_cm' => ['type' => 'foreign', 'columns' => ['compra_id'], 'references' => ['compras', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'venta_id_fk_cm' => ['type' => 'foreign', 'columns' => ['venta_id'], 'references' => ['ventas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
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
            'caja_id' => 1,
            'compra_id' => 1,
            'venta_id' => 1,
            'cargo_id' => 1,
            'moneda_id' => 1,
            'concepto' => 'Lorem ipsum dolor sit amet',
            'tipo_cambio' => 1.5,
            'entrada' => 1.5,
            'salida' => 1.5,
            'created' => '2016-03-15 11:07:24',
            'updated' => '2016-03-15 11:07:24',
            'tipo_movimiento' => 1,
            'user_id' => 1
        ],
    ];
}
