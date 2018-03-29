<?php
use Migrations\AbstractMigration;

class CreatePublishingHouses extends AbstractMigration
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
        $table = $this->table('publishing_houses');
        
        $table->addColumn('publishing_house_name', 'string', ['limit' => 250])
        ->addColumn('created', 'datetime')
        ->addColumn('modified', 'datetime');
        
        $table->create();
    }
}
