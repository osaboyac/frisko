<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CajasMovimientosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CajasMovimientosTable Test Case
 */
class CajasMovimientosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CajasMovimientosTable
     */
    public $CajasMovimientos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cajas_movimientos',
        'app.cajas',
        'app.libro_cajas',
        'app.monedas',
        'app.ctacorrientes',
        'app.depositos',
        'app.articulo_precios',
        'app.lista_precios',
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
        'app.articulos_info',
        'app.guias_detalle',
        'app.guias',
        'app.orden_ventas',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.roles',
        'app.ventas',
        'app.documentos',
        'app.docseries',
        'app.forma_pagos',
        'app.ventas_detalle',
        'app.orden_ventas_detalle',
        'app.ingresos_detalle',
        'app.ingresos',
        'app.orden_compras',
        'app.orden_compras_detalle',
        'app.impuestos',
        'app.docseriev',
        'app.cargos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CajasMovimientos') ? [] : ['className' => 'App\Model\Table\CajasMovimientosTable'];
        $this->CajasMovimientos = TableRegistry::get('CajasMovimientos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CajasMovimientos);

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
