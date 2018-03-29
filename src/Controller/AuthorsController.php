<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Authors Controller
 *
 * @property \App\Model\Table\AuthorsTable $Authors
 *
 * @method \App\Model\Entity\Author[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['People'],
            'sortWhitelist' => [
                'People.last_name',
                'People.first_name',
                'created'
            ]
        ];
        $authors = $this->paginate($this->Authors);

        $this->set(compact('authors'));
    }

    /**
     * View method
     *
     * @param string|null $id Author id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $author = $this->Authors->get($id, [
            'contain' => ['People', 'Books', 'PublishingHouses']
        ]);

        $this->set('author', $author);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {        
        $author = $this->Authors->newEntity();
        $peopleTable = TableRegistry::get('people');
        $person = $peopleTable->newEntity();
        if ($this->request->is('post')) {
            $person = $peopleTable->patchEntity($person, $this->request->getData());
            $person = $peopleTable->save($person);
            if($person) {
                $author = $this->Authors->patchEntity($author, $this->request->getData());
                $author->person_id = $person->id;
                if ($this->Authors->save($author)) {
                    $this->Flash->success(__('The author has been saved.'));
                    
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('The author could not be saved. Please, try again.'));
        }
        $publishingHouses = $this->Authors->PublishingHouses->find('list', ['limit' => 200]);
        $this->set(compact('author', 'publishingHouses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Author id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $author = $this->Authors->get($id, [
            'contain' => ['PublishingHouses', 'People']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $author = $this->Authors->patchEntity($author, $this->request->getData());
            if ($this->Authors->save($author)) {
                $this->Flash->success(__('The author has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The author could not be saved. Please, try again.'));
        }
        $people = $this->Authors->People->find('list', ['limit' => 200]);
        $books = $this->Authors->Books->find('list', ['limit' => 200]);
        $publishingHouses = $this->Authors->PublishingHouses->find('list', ['limit' => 200]);
        $this->set(compact('author', 'people', 'books', 'publishingHouses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Author id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $author = $this->Authors->get($id);
        if ($this->Authors->delete($author)) {
            $this->Flash->success(__('The author has been deleted.'));
        } else {
            $this->Flash->error(__('The author could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
