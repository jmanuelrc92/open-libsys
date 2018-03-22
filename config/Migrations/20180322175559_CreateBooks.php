<?php
use Migrations\AbstractMigration;

class CreateBooks extends AbstractMigration
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
        $table = $this->table('books');
        
        $table->addColumn('title', 'string',['limit' => 250])
        ->addColumn('isbn_code', 'string', ['limit' => 20])
        ->addColumn('description', 'string')
        ->addColumn('created', 'datetime')
        ->addColumn('modified', 'datetime');
        
        $table->create();
    }
}
