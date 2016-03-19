<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CtacorrientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CtacorrientesTable Test Case
 */
class CtacorrientesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CtacorrientesTable
     */
    public $Ctacorrientes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ctacorrientes',
        'app.bancos',
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
        'app.monedas',
        'app.impuestos',
        'app.docseriev'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ctacorrientes') ? [] : ['className' => 'App\Model\Table\CtacorrientesTable'];
        $this->Ctacorrientes = TableRegistry::get('Ctacorrientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ctacorrientes);

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
