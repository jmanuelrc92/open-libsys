<?php
use Faker\Factory;
use Migrations\AbstractSeed;

/**
 * PublishingHouses seed.
 */
class PublishingHousesSeed extends AbstractSeed
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
        for ($i = 0; $i < 100; $i ++) {
            $data[] = [
                'publishing_house_name' => $faker->company,
                'created' => date('Y-m-d H:i:s')
            ];
        }        
        $table = $this->table('publishing_houses');
        $table->insert($data)->save();
    }
}
