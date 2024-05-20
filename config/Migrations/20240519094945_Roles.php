<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class Roles extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('Roles', ['id' => false, 'primary_key' => ['id']]);
        $table
            ->addColumn('id', 'uuid', [
                'default' => Cake\Utility\Text::uuid(),
                'limit' => 36,
                'null' => false,
            ])
            ->addColumn('nombre', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ]);
        $table->create();
    }
}
