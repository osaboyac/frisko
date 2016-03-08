<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormaPagos Controller
 *
 * @property \App\Model\Table\FormaPagosTable $FormaPagos
 */
class FormaPagosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $formaPagos = $this->paginate($this->FormaPagos);

        $this->set(compact('formaPagos'));
        $this->set('_serialize', ['formaPagos']);
    }

    /**
     * View method
     *
     * @param string|null $id Forma Pago id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formaPago = $this->FormaPagos->get($id, [
            'contain' => ['OrdenVentas', 'Ventas']
        ]);

        $this->set('formaPago', $formaPago);
        $this->set('_serialize', ['formaPago']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formaPago = $this->FormaPagos->newEntity();
        if ($this->request->is('post')) {
            $formaPago = $this->FormaPagos->patchEntity($formaPago, $this->request->data);
            if ($this->FormaPagos->save($formaPago)) {
                $this->Flash->success(__('The forma pago has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The forma pago could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('formaPago'));
        $this->set('_serialize', ['formaPago']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Forma Pago id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formaPago = $this->FormaPagos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formaPago = $this->FormaPagos->patchEntity($formaPago, $this->request->data);
            if ($this->FormaPagos->save($formaPago)) {
                $this->Flash->success(__('The forma pago has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The forma pago could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('formaPago'));
        $this->set('_serialize', ['formaPago']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Forma Pago id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formaPago = $this->FormaPagos->get($id);
        if ($this->FormaPagos->delete($formaPago)) {
            $this->Flash->success(__('The forma pago has been deleted.'));
        } else {
            $this->Flash->error(__('The forma pago could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
