<?php
use Faker\Factory;
use Migrations\AbstractSeed;

/**
 * Books seed.
 */
class BooksSeed extends AbstractSeed
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
                'title' => $faker->sentence,
                'isbn_code' => $faker->isbn10,
                'description' => $faker->paragraph,
                'created' => date('Y-m-d H:i:s')
            ];
            
            $data[] = [
                'title' => $faker->sentence,
                'isbn_code' => $faker->isbn13,
                'description' => $faker->paragraph,
                'created' => date('Y-m-d H:i:s')
            ];
        }
        
        $table = $this->table('books');
        $table->insert($data)->save();
    }
}
