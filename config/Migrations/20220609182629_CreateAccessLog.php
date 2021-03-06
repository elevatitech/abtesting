<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateAccessLog extends AbstractMigration
{
    public $autoId = false;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('access_log');

        $table->addColumn('page', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('version', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('referrer', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('ip', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('is_view', 'integer', [
            'default' => 0,
            'limit' => 1,
            'signed' => false,
            'null' => false,
        ]);
        $table->addColumn('is_click', 'integer', [
            'default' => 0,
            'limit' => 1,
            'signed' => false,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ]);

        $table->addIndex(['version', 'is_view', 'created']);
        $table->addIndex(['version', 'is_click', 'created']);

        $table->create();
    }
}
