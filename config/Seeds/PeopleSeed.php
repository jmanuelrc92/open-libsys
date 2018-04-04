<?php
use Migrations\AbstractSeed;
use Faker\Factory;

/**
 * People seed.
 */
class PeopleSeed extends AbstractSeed
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
        $faker = Factory::create();
        $data = [];
        for ($i = 0; $i < 150; $i++) {
            $data[] = [
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'sur_name' => $faker->lastName,
                'created' => date('Y-m-d H:i:s')
            ];
        }
        $table = $this->table('people');
        $table->insert($data)->save();
    }
}
