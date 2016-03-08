<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Umedidas Controller
 *
 * @property \App\Model\Table\UmedidasTable $Umedidas
 */
class UmedidasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $umedidas = $this->paginate($this->Umedidas);

        $this->set(compact('umedidas'));
        $this->set('_serialize', ['umedidas']);
    }

    /**
     * View method
     *
     * @param string|null $id Umedida id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $umedida = $this->Umedidas->get($id, [
            'contain' => ['Articulos']
        ]);

        $this->set('umedida', $umedida);
        $this->set('_serialize', ['umedida']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $umedida = $this->Umedidas->newEntity();
        if ($this->request->is('post')) {
            $umedida = $this->Umedidas->patchEntity($umedida, $this->request->data);
            if ($this->Umedidas->save($umedida)) {
                $this->Flash->success(__('The umedida has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The umedida could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('umedida'));
        $this->set('_serialize', ['umedida']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Umedida id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $umedida = $this->Umedidas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $umedida = $this->Umedidas->patchEntity($umedida, $this->request->data);
            if ($this->Umedidas->save($umedida)) {
                $this->Flash->success(__('The umedida has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The umedida could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('umedida'));
        $this->set('_serialize', ['umedida']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Umedida id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $umedida = $this->Umedidas->get($id);
        if ($this->Umedidas->delete($umedida)) {
            $this->Flash->success(__('The umedida has been deleted.'));
        } else {
            $this->Flash->error(__('The umedida could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
