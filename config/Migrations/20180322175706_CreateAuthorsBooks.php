<?php
use Migrations\AbstractMigration;

class CreateAuthorsBooks extends AbstractMigration
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
        $table = $this->table('authors_books', ['id' => false, 'primary_key' => 'id']);
        
        $table->addColumn('id', 'string', ['limit' => 20])
        ->addColumn('author_id', 'integer')
        ->addColumn('book_id', 'integer')
        ->addColumn('created', 'datetime')
        ->addForeignKey('author_id', 'authors', 'id')
        ->addForeignKey('book_id', 'books', 'id');
        
        $table->create();
    }
}
