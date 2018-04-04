<?php
use Migrations\AbstractSeed;
use Cake\ORM\TableRegistry;

/**
 * AuthorsPublishingHouses seed.
 */
class AuthorsPublishingHousesSeed extends AbstractSeed
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
    private $authorPublishingHouses = [];
    
    public function run()
    {
        $maxPublishingHouseId = TableRegistry::get('publishing_houses')
        ->find('all')
        ->max('id');
        
        $authors = TableRegistry::get('authors')
        ->find('all');
        
        $data = [];
        
        foreach ($authors as $author) {
            $publishingHousesPerAuthor = rand(1, 2);
            $counter = 0;
            $this->authorPublishingHouses = [];
            do {
                $publishingHouseId = rand(1, $maxPublishingHouseId->id);
                if ($this->checkAuthorPublishingHouse($publishingHouseId)) {
                    $data[] = [
                        'id' => $author->id.'-'.$publishingHouseId,
                        'author_id' => $author->id,
                        'publishing_house_id' => $publishingHouseId,
                        'created' => date ('Y-m-d H:i:s')
                    ];
                    $this->authorPublishingHouses[] = $publishingHouseId;
                    $counter++;
                }
            } while ($counter < $publishingHousesPerAuthor);
        }
        
        $table = $this->table('authors_publishing_houses');
        $table->insert($data)->save();
    }
    
    private function checkAuthorPublishingHouse(int $publishingHouseId)
    {
        foreach ($this->authorPublishingHouses as $publishingHouse) {
            if ($publishingHouseId == $publishingHouse) {
                return false;
            }
        }
        return true;
    }
}
