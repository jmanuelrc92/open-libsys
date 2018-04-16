<?php
use Migrations\AbstractMigration;

class CreateLocations extends AbstractMigration
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
        $table = $this->table('locations');
        
        $table->addColumn('location_name', 'string',['limit' => 50])
        ->addColumn('location_code', 'string', ['limit' => 10])
        ->addColumn('created', 'datetime')
        ->addColumn('modified', 'datetime', ['null' => true])
        ->addColumn('deleted_at', 'datetime', ['null' => true]);
        
        $table->create();
    }
}
