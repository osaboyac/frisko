<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * OrdenVentas Controller
 *
 * @property \App\Model\Table\OrdenVentasTable $OrdenVentas
 */
class OrdenVentasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Depositos', 'Socios', 'FormaPagos']
        ];
        $ordenVentas = $this->paginate($this->OrdenVentas);

        $this->set(compact('ordenVentas'));
        $this->set('_serialize', ['ordenVentas']);
    }

    /**
     * View method
     *
     * @param string|null $id Orden Venta id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordenVenta = $this->OrdenVentas->get($id, [
            'contain' => ['OrdenVentasDetalle','OrdenVentasDetalle.Articulos']
        ]);

        $users = $this->OrdenVentas->Users->find('list', ['limit' => 200]);
        $depositos = $this->OrdenVentas->Depositos->find('list', ['limit' => 200]);
        $socios = $this->OrdenVentas->Socios->find('list', ['conditions' => array('cliente'=>1)]);
        $formaPagos = $this->OrdenVentas->FormaPagos->find('list', ['limit' => 200]);
        $this->set(compact('ordenVenta', 'users', 'depositos', 'socios', 'formaPagos'));
        $this->set('_serialize', ['ordenVenta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordenVenta = $this->OrdenVentas->newEntity();
        if ($this->request->is('post')) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
            $ordenVenta = $this->OrdenVentas->patchEntity($ordenVenta, $data, ['associated' => ['OrdenVentasDetalle']]);
            if ($this->OrdenVentas->save($ordenVenta)) {
                $this->Flash->success(__('The orden venta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The orden venta could not be saved. Please, try again.'));
            }
        }
        $users = $this->OrdenVentas->Users->find('list', ['limit' => 200]);
        $depositos = $this->OrdenVentas->Depositos->find('list', ['limit' => 200]);
        $socios = $this->OrdenVentas->Socios->find('list', ['conditions' => array('cliente'=>1)]);
        $formaPagos = $this->OrdenVentas->FormaPagos->find('list', ['limit' => 200]);
        $this->set(compact('ordenVenta', 'users', 'depositos', 'socios', 'formaPagos'));
        $this->set('_serialize', ['ordenVenta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Orden Venta id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordenVenta = $this->OrdenVentas->get($id, [
            'contain' => ['OrdenVentasDetalle','OrdenVentasDetalle.Articulos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
            $ordenVenta = $this->OrdenVentas->patchEntity($ordenVenta, $data, ['associated' => ['OrdenVentasDetalle']]);
			if ($this->OrdenVentas->save($ordenVenta)) {
                $this->Flash->success(__('The orden venta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The orden venta could not be saved. Please, try again.'));
            }
        }
        $users = $this->OrdenVentas->Users->find('list', ['limit' => 200]);
        $depositos = $this->OrdenVentas->Depositos->find('list', ['limit' => 200]);
        $socios = $this->OrdenVentas->Socios->find('list', ['conditions' => array('cliente'=>1)]);
        $formaPagos = $this->OrdenVentas->FormaPagos->find('list', ['limit' => 200]);
        $this->set(compact('ordenVenta', 'users', 'depositos', 'socios', 'formaPagos'));
        $this->set('_serialize', ['ordenVenta']);
		if($ordenVenta->estado >= 1){
                return $this->redirect(['action' => 'view', $id]);			
		}
    }

    /**
     * Delete method
     *
     * @param string|null $id Orden Venta id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordenVenta = $this->OrdenVentas->get($id);
        if ($this->OrdenVentas->delete($ordenVenta)) {
            $this->Flash->success(__('The orden venta has been deleted.'));
        } else {
            $this->Flash->error(__('The orden venta could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
