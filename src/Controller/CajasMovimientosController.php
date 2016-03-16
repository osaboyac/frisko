<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CajasMovimientos Controller
 *
 * @property \App\Model\Table\CajasMovimientosTable $CajasMovimientos
 */
class CajasMovimientosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cajas', 'Compras', 'Ventas', 'Cargos', 'Monedas', 'Users']
        ];
        $cajasMovimientos = $this->paginate($this->CajasMovimientos);

        $this->set(compact('cajasMovimientos'));
        $this->set('_serialize', ['cajasMovimientos']);
    }

    /**
     * View method
     *
     * @param string|null $id Cajas Movimiento id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cajasMovimiento = $this->CajasMovimientos->get($id, [
            'contain' => ['Cajas', 'Compras', 'Ventas', 'Cargos', 'Monedas', 'Users']
        ]);

        $this->set('cajasMovimiento', $cajasMovimiento);
        $this->set('_serialize', ['cajasMovimiento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cajasMovimiento = $this->CajasMovimientos->newEntity();
        if ($this->request->is('post')) {
			$data = $this->request->data;
			$data['entrada'] = $data['total'];
			if($data['tipo_movimiento']==1){
				$data['salida'] = $data['total'];
			}
            $cajasMovimiento = $this->CajasMovimientos->patchEntity($cajasMovimiento, $data);
            if ($this->CajasMovimientos->save($cajasMovimiento)) {
                $this->Flash->success(__('The cajas movimiento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cajas movimiento could not be saved. Please, try again.'));
            }
        }
        $cajas = $this->CajasMovimientos->Cajas->find('list', ['conditions' => ['fecha'=>date('Y-m-d'),'deposito_id'=>$this->Auth->user('visibility_roles')]]);
        $socios = $this->CajasMovimientos->Ventas->Socios->find('list');
        $cargos = $this->CajasMovimientos->Cargos->find('list', ['limit' => 200]);
        $monedas = $this->CajasMovimientos->Monedas->find('list', ['limit' => 200]);
        $users = $this->CajasMovimientos->Users->find('list', ['conditions' => ['id'=>$this->Auth->user('id')]]);
        $this->set(compact('cajasMovimiento', 'cajas', 'socios', 'cargos', 'monedas', 'users'));
        $this->set('_serialize', ['cajasMovimiento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cajas Movimiento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cajasMovimiento = $this->CajasMovimientos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			$data['entrada'] = $data['total'];
			if($data['tipo_movimiento']==1){
				$data['salida'] = $data['total'];
				$data['entrada'] = 0;
			}
            $cajasMovimiento = $this->CajasMovimientos->patchEntity($cajasMovimiento, $data);
            if ($this->CajasMovimientos->save($cajasMovimiento)) {
                $this->Flash->success(__('The cajas movimiento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cajas movimiento could not be saved. Please, try again.'));
            }
        }
        $cajas = $this->CajasMovimientos->Cajas->find('list', ['conditions' => ['fecha'=>date('Y-m-d'),'deposito_id'=>$this->Auth->user('visibility_roles')]]);
        $socios = $this->CajasMovimientos->Ventas->Socios->find('list');
        $cargos = $this->CajasMovimientos->Cargos->find('list', ['limit' => 200]);
        $monedas = $this->CajasMovimientos->Monedas->find('list', ['limit' => 200]);
        $users = $this->CajasMovimientos->Users->find('list', ['conditions' => ['id'=>$this->Auth->user('id')]]);
        $this->set(compact('cajasMovimiento', 'cajas','socios', 'cargos', 'monedas', 'users'));
        $this->set('_serialize', ['cajasMovimiento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cajas Movimiento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cajasMovimiento = $this->CajasMovimientos->get($id);
        if ($this->CajasMovimientos->delete($cajasMovimiento)) {
            $this->Flash->success(__('The cajas movimiento has been deleted.'));
        } else {
            $this->Flash->error(__('The cajas movimiento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
