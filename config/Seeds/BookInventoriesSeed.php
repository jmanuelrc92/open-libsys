<?php
use Migrations\AbstractSeed;
use Cake\ORM\TableRegistry;

/**
 * BookInventoriesSeed seed.
 */
class BookInventoriesSeed extends AbstractSeed
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
        $books = TableRegistry::get('books')->find('all');
        
        $locationsMaxId = TableRegistry::get('locations')->find('all')->max('id');
        
        $data = [];
        
        foreach ($books as $book) {
            $inventoryPerBook = rand(1, 4);
            $counter = 0;
            do {
                $data[] = [
                    'location_id' => rand(1, $locationsMaxId->id),
                    'book_id' => $book->id,
                    'created' => date('Y-m-d H:i:s'),
                    'available' => true
                ];
                $counter ++;
            } while ($counter < $inventoryPerBook);
        }
        
        $table = $this->table('book_inventories');
        $table->insert($data)->save();
    }

}
