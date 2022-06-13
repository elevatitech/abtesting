<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\AccessLogController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\AccessLogController Test Case
 *
 * @uses \App\Controller\AccessLogController
 */
class AccessLogControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AccessLog',
    ];
    
    public function setUp(): void
    {
        $this->session(['Auth.User.id' => 1]);
        parent::setUp();
    }

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\AccessLogController::index()
     */
    public function testIndex(): void
    {
        $this->get('/access-log');
        
        $this->assertResponseOk();
    }

}
