<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Beers extends AbstractMigration
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
        $table = $this->table('Cervezas',['id' => false, 'primary_key' => ['id']]);
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
            ->addColumn('nombre', 'string', [
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('descripcion', 'text', [
                'null' => true,
            ])
            ->addColumn('precio', 'decimal', [
                'precision' => 10,
                'scale' => 2,
                'null' => true,
            ])
            ->addColumn('stock', 'integer', [
                'null' => true,
            ])
            ->addColumn('media_valoracion', 'decimal', [
                'precision' => 3,
                'scale' => 2,
                'null' => true,
            ])
            ->addColumn('tipo', 'string', [
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('ibu', 'integer', [
                'null' => true,
            ])
            ->addColumn('grados_alcohol', 'decimal', [
                'precision' => 4,
                'scale' => 2,
                'null' => true,
            ])
            ->addColumn('color', 'string', [
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('origen', 'string', [
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('familia_estilos', 'string', [
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('sabor_dominante', 'string', [
                'limit' => 50,
                'null' => true,
            ])
            ->addIndex(['ref'], ['unique' => true])
            ->addIndex(['slug'], ['unique' => true])
            ->create();
    }
}
