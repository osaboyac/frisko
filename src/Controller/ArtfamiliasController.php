<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Artfamilias Controller
 *
 * @property \App\Model\Table\ArtfamiliasTable $Artfamilias
 */
class ArtfamiliasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $artfamilias = $this->paginate($this->Artfamilias);

        $this->set(compact('artfamilias'));
        $this->set('_serialize', ['artfamilias']);
    }

    /**
     * View method
     *
     * @param string|null $id Artfamilia id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $artfamilia = $this->Artfamilias->get($id, [
            'contain' => ['Articulos']
        ]);

        $this->set('artfamilia', $artfamilia);
        $this->set('_serialize', ['artfamilia']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $artfamilia = $this->Artfamilias->newEntity();
        if ($this->request->is('post')) {
            $artfamilia = $this->Artfamilias->patchEntity($artfamilia, $this->request->data);
            if ($this->Artfamilias->save($artfamilia)) {
                $this->Flash->success(__('The artfamilia has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The artfamilia could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('artfamilia'));
        $this->set('_serialize', ['artfamilia']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Artfamilia id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $artfamilia = $this->Artfamilias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $artfamilia = $this->Artfamilias->patchEntity($artfamilia, $this->request->data);
            if ($this->Artfamilias->save($artfamilia)) {
                $this->Flash->success(__('The artfamilia has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The artfamilia could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('artfamilia'));
        $this->set('_serialize', ['artfamilia']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Artfamilia id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $artfamilia = $this->Artfamilias->get($id);
        if ($this->Artfamilias->delete($artfamilia)) {
            $this->Flash->success(__('The artfamilia has been deleted.'));
        } else {
            $this->Flash->error(__('The artfamilia could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
