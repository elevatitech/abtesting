<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccessLogTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccessLogTable Test Case
 */
class AccessLogTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccessLogTable
     */
    protected $AccessLog;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AccessLog',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AccessLog') ? [] : ['className' => AccessLogTable::class];
        $this->AccessLog = $this->getTableLocator()->get('AccessLog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AccessLog);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AccessLogTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
