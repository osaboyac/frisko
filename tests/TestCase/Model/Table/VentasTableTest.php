<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VentasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VentasTable Test Case
 */
class VentasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VentasTable
     */
    public $Ventas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ventas',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
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
        'app.docseriev',
        'app.guias',
        'app.orden_ventas',
        'app.forma_pagos',
        'app.orden_ventas_detalle',
        'app.guias_detalle',
        'app.impuestos',
        'app.ventas_detalle',
        'app.roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ventas') ? [] : ['className' => 'App\Model\Table\VentasTable'];
        $this->Ventas = TableRegistry::get('Ventas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ventas);

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
