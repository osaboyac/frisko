<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Depositos Controller
 *
 * @property \App\Model\Table\DepositosTable $Depositos
 */
class DepositosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $depositos = $this->paginate($this->Depositos);

        $this->set(compact('depositos'));
        $this->set('_serialize', ['depositos']);
    }

    /**
     * View method
     *
     * @param string|null $id Deposito id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deposito = $this->Depositos->get($id, [
            'contain' => ['Docseries']
        ]);

        $this->set('deposito', $deposito);
        $this->set('_serialize', ['deposito']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deposito = $this->Depositos->newEntity();
        if ($this->request->is('post')) {
            $deposito = $this->Depositos->patchEntity($deposito, $this->request->data);
            if ($this->Depositos->save($deposito)) {
                $this->Flash->success(__('The deposito has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The deposito could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('deposito'));
        $this->set('_serialize', ['deposito']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Deposito id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deposito = $this->Depositos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deposito = $this->Depositos->patchEntity($deposito, $this->request->data);
            if ($this->Depositos->save($deposito)) {
                $this->Flash->success(__('The deposito has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The deposito could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('deposito'));
        $this->set('_serialize', ['deposito']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Deposito id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deposito = $this->Depositos->get($id);
        if ($this->Depositos->delete($deposito)) {
            $this->Flash->success(__('The deposito has been deleted.'));
        } else {
            $this->Flash->error(__('The deposito could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
