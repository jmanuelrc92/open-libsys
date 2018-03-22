<?php
use Migrations\AbstractMigration;

class CreateAuthors extends AbstractMigration
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
        $table = $this->table('authors');
        
        $table->addColumn('person_id', 'integer')
        ->addColumn('created', 'datetime')
        ->addColumn('modified', 'datetime')
        ->addForeignKey('person_id', 'people', 'id');
        
        $table->create();
    }
}
