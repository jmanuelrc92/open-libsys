<?php
namespace App\Controller;

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
            'contain' => [
                'Users',
                'BookInventories'
            ],
            'sortWhitelist' => [
                'BookInventories.serial',
                'Users.username',
                'loan_date_start',
                'loan_date_end',
                'active_loan'
            ]
        ];
        $loans = $this->paginate($this->Loans->query()
            ->where([
            'active_loan' => true
        ]));
        
        $this->set(compact('loans'));
    }

    /**
     * View method
     *
     * @param string|null $id
     *            Loan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loan = $this->Loans->get($id, [
            'contain' => [
                'Users.People',
                'BookInventories.Books'
            ]
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
            $loan = $this->Loans->patchEntity($loan, $this->request->getData(), ['associated' => []]);
            if ($this->Loans->save($loan)) {
                $this->Flash->success(__('The loan has been saved.'));
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The loan could not be saved. Please, try again. ').json_encode($loan->getErrors()));
        }
        $users = $this->Loans->Users->find('list', [
            'limit' => 200
        ])->leftJoin('roles','roles.id = role_id')
        ->where(['roles.role_name !=' => 'ADMIN']);
        $this->set(compact('loan', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id
     *            Loan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loan = $this->Loans->get($id, [
            'contain' => [
                'Users',
                'BookInventories.Books'
            ]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requestData = $this->request->getData();
            $loan = $this->Loans->patchEntity($loan, $this->request->getData());
            if ($this->Loans->save($loan)) {
                $this->Flash->success(__('The loan has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loan could not be saved. Please, try again.'));
        }
        $users = $this->Loans->Users->find('list', [
            'limit' => 200
        ]);
        $this->set(compact('loan', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id
     *            Loan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $loan = $this->Loans->get($id);
        if ($this->Loans->delete($loan)) {
            $this->Flash->success(__('The loan has been deleted.'));
        } else {
            $this->Flash->error(__('The loan could not be deleted. Please, try again.'));
        }
        
        return $this->redirect([
            'action' => 'index'
        ]);
    }
}
