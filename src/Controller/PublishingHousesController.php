<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PublishingHouses Controller
 *
 * @property \App\Model\Table\PublishingHousesTable $PublishingHouses
 *
 * @method \App\Model\Entity\PublishingHouse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PublishingHousesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $publishingHouses = $this->paginate($this->PublishingHouses);

        $this->set(compact('publishingHouses'));
    }

    /**
     * View method
     *
     * @param string|null $id Publishing House id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $publishingHouse = $this->PublishingHouses->get($id, [
            'contain' => ['Authors']
        ]);

        $this->set('publishingHouse', $publishingHouse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $publishingHouse = $this->PublishingHouses->newEntity();
        if ($this->request->is('post')) {
            $publishingHouse = $this->PublishingHouses->patchEntity($publishingHouse, $this->request->getData());
            if ($this->PublishingHouses->save($publishingHouse)) {
                $this->Flash->success(__('The publishing house has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The publishing house could not be saved. Please, try again.'));
        }
        $authors = $this->PublishingHouses->Authors->find('list', ['limit' => 200]);
        $this->set(compact('publishingHouse', 'authors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Publishing House id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $publishingHouse = $this->PublishingHouses->get($id, [
            'contain' => ['Authors']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $publishingHouse = $this->PublishingHouses->patchEntity($publishingHouse, $this->request->getData());
            if ($this->PublishingHouses->save($publishingHouse)) {
                $this->Flash->success(__('The publishing house has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The publishing house could not be saved. Please, try again.'));
        }
        $authors = $this->PublishingHouses->Authors->find('list', ['limit' => 200]);
        $this->set(compact('publishingHouse', 'authors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Publishing House id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $publishingHouse = $this->PublishingHouses->get($id);
        if ($this->PublishingHouses->delete($publishingHouse)) {
            $this->Flash->success(__('The publishing house has been deleted.'));
        } else {
            $this->Flash->error(__('The publishing house could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
