<?php
use Migrations\AbstractSeed;
use Cake\ORM\TableRegistry;

/**
 * AuthorsBooks seed.
 */
class AuthorsBooksSeed extends AbstractSeed
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
    private $authorBooks = [];
    
    public function run()
    {
        $maxBookId = TableRegistry::get('books')
        ->find('all')
        ->max('id');
        
        $authors = TableRegistry::get('authors')
        ->find('all');
        
        $data = [];
        
        foreach ($authors as $author) {
            $booksPerAuthor = rand(1, 4);
            $counter = 0;
            $this->authorBooks = [];
            do {
                $bookId = rand(1, $maxBookId->id);
                if ($this->checkAuthorBook($bookId)) {
                    $data[] = [
                        'id' => $author->id.'-'.$bookId,
                        'author_id' => $author->id,
                        'book_id' => $bookId,
                        'created' => date ('Y-m-d H:i:s')
                    ];
                    $this->authorBooks[] = $bookId;
                    $counter++;
                }
            } while ($counter < $booksPerAuthor);
        }
        
        $table = $this->table('authors_books');
        $table->insert($data)->save();
    }

    private function checkAuthorBook(int $bookId)
    {
        foreach ($this->authorBooks as $book) {
            if ($bookId == $book) {
                return false;
            }
        }
        return true;
    }
}
