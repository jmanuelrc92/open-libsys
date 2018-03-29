<?php
namespace App\Test\TestCase\Controller;

use App\Controller\BookInventoriesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\BookInventoriesController Test Case
 */
class BookInventoriesControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
