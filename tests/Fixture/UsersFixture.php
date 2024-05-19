<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'beerapp.Users';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'f19a5e07-4d0b-4159-927f-a6579ceb6438',
                'dni' => 'Lorem ipsum dolor ',
                'nombre' => 'Lorem ipsum dolor sit amet',
                'apellidos' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'direccion' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
