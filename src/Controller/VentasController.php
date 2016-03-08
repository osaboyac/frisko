<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Ventas Controller
 *
 * @property \App\Model\Table\VentasTable $Ventas
 */
class VentasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Socios', 'Documentos', 'Depositos', 'FormaPagos']
        ];
        $ventas = $this->paginate($this->Ventas);

        $this->set(compact('ventas'));
        $this->set('_serialize', ['ventas']);
    }

    /**
     * View method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venta = $this->Ventas->get($id, [
            'contain' => ['VentasDetalle','VentasDetalle.Articulos']
        ]);

        $users = $this->Ventas->Users->find('list', ['limit' => 200]);
        $socios = $this->Ventas->Socios->find('list', ['conditions' => ['cliente'=>1]]);
        $documentos = $this->Ventas->Depositos->Docseriev->find('all',['fields'=>['id','nombre','documento_id','deposito_id','serie','numero'],'conditions'=>['tipo'=>0]]);
        $documentoSerie = $this->Ventas->Depositos->Docseriev->find('list', ['conditions' => ['id'=>$venta->docserie_id,'deposito_id'=>$venta->deposito_id,'tipo'=>0]]);
        $depositos = $this->Ventas->Depositos->find('list', ['limit' => 200]);
        $formaPagos = $this->Ventas->FormaPagos->find('list', ['limit' => 200]);
        $this->set(compact('venta', 'users', 'socios', 'documentos','documentoSerie', 'depositos', 'formaPagos'));
        $this->set('_serialize', ['venta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venta = $this->Ventas->newEntity();
        if ($this->request->is('post')) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
            $venta = $this->Ventas->patchEntity($venta, $data, ['associated' => ['VentasDetalle']]);
            if ($this->Ventas->save($venta)) {
                $this->Flash->success(__('The venta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The venta could not be saved. Please, try again.'));
            }
        }
        $users = $this->Ventas->Users->find('list', ['limit' => 200]);
        $socios = $this->Ventas->Socios->find('list', ['conditions' => ['cliente'=>1]]);
        $documentos = $this->Ventas->Depositos->Docseriev->find('all',['fields'=>['id','nombre','documento_id','deposito_id','serie','numero'],'conditions'=>['tipo'=>0]]);
        $depositos = $this->Ventas->Depositos->find('list', ['limit' => 200]);
        $formaPagos = $this->Ventas->FormaPagos->find('list', ['limit' => 200]);
        $this->set(compact('venta', 'users', 'socios', 'documentos', 'depositos', 'formaPagos'));
        $this->set('_serialize', ['venta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venta = $this->Ventas->get($id, [
            'contain' => ['VentasDetalle','VentasDetalle.Articulos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
            $venta = $this->Ventas->patchEntity($venta, $data, ['associated' => ['VentasDetalle']]);
            if ($this->Ventas->save($venta)) {
                $this->Flash->success(__('The venta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The venta could not be saved. Please, try again.'));
            }
        }
        $users = $this->Ventas->Users->find('list', ['limit' => 200]);
        $socios = $this->Ventas->Socios->find('list', ['conditions' => ['cliente'=>1]]);
        $documentos = $this->Ventas->Depositos->Docseriev->find('all',['fields'=>['id','nombre','documento_id','deposito_id','serie','numero'],'conditions'=>['tipo'=>0]]);
        $documentoSerie = $this->Ventas->Depositos->Docseriev->find('list', ['fields'=>['id','nombre'],'conditions' => ['id'=>$venta->docserie_id,'deposito_id'=>$venta->deposito_id,'tipo'=>0]]);
        $depositos = $this->Ventas->Depositos->find('list', ['limit' => 200]);
        $formaPagos = $this->Ventas->FormaPagos->find('list', ['limit' => 200]);
        $this->set(compact('venta', 'users', 'socios', 'documentos','documentoSerie', 'depositos', 'formaPagos'));
        $this->set('_serialize', ['venta']);
		if($venta->estado){
                return $this->redirect(['action' => 'view', $id]);			
		}
    }

    /**
     * Delete method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venta = $this->Ventas->get($id);
        if ($this->Ventas->delete($venta)) {
            $this->Flash->success(__('The venta has been deleted.'));
        } else {
            $this->Flash->error(__('The venta could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}