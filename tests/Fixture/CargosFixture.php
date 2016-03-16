<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CargosFixture
 *
 */
class CargosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'socio_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'impuesto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'incluir_impuesto' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '0=No incluye impuesto
1=Incluye Impuesto', 'precision' => null, 'autoIncrement' => null],
        'nombre' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null, 'fixed' => null],
        'total' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
        'estado' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'tipo_cargo' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '0=Cargo Fijo, 1=Cargo Variable', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'socio_id_fk_cargo_idx' => ['type' => 'index', 'columns' => ['socio_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'socio_id_fk_cargo' => ['type' => 'foreign', 'columns' => ['socio_id'], 'references' => ['socios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'socio_id' => 1,
            'impuesto_id' => 1,
            'incluir_impuesto' => 1,
            'nombre' => 'Lorem ipsum dolor sit amet',
            'total' => 1.5,
            'estado' => 1,
            'created' => '2016-03-14 16:14:33',
            'modified' => '2016-03-14 16:14:33',
            'tipo_cargo' => 1
        ],
    ];
}
