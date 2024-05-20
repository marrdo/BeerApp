<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersRolesFixture
 */
class UsersRolesFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'Users_roles';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => '9073bc17-ea2b-4dab-9bb8-7f5bf368e46a',
                'roles_id' => '1888881c-6483-42e2-9d2b-4c7db30a9428',
            ],
        ];
        parent::init();
    }
}
