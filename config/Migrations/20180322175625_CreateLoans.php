<?php
use Migrations\AbstractMigration;

class CreateLoans extends AbstractMigration
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
        $table = $this->table('loans', ['id' => false, 'primary_key' => 'id']);
        
        $table->addColumn('id', 'string', ['limit' => 20])
        ->addColumn('user_id', 'integer')
        ->addColumn('book_inventory_id', 'string', ['limit' => 20])
        ->addColumn('loan_date_start', 'datetime')
        ->addColumn('loan_date_end', 'datetime')
        ->addColumn('active_loan', 'boolean')
        ->addForeignKey('user_id', 'users', 'id')
        ->addForeignKey('book_inventory_id', 'book_inventories', 'id');
        
        $table->create();
    }
}
