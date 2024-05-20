<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CervezasFixture
 */
class CervezasFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'Cervezas';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '99795af1-f0b6-4463-8817-adb1d55acff6',
                'ref' => 'Lorem ipsum dolor ',
                'slug' => 'Lorem ipsum dolor sit amet',
                'nombre' => 'Lorem ipsum dolor sit amet',
                'descripcion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'precio' => 1.5,
                'stock' => 1,
                'media_valoracion' => 1.5,
                'tipo' => 'Lorem ipsum dolor sit amet',
                'ibu' => 1,
                'grados_alcohol' => 1.5,
                'color' => 'Lorem ipsum dolor sit amet',
                'origen' => 'Lorem ipsum dolor sit amet',
                'familia_estilos' => 'Lorem ipsum dolor sit amet',
                'sabor_dominante' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
