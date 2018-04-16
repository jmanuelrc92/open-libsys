<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

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
        ->addColumn('role_id', 'integer')
        ->addColumn('created', 'datetime')
        ->addColumn('modified', 'datetime', ['null' => true])
        ->addForeignKey('person_id', 'people', 'id')
        ->addForeignKey('role_id', 'roles', 'id')
        ->addIndex('username', ['unique' => true]);
        
        $table->create();
        
        $table->insert([
            'username' => 'admin@openlibrary.org',
            'password' => (new DefaultPasswordHasher())->hash('admin'),
            'created' => date('Y-m-d H:i:s'),
            'person_id' => 1,
            'role_id' => 1
        ]);
        
        $table->save();
    }
    
}
