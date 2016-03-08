<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Documentos Controller
 *
 * @property \App\Model\Table\DocumentosTable $Documentos
 */
class DocumentosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $documentos = $this->paginate($this->Documentos);

        $this->set(compact('documentos'));
        $this->set('_serialize', ['documentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Documento id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documento = $this->Documentos->get($id, [
            'contain' => ['Docseries']
        ]);

        $this->set('documento', $documento);
        $this->set('_serialize', ['documento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documento = $this->Documentos->newEntity();
        if ($this->request->is('post')) {
            $documento = $this->Documentos->patchEntity($documento, $this->request->data);
            if ($this->Documentos->save($documento)) {
                $this->Flash->success(__('The documento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The documento could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('documento'));
        $this->set('_serialize', ['documento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Documento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documento = $this->Documentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documento = $this->Documentos->patchEntity($documento, $this->request->data);
            if ($this->Documentos->save($documento)) {
                $this->Flash->success(__('The documento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The documento could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('documento'));
        $this->set('_serialize', ['documento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Documento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documento = $this->Documentos->get($id);
        if ($this->Documentos->delete($documento)) {
            $this->Flash->success(__('The documento has been deleted.'));
        } else {
            $this->Flash->error(__('The documento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
