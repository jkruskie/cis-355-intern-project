<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InternshipsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InternshipsTable Test Case
 */
class InternshipsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InternshipsTable
     */
    protected $Internships;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Internships',
        'app.Applications',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Internships') ? [] : ['className' => InternshipsTable::class];
        $this->Internships = $this->getTableLocator()->get('Internships', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Internships);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
