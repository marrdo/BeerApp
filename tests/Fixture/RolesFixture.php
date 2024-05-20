<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RolesFixture
 */
class RolesFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'Roles';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '2670949b-0c94-4407-9f5a-6f79a9e6a560',
                'nombre' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
