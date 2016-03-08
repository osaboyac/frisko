<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Impuestos Controller
 *
 * @property \App\Model\Table\ImpuestosTable $Impuestos
 */
class ImpuestosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $impuestos = $this->paginate($this->Impuestos);

        $this->set(compact('impuestos'));
        $this->set('_serialize', ['impuestos']);
    }

    /**
     * View method
     *
     * @param string|null $id Impuesto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $impuesto = $this->Impuestos->get($id, [
            'contain' => ['Articulos']
        ]);

        $this->set('impuesto', $impuesto);
        $this->set('_serialize', ['impuesto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $impuesto = $this->Impuestos->newEntity();
        if ($this->request->is('post')) {
            $impuesto = $this->Impuestos->patchEntity($impuesto, $this->request->data);
            if ($this->Impuestos->save($impuesto)) {
                $this->Flash->success(__('The impuesto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The impuesto could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('impuesto'));
        $this->set('_serialize', ['impuesto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Impuesto id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $impuesto = $this->Impuestos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $impuesto = $this->Impuestos->patchEntity($impuesto, $this->request->data);
            if ($this->Impuestos->save($impuesto)) {
                $this->Flash->success(__('The impuesto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The impuesto could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('impuesto'));
        $this->set('_serialize', ['impuesto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Impuesto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $impuesto = $this->Impuestos->get($id);
        if ($this->Impuestos->delete($impuesto)) {
            $this->Flash->success(__('The impuesto has been deleted.'));
        } else {
            $this->Flash->error(__('The impuesto could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
