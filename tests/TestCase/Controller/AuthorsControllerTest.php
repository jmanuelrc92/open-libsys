<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AuthorsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AuthorsController Test Case
 */
class AuthorsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.authors',
        'app.people',
        'app.users',
        'app.roles',
        'app.loans',
        'app.book_inventories',
        'app.books',
        'app.authors_books',
        'app.publishing_houses',
        'app.authors_publishing_houses'
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
