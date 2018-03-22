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
        $table = $this->table('book_inventories', ['id' => false, 'primary_key' => 'id']);
        
        $table->addColumn('id', 'string', ['limit' => 20])
        ->addColumn('book_id', 'integer')
        ->addColumn('available', 'boolean')
        ->addColumn('location_id', 'integer')
        ->addColumn('created', 'datetime')
        ->addColumn('modified', 'datetime')
        ->addForeignKey('book_id', 'books', 'id')
        ->addForeignKey('location_id', 'locations', 'id');
        
        $table->create();
    }
}
