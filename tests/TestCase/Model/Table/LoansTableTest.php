<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoansTable Test Case
 */
class LoansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LoansTable
     */
    public $Loans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.loans',
        'app.users',
        'app.people',
        'app.authors',
        'app.books',
        'app.book_inventories',
        'app.authors_books',
        'app.publishing_houses',
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
        $config = TableRegistry::exists('Loans') ? [] : ['className' => LoansTable::class];
        $this->Loans = TableRegistry::get('Loans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Loans);

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
