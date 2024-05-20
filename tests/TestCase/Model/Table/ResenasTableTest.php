<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResenasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResenasTable Test Case
 */
class ResenasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResenasTable
     */
    protected $Resenas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Resenas',
        'app.Users',
        'app.Cervezas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Resenas') ? [] : ['className' => ResenasTable::class];
        $this->Resenas = $this->getTableLocator()->get('Resenas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Resenas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ResenasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ResenasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
