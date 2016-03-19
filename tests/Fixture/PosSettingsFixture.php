<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PosSettingsFixture
 *
 */
class PosSettingsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'deposito_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'docserie_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'serie de documento para la guia de remision', 'precision' => null, 'autoIncrement' => null],
        'documento_venta' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'caja_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'socio_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'estado' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'user_id_fk_ps_idx' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'deposito_id_fk_ps_idx' => ['type' => 'index', 'columns' => ['deposito_id'], 'length' => []],
            'docserie_id_fk_ps_idx' => ['type' => 'index', 'columns' => ['docserie_id'], 'length' => []],
            'socio_id_fk_ps_idx' => ['type' => 'index', 'columns' => ['socio_id'], 'length' => []],
            'caja_id_fk_ps_idx' => ['type' => 'index', 'columns' => ['caja_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'user_id_fk_ps' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'deposito_id_fk_ps' => ['type' => 'foreign', 'columns' => ['deposito_id'], 'references' => ['depositos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'docserie_id_fk_ps' => ['type' => 'foreign', 'columns' => ['docserie_id'], 'references' => ['docseries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'socio_id_fk_ps' => ['type' => 'foreign', 'columns' => ['socio_id'], 'references' => ['socios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'caja_id_fk_ps' => ['type' => 'foreign', 'columns' => ['caja_id'], 'references' => ['cajas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'deposito_id' => 1,
            'user_id' => 1,
            'docserie_id' => 1,
            'documento_venta' => 'Lorem ipsum dolor sit amet',
            'caja_id' => 1,
            'socio_id' => 1,
            'estado' => 1,
            'created' => '2016-03-19 12:08:49',
            'modified' => '2016-03-19 12:08:49'
        ],
    ];
}
