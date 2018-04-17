<?php
namespace App\Controller;

/**
 * BookInventories Controller
 *
 * @property \App\Model\Table\BookInventoriesTable $BookInventories
 *
 * @method \App\Model\Entity\BookInventory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookInventoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Books', 'Locations']
        ];
        $bookInventories = $this->paginate($this->BookInventories);

        $this->set(compact('bookInventories'));
    }

    /**
     * View method
     *
     * @param string|null $id Book Inventory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookInventory = $this->BookInventories->get($id, [
            'contain' => ['Books.Authors.People', 'Locations']
        ]);

        $this->set('bookInventory', $bookInventory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookInventory = $this->BookInventories->newEntity();
        if ($this->request->is('post')) {
            $bookInventory = $this->BookInventories->patchEntity($bookInventory, $this->request->getData());
            if ($this->BookInventories->save($bookInventory)) {
                $this->Flash->success(__('The book inventory has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book inventory could not be saved. Please, try again.   ').json_encode($bookInventory->getErrors()));
        }
        $books = $this->BookInventories->Books->find('list', ['limit' => 200]);
        $locations = $this->BookInventories->Locations->find('list', ['limit' => 200]);
        $this->set(compact('bookInventory', 'books', 'locations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Book Inventory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookInventory = $this->BookInventories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookInventory = $this->BookInventories->patchEntity($bookInventory, $this->request->getData());
            if ($this->BookInventories->save($bookInventory)) {
                $this->Flash->success(__('The book inventory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book inventory could not be saved. Please, try again.'));
        }
        $books = $this->BookInventories->Books->find('list', ['limit' => 200]);
        $locations = $this->BookInventories->Locations->find('list', ['limit' => 200]);
        $this->set(compact('bookInventory', 'books', 'locations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book Inventory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookInventory = $this->BookInventories->get($id);
        if ($this->BookInventories->delete($bookInventory)) {
            $this->Flash->success(__('The book inventory has been deleted.'));
        } else {
            $this->Flash->error(__('The book inventory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
