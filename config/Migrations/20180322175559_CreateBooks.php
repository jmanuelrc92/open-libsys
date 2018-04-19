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
        
        $table->addColumn('title', 'string')
        ->addColumn('isbn_code', 'string', ['limit' => 15])
        ->addColumn('description', 'string')
        ->addColumn('publishing_house_id', 'integer')
        ->addColumn('author_id', 'integer')
        ->addColumn('created', 'datetime')
        ->addColumn('modified', 'datetime', ['null' => true])
        ->addColumn('deleted_at', 'datetime', ['null' => true])
        ->addForeignKey('publishing_house_id', 'publishing_houses')
        ->addForeignKey('author_id', 'authors');
        
        $table->create();
    }
}
