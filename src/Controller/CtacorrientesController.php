<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ctacorrientes Controller
 *
 * @property \App\Model\Table\CtacorrientesTable $Ctacorrientes
 */
class CtacorrientesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bancos', 'Depositos', 'Socios', 'Monedas']
        ];
        $ctacorrientes = $this->paginate($this->Ctacorrientes);

        $this->set(compact('ctacorrientes'));
        $this->set('_serialize', ['ctacorrientes']);
    }

    /**
     * View method
     *
     * @param string|null $id Ctacorriente id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ctacorriente = $this->Ctacorrientes->get($id, [
            'contain' => ['Bancos', 'Depositos', 'Socios', 'Monedas']
        ]);

        $this->set('ctacorriente', $ctacorriente);
        $this->set('_serialize', ['ctacorriente']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ctacorriente = $this->Ctacorrientes->newEntity();
        if ($this->request->is('post')) {
            $ctacorriente = $this->Ctacorrientes->patchEntity($ctacorriente, $this->request->data);
            if ($this->Ctacorrientes->save($ctacorriente)) {
                $this->Flash->success(__('The ctacorriente has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ctacorriente could not be saved. Please, try again.'));
            }
        }
        $bancos = $this->Ctacorrientes->Bancos->find('list', ['limit' => 200]);
        $depositos = $this->Ctacorrientes->Depositos->find('list', ['limit' => 200]);
        $socios = $this->Ctacorrientes->Socios->find('list', ['limit' => 200]);
        $monedas = $this->Ctacorrientes->Monedas->find('list', ['limit' => 200]);
        $this->set(compact('ctacorriente', 'bancos', 'depositos', 'socios', 'monedas'));
        $this->set('_serialize', ['ctacorriente']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ctacorriente id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ctacorriente = $this->Ctacorrientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ctacorriente = $this->Ctacorrientes->patchEntity($ctacorriente, $this->request->data);
            if ($this->Ctacorrientes->save($ctacorriente)) {
                $this->Flash->success(__('The ctacorriente has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ctacorriente could not be saved. Please, try again.'));
            }
        }
        $bancos = $this->Ctacorrientes->Bancos->find('list', ['limit' => 200]);
        $depositos = $this->Ctacorrientes->Depositos->find('list', ['limit' => 200]);
        $socios = $this->Ctacorrientes->Socios->find('list', ['limit' => 200]);
        $monedas = $this->Ctacorrientes->Monedas->find('list', ['limit' => 200]);
        $this->set(compact('ctacorriente', 'bancos', 'depositos', 'socios', 'monedas'));
        $this->set('_serialize', ['ctacorriente']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ctacorriente id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ctacorriente = $this->Ctacorrientes->get($id);
        if ($this->Ctacorrientes->delete($ctacorriente)) {
            $this->Flash->success(__('The ctacorriente has been deleted.'));
        } else {
            $this->Flash->error(__('The ctacorriente could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
