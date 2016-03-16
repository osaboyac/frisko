<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LibroCajas Controller
 *
 * @property \App\Model\Table\LibroCajasTable $LibroCajas
 */
class LibroCajasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Monedas']
        ];
        $libroCajas = $this->paginate($this->LibroCajas);

        $this->set(compact('libroCajas'));
        $this->set('_serialize', ['libroCajas']);
    }

    /**
     * View method
     *
     * @param string|null $id Libro Caja id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $libroCaja = $this->LibroCajas->get($id, [
            'contain' => ['Monedas', 'Cajas']
        ]);

        $this->set('libroCaja', $libroCaja);
        $this->set('_serialize', ['libroCaja']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $libroCaja = $this->LibroCajas->newEntity();
        if ($this->request->is('post')) {
            $libroCaja = $this->LibroCajas->patchEntity($libroCaja, $this->request->data);
            if ($this->LibroCajas->save($libroCaja)) {
                $this->Flash->success(__('The libro caja has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The libro caja could not be saved. Please, try again.'));
            }
        }
        $monedas = $this->LibroCajas->Monedas->find('list', ['limit' => 200]);
        $this->set(compact('libroCaja', 'monedas'));
        $this->set('_serialize', ['libroCaja']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Libro Caja id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $libroCaja = $this->LibroCajas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $libroCaja = $this->LibroCajas->patchEntity($libroCaja, $this->request->data);
            if ($this->LibroCajas->save($libroCaja)) {
                $this->Flash->success(__('The libro caja has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The libro caja could not be saved. Please, try again.'));
            }
        }
        $monedas = $this->LibroCajas->Monedas->find('list', ['limit' => 200]);
        $this->set(compact('libroCaja', 'monedas'));
        $this->set('_serialize', ['libroCaja']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Libro Caja id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $libroCaja = $this->LibroCajas->get($id);
        if ($this->LibroCajas->delete($libroCaja)) {
            $this->Flash->success(__('The libro caja has been deleted.'));
        } else {
            $this->Flash->error(__('The libro caja could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
