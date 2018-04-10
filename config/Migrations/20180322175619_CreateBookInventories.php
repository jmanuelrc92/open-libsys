<?php
use Migrations\AbstractMigration;

class CreateBookInventories extends AbstractMigration
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
        $table = $this->table('book_inventories');
        
        $table->addColumn('book_id', 'integer')
        ->addColumn('available', 'boolean')
        ->addColumn('location_id', 'integer')
        ->addColumn('serial', 'string', ['limit' => 20])
        ->addColumn('created', 'datetime')
        ->addColumn('modified', 'datetime')
        ->addColumn('deleted_at', 'datetime', ['null' => true])
        ->addForeignKey('book_id', 'books', 'id')
        ->addForeignKey('location_id', 'locations', 'id');
        
        $table->create();
    }
}
