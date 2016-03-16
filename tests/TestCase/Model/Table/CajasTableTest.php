<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CajasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CajasTable Test Case
 */
class CajasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CajasTable
     */
    public $Cajas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.cajas_movimientos',
        'app.tipo_efectivo',
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
        $config = TableRegistry::exists('Cajas') ? [] : ['className' => 'App\Model\Table\CajasTable'];
        $this->Cajas = TableRegistry::get('Cajas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cajas);

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
