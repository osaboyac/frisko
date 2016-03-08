<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Artmarcas Controller
 *
 * @property \App\Model\Table\ArtmarcasTable $Artmarcas
 */
class ArtmarcasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $artmarcas = $this->paginate($this->Artmarcas);

        $this->set(compact('artmarcas'));
        $this->set('_serialize', ['artmarcas']);
    }

    /**
     * View method
     *
     * @param string|null $id Artmarca id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $artmarca = $this->Artmarcas->get($id, [
            'contain' => ['Articulos']
        ]);

        $this->set('artmarca', $artmarca);
        $this->set('_serialize', ['artmarca']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $artmarca = $this->Artmarcas->newEntity();
        if ($this->request->is('post')) {
            $artmarca = $this->Artmarcas->patchEntity($artmarca, $this->request->data);
            if ($this->Artmarcas->save($artmarca)) {
                $this->Flash->success(__('The artmarca has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The artmarca could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('artmarca'));
        $this->set('_serialize', ['artmarca']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Artmarca id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $artmarca = $this->Artmarcas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $artmarca = $this->Artmarcas->patchEntity($artmarca, $this->request->data);
            if ($this->Artmarcas->save($artmarca)) {
                $this->Flash->success(__('The artmarca has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The artmarca could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('artmarca'));
        $this->set('_serialize', ['artmarca']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Artmarca id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $artmarca = $this->Artmarcas->get($id);
        if ($this->Artmarcas->delete($artmarca)) {
            $this->Flash->success(__('The artmarca has been deleted.'));
        } else {
            $this->Flash->error(__('The artmarca could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
