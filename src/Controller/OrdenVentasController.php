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
            'contain' => ['Users', 'Depositos', 'Socios', 'FormaPagos','Ventas'],
            'conditions' => ['OrdenVentas.deposito_id'=>$this->Auth->user('visibility_roles')]
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
            if($data['estado']==1){
	            $c=0;
    	        foreach($data['orden_ventas_detalle'] as $ovd){
    	            $data['orden_ventas_detalle'][$c]['estado']=$data['estado'];
    	            $data['orden_ventas_detalle'][$c]['deposito_id']=$data['deposito_id'];
    	            $c++;
    	        }
    	    }
            $ordenVenta = $this->OrdenVentas->patchEntity($ordenVenta, $data, ['associated' => ['OrdenVentasDetalle']]);
            if ($this->OrdenVentas->save($ordenVenta)) {
                $this->Flash->success(__('The orden venta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The orden venta could not be saved. Please, try again.'));
            }
        }
        $users = $this->OrdenVentas->Users->find('list', ['conditions' => ['id'=>$this->Auth->user('id')]]);
        $depositos = $this->OrdenVentas->Depositos->find('list', ['conditions' => ['id'=>$this->Auth->user('visibility_roles')]]);
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
            if($data['estado']==1){
	            $c=0;
    	        foreach($data['orden_ventas_detalle'] as $ovd){
    	            $data['orden_ventas_detalle'][$c]['estado']=$data['estado'];
    	            $data['orden_ventas_detalle'][$c]['deposito_id']=$data['deposito_id'];
    	            $c++;
    	        }
    	    }
            $ordenVenta = $this->OrdenVentas->patchEntity($ordenVenta, $data, ['associated' => ['OrdenVentasDetalle']]);

			if ($this->OrdenVentas->save($ordenVenta)) {
                $this->Flash->success(__('The orden venta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The orden venta could not be saved. Please, try again.'));
            }
        }
        $users = $this->OrdenVentas->Users->find('list', ['conditions' => ['id'=>$this->Auth->user('id')]]);
        $depositos = $this->OrdenVentas->Depositos->find('list', ['conditions' => ['id'=>$this->Auth->user('visibility_roles')]]);
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
    /**
     * info method
     *
     * @param string|null $id Orden Venta id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function info($detalle=null)
    {
        if($detalle == 'ventas_detalle' ){
            $ordenVentas = $this->OrdenVentas->find('list',['conditions' => ['OrdenVentas.estado'=>1,'status_venta'=>0,'deposito_id'=>$this->Auth->user('visibility_roles')]]);
    		$ov = $this->OrdenVentas->find('all',['contain'=>['Socios'],'conditions' => ['OrdenVentas.estado'=>1,'status_venta'=>0,'OrdenVentas.deposito_id'=>$this->Auth->user('visibility_roles')]]);
        } else {
            $ordenVentas = $this->OrdenVentas->find('list',['conditions' => ['OrdenVentas.estado'=>1,'status_guia'=>0,'deposito_id'=>$this->Auth->user('visibility_roles')]]);
    		$ov = $this->OrdenVentas->find('all',['contain'=>['Socios'],'conditions' => ['OrdenVentas.estado'=>1,'status_guia'=>0,'OrdenVentas.deposito_id'=>$this->Auth->user('visibility_roles')]]);
        }
		$id = '';
		$socios = '';
		$c = 0;
		foreach($ov as $rs){
			$id[$c] = $rs->id;
			$socios[$c] = array('socio_id'=>$rs->socio_id, 'socio_nombre'=>$rs->socio->nombre, 'orden_venta_id'=>$rs->id);
			$c++;
		}
        $ordenVentasDetalle = $this->OrdenVentas->OrdenVentasDetalle->find('all',['contain'=>['Articulos'],'conditions' => ['orden_venta_id in'=>$id]]);
        $this->set(compact('ordenVentas','ordenVentasDetalle','socios','detalle'));
        $this->set('_serialize', ['ordenVentas']);
    }
    public function pos()
    {
		$this->viewBuilder()->layout('pos');
		$this->loadModel('PosSettings');
		$posSetting = $this->PosSettings->find('all',[
			'contain' => ['Socios'],
			'conditions' => ['user_id'=>$this->Auth->user('id'), 'deposito_id'=>$this->Auth->user('visibility_roles')],
			'limit' => 1
		])->first();
        $ordenVenta = $this->OrdenVentas->newEntity();
        if ($this->request->is('post')) {
			$data = $this->request->data ; 
			$data['fecha'] = date('Y-m-d');
			$data['user_id'] = $this->Auth->user('id');
			$data['deposito_id'] = $this->Auth->user('visibility_roles');
			$data['estado'] = 2;
			$data['status_venta'] = 1;
			$data['status_guia'] = 1;
			$c=0;
			foreach($data['orden_ventas_detalle'] as $ovd){
				$data['orden_ventas_detalle'][$c]['estado']=2;
				$data['orden_ventas_detalle'][$c]['deposito_id']=$this->Auth->user('visibility_roles');
				$c++;
			}
            $ordenVenta = $this->OrdenVentas->patchEntity($ordenVenta, $data, ['associated' => ['OrdenVentasDetalle']]);
            if ($this->OrdenVentas->save($ordenVenta)) {
                $this->Flash->success(__('The orden venta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The orden venta could not be saved. Please, try again.'));
            }
        }
		$this->loadModel('ArticulosInfo');
		$productos = $this->ArticulosInfo->find('all', [
			'contain' => ['Articulos', 'Depositos', 'ListaPrecios','ArticuloPrecios','ArticuloPrecios.Impuestos'],
			'conditions' => ['ListaPrecios.tipo_lista'=>1,'ArticulosInfo.deposito_id'=>$this->Auth->user('visibility_roles')],
			'order' => ['Articulos.nombre']
		]);
        $socios = $this->OrdenVentas->Socios->find('list', ['conditions' => array('cliente'=>1)]);
		$doc_venta = $this->OrdenVentas->Users->decodeData($posSetting['documento_venta']);
        $documentos = $this->OrdenVentas->Depositos->Docseriev->find('all',[
			'fields' => ['id','nombre'],
			'conditions' => ['id in' => $doc_venta, 'deposito_id' =>$this->Auth->user('visibility_roles')]
		]);
        $this->set(compact('ordenVenta','socios','productos','documentos','posSetting'));
        $this->set('_serialize', ['ordenVenta']);
	}
}
