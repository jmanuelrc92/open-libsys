<?php
use Migrations\AbstractMigration;

class CreateLoanDetails extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('loan_details', ['id' => false, 'primary_key' => ['id']]);
        
        $table->addColumn('id', 'string', ['limit' => 20])
        ->addColumn('loan_id', 'integer')
        ->addColumn('book_inventory_id', 'integer')
        ->addColumn('created', 'datetime')
        ->addForeignKey('loan_id', 'loans', 'id')
        ->addForeignKey('book_inventory_id', 'book_inventories', 'id');
        
        $table->create();
    }
}
