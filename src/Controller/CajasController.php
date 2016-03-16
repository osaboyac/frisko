<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Cajas Controller
 *
 * @property \App\Model\Table\CajasTable $Cajas
 */
class CajasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['LibroCajas', 'Depositos']
        ];
        $cajas = $this->paginate($this->Cajas);

        $this->set(compact('cajas'));
        $this->set('_serialize', ['cajas']);
    }

    /**
     * View method
     *
     * @param string|null $id Caja id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $caja = $this->Cajas->get($id, [
            'contain' => ['LibroCajas', 'Depositos', 'CajasMovimientos']
        ]);

        $this->set('caja', $caja);
        $this->set('_serialize', ['caja']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $caja = $this->Cajas->newEntity();
        if ($this->request->is('post')) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
            $caja = $this->Cajas->patchEntity($caja, $data);
            if ($this->Cajas->save($caja)) {
                $this->Flash->success(__('The caja has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The caja could not be saved. Please, try again.'));
            }
        }
        $libroCajas = $this->Cajas->LibroCajas->find('list', ['limit' => 200]);
        $depositos = $this->Cajas->Depositos->find('list', ['limit' => 200]);
        $this->set(compact('caja', 'libroCajas', 'depositos'));
        $this->set('_serialize', ['caja']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Caja id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $caja = $this->Cajas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
            $caja = $this->Cajas->patchEntity($caja, $data);
            if ($this->Cajas->save($caja)) {
                $this->Flash->success(__('The caja has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The caja could not be saved. Please, try again.'));
            }
        }
        $libroCajas = $this->Cajas->LibroCajas->find('list', ['limit' => 200]);
        $depositos = $this->Cajas->Depositos->find('list', ['limit' => 200]);
        $this->set(compact('caja', 'libroCajas', 'depositos'));
        $this->set('_serialize', ['caja']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Caja id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $caja = $this->Cajas->get($id);
        if ($this->Cajas->delete($caja)) {
            $this->Flash->success(__('The caja has been deleted.'));
        } else {
            $this->Flash->error(__('The caja could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
