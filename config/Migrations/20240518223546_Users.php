<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Users extends AbstractMigration
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
        $table = $this->table('Users',['id' => false, 'primary_key' => ['id']]);
        
        
        $table
        ->addColumn('id', 'uuid', [
            'limit' => 36,
            'null' => false,
            'default' => Cake\Utility\Text::uuid()
        ])
        ->addColumn('dni', 'string', [
            'limit' => 20,
            'null' => false,
        ])
        ->addColumn('nombre', 'string', [
            'limit' => 100,
            'null' => false,
        ])
        ->addColumn('apellidos', 'string', [
            'limit' => 100,
            'null' => false,
        ])
        ->addColumn('email', 'string', [
            'limit' => 100,
            'null' => false,
        ])
        ->addColumn('direccion', 'string', [
            'limit' => 255,
            'null' => false,
        ])
        ->addColumn('password', 'string', [
            'limit' => 255,
            'null' => false,
        ])
        ->addIndex(['dni'], ['unique' => true])
        ->addIndex(['email'], ['unique' => true])
        ->create();
    }
}
