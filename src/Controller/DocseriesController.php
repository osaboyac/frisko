<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Docseries Controller
 *
 * @property \App\Model\Table\DocseriesTable $Docseries
 */
class DocseriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Documentos', 'Depositos']
        ];
        $docseries = $this->paginate($this->Docseries);

        $this->set(compact('docseries'));
        $this->set('_serialize', ['docseries']);
    }

    /**
     * View method
     *
     * @param string|null $id Docseries id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $docseries = $this->Docseries->get($id, [
            'contain' => ['Documentos', 'Depositos']
        ]);

        $this->set('docseries', $docseries);
        $this->set('_serialize', ['docseries']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $docseries = $this->Docseries->newEntity();
        if ($this->request->is('post')) {
            $docseries = $this->Docseries->patchEntity($docseries, $this->request->data);
            if ($this->Docseries->save($docseries)) {
                $this->Flash->success(__('The docseries has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The docseries could not be saved. Please, try again.'));
            }
        }
        $documentos = $this->Docseries->Documentos->find('list', ['limit' => 200]);
        $depositos = $this->Docseries->Depositos->find('list', ['limit' => 200]);
        $this->set(compact('docseries', 'documentos', 'depositos'));
        $this->set('_serialize', ['docseries']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Docseries id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $docseries = $this->Docseries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $docseries = $this->Docseries->patchEntity($docseries, $this->request->data);
            if ($this->Docseries->save($docseries)) {
                $this->Flash->success(__('The docseries has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The docseries could not be saved. Please, try again.'));
            }
        }
        $documentos = $this->Docseries->Documentos->find('list', ['limit' => 200]);
        $depositos = $this->Docseries->Depositos->find('list', ['limit' => 200]);
        $this->set(compact('docseries', 'documentos', 'depositos'));
        $this->set('_serialize', ['docseries']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Docseries id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $docseries = $this->Docseries->get($id);
        if ($this->Docseries->delete($docseries)) {
            $this->Flash->success(__('The docseries has been deleted.'));
        } else {
            $this->Flash->error(__('The docseries could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
