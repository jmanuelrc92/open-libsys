<?php
use Migrations\AbstractMigration;

class ChangeNameOnPeople extends AbstractMigration
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
        $table = $this->table('people');
        
        $table->removeColumn('middle_name')
        ->removeColumn('sur_name')
        ->changeColumn('first_name', 'string', ['limit' => 150])
        ->changeColumn('last_name', 'string', ['limit' => 150]);
        
        $table->update();
    }
}
