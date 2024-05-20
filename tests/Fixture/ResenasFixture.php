<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResenasFixture
 */
class ResenasFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'Resenas';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '366e712b-401a-44a6-9ff5-62ab8f09d4ab',
                'ref' => 'Lorem ipsum dolor ',
                'slug' => 'Lorem ipsum dolor sit amet',
                'calificacion' => 1.5,
                'user_id' => 'dfc4b9cb-f06a-4c5d-8f05-662b32109feb',
                'cerveza_id' => '34c29e21-d97f-423c-867d-40a02eb4edda',
                'comentario' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            ],
        ];
        parent::init();
    }
}
