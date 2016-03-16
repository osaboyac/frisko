<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoEfectivoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoEfectivoTable Test Case
 */
class TipoEfectivoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoEfectivoTable
     */
    public $TipoEfectivo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipo_efectivo',
        'app.cajas_movimientos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TipoEfectivo') ? [] : ['className' => 'App\Model\Table\TipoEfectivoTable'];
        $this->TipoEfectivo = TableRegistry::get('TipoEfectivo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoEfectivo);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
