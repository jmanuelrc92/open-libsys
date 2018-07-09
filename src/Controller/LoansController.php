<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Loans Controller
 *
 * @property \App\Model\Table\LoansTable $Loans
 *
 * @method \App\Model\Entity\Loan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoansController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $loans = $this->paginate($this->Loans);

        $this->set(compact('loans'));
    }

    /**
     * View method
     *
     * @param string|null $id Loan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loan = $this->Loans->get($id, [
            'contain' => ['Users.People', 'LoanDetails.BookInventories.Books.Authors.People']
        ]);

        $this->set('loan', $loan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loan = $this->Loans->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $loan = $this->Loans->patchEntity($loan, $data);
            if ($this->Loans->save($loan)) {
                if ($this->Loans->saveDetails($loan, $data['loan_details'], 'add')) {
                    $this->Flash->success(__('The loan has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                //borrar loan
                $this->Loans->delete($loan);
            }
            $this->Flash->error(__('The loan could not be saved. Please, try again.'));
            $this->Flash->error(json_encode($loan->getErrors()));
        }
        
        $users = $this->Loans->Users->find('list')
        ->leftJoin('roles', 'roles.id = role_id')
        ->where(['roles.role_name !=' => 'ADMIN']);
        
        $this->set(compact('loan', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Loan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loan = $this->Loans->get($id, [
            'contain' => ['LoanDetails.BookInventories.Books.Authors.People', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loan = $this->Loans->patchEntity($loan, $this->request->getData());
            if ($this->Loans->save($loan)) {
                $this->Loans->saveDetails($loan, $loan->loan_details, 'edit');
                $this->Flash->success(__('The loan has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loan could not be saved. Please, try again.'));
        }
        $users = $this->Loans->Users->find('list')
        ->leftJoin('roles', 'roles.id = role_id')
        ->where(['roles.role_name !=' => 'ADMIN']);
        
        $this->set(compact('loan', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Loan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loan = $this->Loans->get($id);
        if ($this->Loans->delete($loan)) {
            $this->Flash->success(__('The loan has been deleted.'));
        } else {
            $this->Flash->error(__('The loan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
