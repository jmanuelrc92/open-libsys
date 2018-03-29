<?php
use Migrations\AbstractSeed;

/**
 * Roles seed.
 */
class RolesSeed extends AbstractSeed
{

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'role_name' => 'ADMIN',
                'created' => date('Y-m-d H:i:s')
            ],
            [
                'role_name' => 'NORMAL',
                'created' => date('Y-m-d H:i:s')
            ]
        ];
        
        $table = $this->table('roles');
        $table->insert($data)->save();
    }
}
