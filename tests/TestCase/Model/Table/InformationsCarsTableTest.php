<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InformationsCarsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InformationsCarsTable Test Case
 */
class InformationsCarsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InformationsCarsTable
     */
    public $InformationsCars;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.InformationsCars',
        'app.Cars',
        'app.Informations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InformationsCars') ? [] : ['className' => InformationsCarsTable::class];
        $this->InformationsCars = TableRegistry::getTableLocator()->get('InformationsCars', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InformationsCars);

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
