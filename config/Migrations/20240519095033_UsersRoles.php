<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class RolesUsuarios extends AbstractMigration
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
        $table = $this->table('Users_roles');
        $table->addColumn('user_id', 'uuid', [
            'default' => null,
            'limit' => 36,
            'null' => false,
        ]);
        $table->addColumn('roles_id', 'uuid', [
            'default' => null,
            'limit' => 36,
            'null' => false,
        ])
            ->addForeignKey('user_id', 'Users', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('roles_id', 'Roles', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ]);
        $table->addIndex([
            'user_id',

        ], [
            'name' => 'BY_USER_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'roles_id',

        ], [
            'name' => 'BY_ROLES_ID',
            'unique' => false,
        ]);
        $table->create();
    }
}
