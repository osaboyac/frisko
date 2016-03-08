<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AclPhinxlogTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AclPhinxlogTable Test Case
 */
class AclPhinxlogTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AclPhinxlogTable
     */
    public $AclPhinxlog;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.acl_phinxlog'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AclPhinxlog') ? [] : ['className' => 'App\Model\Table\AclPhinxlogTable'];
        $this->AclPhinxlog = TableRegistry::get('AclPhinxlog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AclPhinxlog);

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
