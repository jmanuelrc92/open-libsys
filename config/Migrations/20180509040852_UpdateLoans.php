<?php
use Migrations\AbstractMigration;

class UpdateLoans extends AbstractMigration
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
        $table = $this->table('loans');
        
        $table->dropForeignKey('book_inventory_id')
        ->removeColumn('book_inventory_id')
        ->removeColumn('loan_date_end')
        ->removeColumn('loan_date_start')
        ->addColumn('loan_date_end', 'date')
        ->addColumn('loan_date_start', 'date');
        
        $table->save();
    }
}
