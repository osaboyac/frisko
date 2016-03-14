<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * OrdenCompras Controller
 *
 * @property \App\Model\Table\OrdenComprasTable $OrdenCompras
 */
class OrdenComprasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Socios','Compras']
        ];
        $ordenCompras = $this->paginate($this->OrdenCompras);

        $this->set(compact('ordenCompras'));
        $this->set('_serialize', ['ordenCompras']);
    }

    /**
     * View method
     *
     * @param string|null $id Orden Compra id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordenCompra = $this->OrdenCompras->get($id, [
            'contain' => ['OrdenComprasDetalle','OrdenComprasDetalle.Articulos']
        ]);

        $socios = $this->OrdenCompras->Socios->find('list', ['conditions' => ['proveedor'=>1]]);
        $this->set(compact('ordenCompra', 'socios'));
        $this->set('_serialize', ['ordenCompra']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordenCompra = $this->OrdenCompras->newEntity();
		
        if ($this->request->is('post')) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
            $ordenCompra = $this->OrdenCompras->patchEntity($ordenCompra, $data, ['associated' => ['OrdenComprasDetalle']]);
            if ($this->OrdenCompras->save($ordenCompra)) {
                $this->Flash->success(__('The orden compra has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The orden compra could not be saved. Please, try again.'));
            }
        }
        $socios = $this->OrdenCompras->Socios->find('list', ['conditions' => ['proveedor'=>1]]);
        $this->set(compact('ordenCompra', 'socios'));
        $this->set('_serialize', ['ordenCompra']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Orden Compra id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordenCompra = $this->OrdenCompras->get($id, [
            'contain' => ['OrdenComprasDetalle','OrdenComprasDetalle.Articulos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
			$ordenCompra = $this->OrdenCompras->patchEntity($ordenCompra, $data, ['associated' => ['OrdenComprasDetalle']]);
			if ($this->OrdenCompras->save($ordenCompra)) {
                $this->Flash->success(__('The orden compra has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The orden compra could not be saved. Please, try again.'));
            }
        }
		
        $socios = $this->OrdenCompras->Socios->find('list', ['conditions' => ['proveedor'=>1]]);
        $this->set(compact('ordenCompra', 'socios'));
        $this->set('_serialize', ['ordenCompra']);
		
		if($ordenCompra->estado){
                return $this->redirect(['action' => 'view', $id]);			
		}
    }

    /**
     * Delete method
     *
     * @param string|null $id Orden Compra id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordenCompra = $this->OrdenCompras->get($id);
        if ($this->OrdenCompras->delete($ordenCompra)) {
            $this->Flash->success(__('The orden compra has been deleted.'));
        } else {
            $this->Flash->error(__('The orden compra could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
    /**
     * info method
     *
     * @param string|null $id Orden Compra id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function info($detalle=null)
    {
        if($detalle == 'compras_detalle' ){
            $ordenCompras = $this->OrdenCompras->find('list',['conditions' => ['compra_id is null','estado'=>1]]);
    		$oc = $this->OrdenCompras->find('all',['contain'=>['Socios'],'conditions' => ['compra_id is null','OrdenCompras.estado'=>1]]);
        } else {
            $ordenCompras = $this->OrdenCompras->find('list',['conditions' => ['ingreso_id is null','OrdenCompras.status'=>0,'.OrdenCompras.estado in'=>[1,2]]]);
    		$oc = $this->OrdenCompras->find('all',['contain'=>['Socios'],'conditions' => ['ingreso_id is null','OrdenCompras.status'=>0,'OrdenCompras.estado in'=>[1,2]]]);
        }
		$id = '';
		$socios = '';
		$c = 0;
		foreach($oc as $rs){
			$id[$c] = $rs->id;
			$socios[$c] = array('socio_id'=>$rs->socio_id, 'socio_nombre'=>$rs->socio->nombre, 'orden_compra_id'=>$rs->id);
			$c++;
		}
        $ordenComprasDetalle = $this->OrdenCompras->OrdenComprasDetalle->find('all',['contain'=>['Articulos'],'conditions' => ['orden_compra_id in'=>$id]]);
        $this->set(compact('ordenCompras','ordenComprasDetalle','socios','detalle'));
        $this->set('_serialize', ['ordenCompras']);
    }

}
