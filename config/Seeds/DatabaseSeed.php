<?php
use Migrations\AbstractSeed;

/**
 * DatabaseSeeder seed.
 */
class DatabaseSeed extends AbstractSeed
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
        $this->call('PeopleSeed');
        $this->call('BooksSeed');
        $this->call('LocationsSeed');
        $this->call('PublishingHousesSeed');
        $this->call('AuthorsSeed');
        $this->call('AuthorsBooksSeed');
        $this->call('AuthorsPublishingHousesSeed');
        $this->call('BookInventoriesSeed');
    }
}
