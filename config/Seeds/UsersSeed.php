<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'username' => 'admin@openlibrary.org',
                'password' => (new DefaultPasswordHasher())->hash('admin'),
                'created' => date('Y-m-d H:i:s'),
                'person_id' => 1,
                'role_id' => 1
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
