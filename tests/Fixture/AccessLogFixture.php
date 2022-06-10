<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccessLogFixture
 */
class AccessLogFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'access_log';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'page' => 'Lorem ipsum dolor sit amet',
                'version' => 'Lorem ipsum dolor sit amet',
                'referrer' => 'Lorem ipsum dolor sit amet',
                'is_view' => 1,
                'is_click' => 1,
                'created' => '2022-06-10 04:06:42',
            ],
        ];
        parent::init();
    }
}
