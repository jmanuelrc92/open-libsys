<?php
use Faker\Factory;
use Migrations\AbstractSeed;

/**
 * Locations seed.
 */
class LocationsSeed extends AbstractSeed
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
        for ($i = 0; $i < 30; $i ++) {
            $data[] = [
                'location_name' => $faker->countryCode,
                'location_code' => $faker->countryCode.'-'.$faker->languageCode,
                'created' => date('Y-m-d H:i:s')
            ];
        }
        $this->insert('locations', $data);
    }
}
