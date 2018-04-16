<?php
use Migrations\AbstractMigration;

class CreatePeople extends AbstractMigration
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
        $table = $this->table('people');
        
        $table->addColumn('first_name', 'string', ['limit' => 50])
        ->addColumn('middle_name', 'string', ['limit' => 50])
        ->addColumn('last_name', 'string', ['limit' => 50])
        ->addColumn('sur_name', 'string', ['limit' => 50])
        ->addColumn('created', 'datetime')
        ->addColumn('modified', 'datetime', ['null' => true]);
        
        $table->create();
        
        $table->insert([
            'first_name' => 'System',
            'middle_name' => '',
            'last_name' => 'Admin',
            'sur_name' => '',
            'created' => date('Y-m-d H:i:s')
        ]);
        $table->save();
    }
    
}
