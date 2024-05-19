<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Reviews extends AbstractMigration
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
        $table = $this->table('Resenas', ['id' => false, 'primary_key' => ['id']]);
        $table
            ->addColumn('id', 'uuid', [
                'limit' => 36,
                'null' => false,
                'default' => Cake\Utility\Text::uuid()
            ])
            ->addColumn('ref', 'string', [
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('slug', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('calificacion', 'decimal', [
                'precision' => 3,
                'scale' => 2,
                'null' => false,
            ])
            ->addColumn('user_id', 'uuid', [
                'limit' => 36,
                'null' => false,
            ])
            ->addColumn('cerveza_id', 'uuid', [
                'limit' => 36,
                'null' => false,
            ])
            ->addColumn('comentario', 'text', [
                'null' => true,
            ])
            ->addForeignKey('user_id', 'Users', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE',
            ])
            ->addForeignKey('cerveza_id', 'Cervezas', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE',
            ])
            ->addIndex(['ref'], ['unique' => true])
            ->addIndex(['slug'], ['unique' => true])
            ->create();
    }
}
