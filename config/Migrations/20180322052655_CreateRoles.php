<?php
use Migrations\AbstractMigration;

class CreateRoles extends AbstractMigration
{

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * @return void
     */
    public function change()
    {
        $table = $this->table('roles');
        
        $table->addColumn('role_name', 'string', [
            'limit' => 10
        ])->addColumn('created', 'datetime');
        
        $table->create();
        
        $table->insert([
            'role_name' => 'ADMIN',
            'created' => date('Y-m-d H:i:s')
        ], [
            'role_name' => 'NORMAL',
            'created' => date('Y-m-d H:i:s')
        ]);
        $table->save();        
    }
}
