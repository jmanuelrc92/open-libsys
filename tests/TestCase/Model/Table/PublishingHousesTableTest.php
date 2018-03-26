<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PublishingHousesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PublishingHousesTable Test Case
 */
class PublishingHousesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PublishingHousesTable
     */
    public $PublishingHouses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.publishing_houses',
        'app.authors',
        'app.people',
        'app.users',
        'app.loans',
        'app.book_inventories',
        'app.books',
        'app.authors_books',
        'app.authors_publishing_houses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PublishingHouses') ? [] : ['className' => PublishingHousesTable::class];
        $this->PublishingHouses = TableRegistry::get('PublishingHouses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PublishingHouses);

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
}
