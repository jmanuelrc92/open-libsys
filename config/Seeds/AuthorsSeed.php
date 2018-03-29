<?php
use Migrations\AbstractSeed;
use Cake\ORM\TableRegistry;

/**
 * Authors seed.
 */
class AuthorsSeed extends AbstractSeed
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
        $people = TableRegistry::get('people')->find('all')->where(['id >' => 1]);
        $data = [];
        
        foreach ($people as $person) {
            $data[] = [
                'person_id' => $person->id,
                'created' => date('Y-m-d H:i:s')
            ];
        }
        
        $table = $this->table('authors');
        $table->insert($data)->save();
    }
}
