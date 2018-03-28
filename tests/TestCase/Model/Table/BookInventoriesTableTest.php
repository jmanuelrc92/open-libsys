<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookInventoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookInventoriesTable Test Case
 */
class BookInventoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BookInventoriesTable
     */
    public $BookInventories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.book_inventories',
        'app.books',
        'app.authors',
        'app.people',
        'app.users',
        'app.roles',
        'app.loans',
        'app.authors_books',
        'app.publishing_houses',
        'app.authors_publishing_houses',
        'app.locations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BookInventories') ? [] : ['className' => BookInventoriesTable::class];
        $this->BookInventories = TableRegistry::get('BookInventories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BookInventories);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
