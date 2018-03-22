<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        $table = $this->table('users');
        
        $table->addColumn('person_id', 'integer')
        ->addColumn('username', 'string',['limit' => 50])
        ->addColumn('password', 'string', ['limit' => 255])
        ->addColumn('active', 'boolean')
        ->addColumn('created', 'datetime')
        ->addColumn('modified', 'datetime')
        ->addForeignKey('person_id', 'people', 'id')
        ->addIndex('username', ['unique' => true]);
        
        $table->create();
    }
}
