<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CargosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CargosTable Test Case
 */
class CargosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CargosTable
     */
    public $Cargos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cargos',
        'app.socios',
        'app.addresses',
        'app.departamentos',
        'app.address',
        'app.provincias',
        'app.distritos',
        'app.compras',
        'app.compras_detalle',
        'app.articulos',
        'app.artfamilias',
        'app.artmarcas',
        'app.umedidas',
        'app.articulo_precios',
        'app.depositos',
        'app.articulos_info',
        'app.lista_precios',
        'app.monedas',
        'app.ctacorrientes',
        'app.orden_compras',
        'app.orden_compras_detalle',
        'app.ingresos',
        'app.ingresos_detalle',
        'app.docseries',
        'app.documentos',
        'app.ventas',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.roles',
        'app.orden_ventas',
        'app.forma_pagos',
        'app.orden_ventas_detalle',
        'app.guias',
        'app.guias_detalle',
        'app.ventas_detalle',
        'app.docseriev',
        'app.impuestos',
        'app.cajas_movimientos',
        'app.cajas',
        'app.libro_cajas',
        'app.tipo_efectivo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cargos') ? [] : ['className' => 'App\Model\Table\CargosTable'];
        $this->Cargos = TableRegistry::get('Cargos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cargos);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
