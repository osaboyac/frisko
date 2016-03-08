<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ListaPrecios Controller
 *
 * @property \App\Model\Table\ListaPreciosTable $ListaPrecios
 */
class ListaPreciosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Socios', 'Monedas']
        ];
        $listaPrecios = $this->paginate($this->ListaPrecios);

        $this->set(compact('listaPrecios'));
        $this->set('_serialize', ['listaPrecios']);
    }

    /**
     * View method
     *
     * @param string|null $id Lista Precio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $listaPrecio = $this->ListaPrecios->get($id, [
            'contain' => ['Socios', 'Monedas', 'ArticuloPrecios', 'OrdenCompras']
        ]);

        $this->set('listaPrecio', $listaPrecio);
        $this->set('_serialize', ['listaPrecio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $listaPrecio = $this->ListaPrecios->newEntity();
        if ($this->request->is('post')) {
            $listaPrecio = $this->ListaPrecios->patchEntity($listaPrecio, $this->request->data);
            if ($this->ListaPrecios->save($listaPrecio)) {
                $this->Flash->success(__('The lista precio has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The lista precio could not be saved. Please, try again.'));
            }
        }
        $socios = $this->ListaPrecios->Socios->find('list', ['limit' => 200]);
        $monedas = $this->ListaPrecios->Monedas->find('list', ['limit' => 200]);
        $this->set(compact('listaPrecio', 'socios', 'monedas'));
        $this->set('_serialize', ['listaPrecio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lista Precio id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $listaPrecio = $this->ListaPrecios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $listaPrecio = $this->ListaPrecios->patchEntity($listaPrecio, $this->request->data);
            if ($this->ListaPrecios->save($listaPrecio)) {
                $this->Flash->success(__('The lista precio has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The lista precio could not be saved. Please, try again.'));
            }
        }
        $socios = $this->ListaPrecios->Socios->find('list', ['limit' => 200]);
        $monedas = $this->ListaPrecios->Monedas->find('list', ['limit' => 200]);
        $this->set(compact('listaPrecio', 'socios', 'monedas'));
        $this->set('_serialize', ['listaPrecio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lista Precio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $listaPrecio = $this->ListaPrecios->get($id);
        if ($this->ListaPrecios->delete($listaPrecio)) {
            $this->Flash->success(__('The lista precio has been deleted.'));
        } else {
            $this->Flash->error(__('The lista precio could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
