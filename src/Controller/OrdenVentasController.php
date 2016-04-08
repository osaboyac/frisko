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
		$this->viewBuilder()->layout('ajax');
        if($detalle == 'ventas_detalle' ){
            $ordenVentas = $this->OrdenVentas->find('list',['conditions' => ['OrdenVentas.estado'=>1,'status_venta'=>0,'deposito_id'=>$this->Auth->user('visibility_roles')]]);
    		$ov = $this->OrdenVentas->find('all',['contain'=>['Socios'],'conditions' => ['OrdenVentas.estado'=>1,'status_venta'=>0,'OrdenVentas.deposito_id'=>$this->Auth->user('visibility_roles')]]);
        } else {
            $ordenVentas = $this->OrdenVentas->find('list',['conditions' => ['OrdenVentas.estado'=>1,'status_guia'=>0,'deposito_id'=>$this->Auth->user('visibility_roles')]]);
    		$ov = $this->OrdenVentas->find('all',['contain'=>['Socios'],'conditions' => ['OrdenVentas.estado'=>1,'status_guia'=>0,'OrdenVentas.deposito_id'=>$this->Auth->user('visibility_roles')]]);
        }
		$id = '';
		$socios[0] = array('socio_id'=>'', 'socio_nombre'=>'', 'orden_venta_id'=>'');
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
		$this->loadModel('Cajas');
		$this->loadModel('Guias');
		$this->loadModel('Ventas');
		$this->loadModel('Cajas');
		$this->loadModel('CajasMovimientos');

		$posSetting = $this->PosSettings->find('all',[
			'contain' => ['Socios'],
			'conditions' => ['user_id'=>$this->Auth->user('id'), 'deposito_id'=>$this->Auth->user('visibility_roles')],
			'limit' => 1
		])->first();
		
		/* valida si existe una caja menor creada para este usuario */
		$selectCaja = $this->Cajas->find('all',['limit'=>1,'conditions'=>['fecha'=>date('Y-m-d'),'estado'=>1,'deposito_id'=>$posSetting->deposito_id,'user_id'=>$this->Auth->user('id')]])->first();
		
		if(empty($selectCaja)){
			$caja = $this->Cajas->newEntity();
			$libro = $this->Cajas->LibroCajas->find('all',['conditions'=>['estado'=>1]])->last();
			$dataCaja['libro_caja_id'] = $libro['id'];
			$dataCaja['deposito_id'] = $posSetting->deposito_id;
			$dataCaja['nombre'] = 'Caja PDV '.$this->Auth->user('username').' '.date('Y-m-d H:i');
			$dataCaja['fecha'] = new Time(date('Y-m-d'));
			$dataCaja['user_id'] = $this->Auth->user('id');
            $caja = $this->Cajas->patchEntity($caja, $dataCaja);
            $this->Cajas->save($caja);
		}
		/* end caja menor*/
		
        $ordenVenta = $this->OrdenVentas->newEntity();
        if ($this->request->is('post')) {
			$dataGuia = '';
			$dataVenta = '';
			$dataCajaMovimiento = '';
			$data = $this->request->data ; 
			$data['fecha'] = new Time(date('Y-m-d'));
			$data['user_id'] = $this->Auth->user('id');
			$data['deposito_id'] = $this->Auth->user('visibility_roles');
			$data['estado'] = 2;
			$data['status_venta'] = 1;
			$data['status_guia'] = 1;
			$c=0;
			foreach($data['orden_ventas_detalle'] as $ovd){
				$data['orden_ventas_detalle'][$c]['estado']=2;
				$data['orden_ventas_detalle'][$c]['deposito_id']=$this->Auth->user('visibility_roles');
				
				/*====== detalle de guia ======*/
       	            $dataGuia['guias_detalle'][$c]['articulo_id']=$ovd['articulo_id'];
       	            $dataGuia['guias_detalle'][$c]['cantidad']=$ovd['cantidad'];
       	            $dataGuia['guias_detalle'][$c]['estado']=1;
    	            $dataGuia['guias_detalle'][$c]['deposito_id']=$this->Auth->user('visibility_roles');				
				/*====== end detalle de guia ======*/

				/*====== detalle de venta ======*/
       	            $dataVenta['ventas_detalle'][$c]['articulo_id']=$ovd['articulo_id'];
       	            $dataVenta['ventas_detalle'][$c]['cantidad']=$ovd['cantidad'];
    	            $dataVenta['ventas_detalle'][$c]['precio']=$ovd['precio'];
    	            $dataVenta['ventas_detalle'][$c]['incluir_impuesto']=$ovd['incluir_impuesto'];
    	            $dataVenta['ventas_detalle'][$c]['tasa_impuesto']=$ovd['tasa_impuesto'];
				/*====== end detalle de venta ======*/
				
				$c++;
			}
            $ordenVenta = $this->OrdenVentas->patchEntity($ordenVenta, $data, ['associated' => ['OrdenVentasDetalle']]);
            if ($this->OrdenVentas->save($ordenVenta)) {
				/*====== registrar guia ======*/
				$guia = $this->Guias->newEntity();
				$dataGuia['deposito_id'] = $this->Auth->user('visibility_roles');
				$dataGuia['orden_venta_id'] = $ordenVenta->id;
				$dataGuia['socio_id'] = $data['socio_id'];
				$dataGuia['docserie_id'] = $posSetting->docserie_id;
				$dataGuia['direccion'] = ' ';
				$dataGuia['fecha'] = $data['fecha'];
				$serie = $this->OrdenVentas->Depositos->Docseriev->find('all',['limit'=>1,'conditions'=>['id'=>$posSetting->docserie_id]])->first();
				$dataGuia['documento_id'] = $serie['documento_id'];
				$dataGuia['serie'] = $serie['serie'];
				$dataGuia['numero'] = $serie['numero'];
				$dataGuia['codigo_unico'] = $serie['serie'].'.'.$serie['numero'].'.'.$posSetting->docserie_id.'.'.$this->Auth->user('visibility_roles');
				$dataGuia['estado'] = 1;
				
				$guia = $this->Guias->patchEntity($guia, $dataGuia, ['associated' => ['GuiasDetalle']]);
				$this->Guias->save($guia);
				/*====== end guia ======*/

				/*====== registrar venta ======*/
				$venta = $this->Ventas->newEntity();
				$dataVenta['user_id'] = $this->Auth->user('id');
				$dataVenta['deposito_id'] = $this->Auth->user('visibility_roles');
				$dataVenta['socio_id'] = $data['socio_id'];
				$dataVenta['orden_venta_id'] = $ordenVenta->id;
				$dataVenta['forma_pago_id'] = $data['forma_pago_id'];
				$dataVenta['docserie_id'] = $data['docserie_id'];
				$dataVenta['fecha'] = $data['fecha'];
				$serie = $this->OrdenVentas->Depositos->Docseriev->find('all',['limit'=>1,'conditions'=>['id'=>$data['docserie_id']]])->first();
				$dataVenta['documento_id'] = $serie['documento_id'];
				$dataVenta['serie'] = $serie['serie'];
				$dataVenta['numero'] = $serie['numero'];
				$dataVenta['codigo_unico'] = $serie['serie'].'.'.$serie['numero'].'.'.$posSetting->docserie_id.'.'.$this->Auth->user('visibility_roles');
				$dataVenta['estado'] = 1;
				$dataVenta['total'] = $data['total'];
				$dataVenta['impuesto'] = $data['impuesto'];
				$dataVenta['grantotal'] = $data['grantotal'];
				
				$venta = $this->Ventas->patchEntity($venta, $dataVenta, ['associated' => ['VentasDetalle']]);
				if($this->Ventas->save($venta)){
					/*====== registrar pago ======*/
					$caja = $this->Cajas->find('all',['limit'=>1,'conditions'=>['fecha'=>date('Y-m-d'),'estado'=>1,'deposito_id'=>$posSetting->deposito_id,'user_id'=>$this->Auth->user('id')]])->first();
					
					$cajasMovimiento = $this->CajasMovimientos->newEntity();
					$dataCajaMovimiento['caja_id'] = $caja['id'];
					$dataCajaMovimiento['metodo_pago_id'] = $data['forma_pago_id'];
					$dataCajaMovimiento['venta_id'] = $venta->id;
					$dataCajaMovimiento['user_id'] = $this->Auth->user('id');
					$dataCajaMovimiento['socio_id'] = $data['socio_id'];
					$dataCajaMovimiento['venta_text'] = $venta->id.'_'.date('Y-m-d').'_'.$data['grantotal'];
					$dataCajaMovimiento['moneda_id'] = 1;
					$dataCajaMovimiento['tipo_movimiento'] = 0;
					$dataCajaMovimiento['concepto'] = 'Cobro de '.$serie['nombre'].' '.$serie['serie'].'-'.$serie['numero'];
					$dataCajaMovimiento['entrada'] = $data['grantotal'];
					$dataCajaMovimiento['paga_con'] = $data['paga_con'];
					$dataCajaMovimiento['cambio'] = $data['cambio'];
					if($data['forma_pago_id']>=2){
						$dataCajaMovimiento['ctacorriente_id'] = $data['ctacorriente_id'];
						$dataCajaMovimiento['tipo_tarjeta'] = $data['tipo_tarjeta'];
						$dataCajaMovimiento['descripcion'] = $data['nro_cheque'];
						$dataCajaMovimiento['paga_con'] = '';
						$dataCajaMovimiento['cambio'] = '';
					}
					
					$cajasMovimiento = $this->CajasMovimientos->patchEntity($cajasMovimiento, $dataCajaMovimiento);
					$this->CajasMovimientos->save($cajasMovimiento);
					/*====== end pago ======*/					
				}
				/*====== end venta ======*/
				

				$this->Flash->success(__('The orden venta has been saved.'));
				return $this->redirect(['action' => 'pos']);
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
        $formaPagos = $this->OrdenVentas->FormaPagos->find('list', ['conditions' => ['sistema'=>0]]);
        $ctacorrientes = $this->CajasMovimientos->Ctacorrientes->find('all',[
			'fields' => ['id','nro_cuenta','nombre'=>'Depositos.nombre','deposito_id','socio_id','descripcion','socio'=>'Socios.nombre'],
			'contain' => ['Depositos','Socios'],
			'conditions' => ['deposito_id'=>$posSetting->deposito_id]
		]);
        $this->set(compact('ordenVenta','socios','productos','documentos','posSetting','formaPagos','ctacorrientes'));
        $this->set('_serialize', ['ordenVenta']);
	}
}
