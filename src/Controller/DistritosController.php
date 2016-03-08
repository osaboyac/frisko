<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Distritos Controller
 *
 * @property \App\Model\Table\DistritosTable $Distritos
 */
class DistritosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Provincias','Provincias.Departamentos']
        ];
        $distritos = $this->paginate($this->Distritos);

        $this->set(compact('distritos'));
        $this->set('_serialize', ['distritos']);
    }

    /**
     * View method
     *
     * @param string|null $id Distrito id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $distrito = $this->Distritos->get($id, [
            'contain' => ['Provincias', 'Address']
        ]);

        $this->set('distrito', $distrito);
        $this->set('_serialize', ['distrito']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $distrito = $this->Distritos->newEntity();
        if ($this->request->is('post')) {
            $distrito = $this->Distritos->patchEntity($distrito, $this->request->data);
            if ($this->Distritos->save($distrito)) {
                $this->Flash->success(__('The distrito has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The distrito could not be saved. Please, try again.'));
            }
        }
        $departamentos = $this->Distritos->Provincias->Departamentos->find('list', ['limit' => 30]);
        $provincias = $this->Distritos->Provincias->find('all');
        $this->set(compact('distrito', 'provincias','departamentos'));
        $this->set('_serialize', ['distrito']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Distrito id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $distrito = $this->Distritos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $distrito = $this->Distritos->patchEntity($distrito, $this->request->data);
            if ($this->Distritos->save($distrito)) {
                $this->Flash->success(__('The distrito has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The distrito could not be saved. Please, try again.'));
            }
        }
        $departamentos = $this->Distritos->Provincias->Departamentos->find('list', ['limit' => 30]);
        $provincias = $this->Distritos->Provincias->find('all');
        $provincia = $this->Distritos->Provincias->find('list', ['conditions' => ['departamento_id'=>$distrito->departamento_id]]);
        $this->set(compact('distrito', 'provincias','departamentos','provincia'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Distrito id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $distrito = $this->Distritos->get($id);
        if ($this->Distritos->delete($distrito)) {
            $this->Flash->success(__('The distrito has been deleted.'));
        } else {
            $this->Flash->error(__('The distrito could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
