<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticuloPrecios Controller
 *
 * @property \App\Model\Table\ArticuloPreciosTable $ArticuloPrecios
 */
class ArticuloPreciosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Depositos', 'ListaPrecios', 'Articulos', 'Impuestos']
        ];
        $articuloPrecios = $this->paginate($this->ArticuloPrecios);

        $this->set(compact('articuloPrecios'));
        $this->set('_serialize', ['articuloPrecios']);
    }

    /**
     * View method
     *
     * @param string|null $id Articulo Precio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articuloPrecio = $this->ArticuloPrecios->get($id, [
            'contain' => ['Depositos', 'ListaPrecios', 'Articulos', 'Impuestos']
        ]);

        $this->set('articuloPrecio', $articuloPrecio);
        $this->set('_serialize', ['articuloPrecio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articuloPrecio = $this->ArticuloPrecios->newEntity();
        if ($this->request->is('post')) {
            $articuloPrecio = $this->ArticuloPrecios->patchEntity($articuloPrecio, $this->request->data);
            if ($this->ArticuloPrecios->save($articuloPrecio)) {
                $this->Flash->success(__('The articulo precio has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The articulo precio could not be saved. Please, try again.'));
            }
        }
        $depositos = $this->ArticuloPrecios->Depositos->find('list', ['limit' => 200]);
        $listaPrecios = $this->ArticuloPrecios->ListaPrecios->find('list', ['limit' => 200]);
        $articulos = $this->ArticuloPrecios->Articulos->find('list', ['limit' => 200]);
        $impuestos = $this->ArticuloPrecios->Impuestos->find('list', ['limit' => 200]);
        $this->set(compact('articuloPrecio', 'depositos', 'listaPrecios', 'articulos', 'impuestos'));
        $this->set('_serialize', ['articuloPrecio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Articulo Precio id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articuloPrecio = $this->ArticuloPrecios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articuloPrecio = $this->ArticuloPrecios->patchEntity($articuloPrecio, $this->request->data);
            if ($this->ArticuloPrecios->save($articuloPrecio)) {
                $this->Flash->success(__('The articulo precio has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The articulo precio could not be saved. Please, try again.'));
            }
        }
        $depositos = $this->ArticuloPrecios->Depositos->find('list', ['limit' => 200]);
        $listaPrecios = $this->ArticuloPrecios->ListaPrecios->find('list', ['limit' => 200]);
        $articulos = $this->ArticuloPrecios->Articulos->find('list', ['limit' => 200]);
        $impuestos = $this->ArticuloPrecios->Impuestos->find('list', ['limit' => 200]);
        $this->set(compact('articuloPrecio', 'depositos', 'listaPrecios', 'articulos', 'impuestos'));
        $this->set('_serialize', ['articuloPrecio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Articulo Precio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articuloPrecio = $this->ArticuloPrecios->get($id);
        if ($this->ArticuloPrecios->delete($articuloPrecio)) {
            $this->Flash->success(__('The articulo precio has been deleted.'));
        } else {
            $this->Flash->error(__('The articulo precio could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
