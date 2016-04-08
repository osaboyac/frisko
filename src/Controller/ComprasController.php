<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Compras Controller
 *
 * @property \App\Model\Table\ComprasTable $Compras
 */
class ComprasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Socios', 'OrdenCompras']
        ];
        $compras = $this->paginate($this->Compras);

        $this->set(compact('compras'));
        $this->set('_serialize', ['compras']);
    }

    /**
     * View method
     *
     * @param string|null $id Compra id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
	 public function view($id = null)
    {
        $compra = $this->Compras->get($id, [
            'contain' => ['ComprasDetalle','ComprasDetalle.Articulos']
        ]);

        $socios = $this->Compras->Socios->find('list', ['conditions' => ['proveedor'=>1]]);
        $this->set(compact('compra', 'socios'));
        $this->set('_serialize', ['compra']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $compra = $this->Compras->newEntity();
        if ($this->request->is('post')) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
            $compra = $this->Compras->patchEntity($compra, $data, ['associated' => ['ComprasDetalle']]);
            if ($this->Compras->save($compra)) {
                $this->Flash->success(__('The compra has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The compra could not be saved. Please, try again.'));
            }
        }
        $socios = $this->Compras->Socios->find('list', ['conditions' => ['proveedor'=>1]]);
        $ordenCompras = $this->Compras->OrdenCompras->find('list', ['limit' => 200]);
        $this->set(compact('compra', 'socios', 'ordenCompras'));
        $this->set('_serialize', ['compra']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Compra id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $compra = $this->Compras->get($id, [
            'contain' => ['ComprasDetalle','ComprasDetalle.Articulos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
            $compra = $this->Compras->patchEntity($compra, $data, ['associated' => ['ComprasDetalle']]);
            if ($this->Compras->save($compra)) {
                $this->Flash->success(__('The compra has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The compra could not be saved. Please, try again.'));
            }
        }
        $socios = $this->Compras->Socios->find('list', ['limit' => 200]);
        $ordenCompras = $this->Compras->OrdenCompras->find('list', ['limit' => 200]);
        $this->set(compact('compra', 'socios', 'ordenCompras'));
        $this->set('_serialize', ['compra']);
		if($compra->estado){
                return $this->redirect(['action' => 'view', $id]);			
		}
    }

    /**
     * Delete method
     *
     * @param string|null $id Compra id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $compra = $this->Compras->get($id);
        if ($this->Compras->delete($compra)) {
            $this->Flash->success(__('The compra has been deleted.'));
        } else {
            $this->Flash->error(__('The compra could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Ctacobrar method
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
	public function ctapagar(){
		$this->viewBuilder()->layout('ajax');
        $compras = $this->Compras->find('all',[
            'contain' => ['Socios', 'OrdenCompras'],
            'conditions' => ['Compras.pagado'=>0]
		]);
        $this->set(compact('compras'));
        $this->set('_serialize', ['compras']);		
	}
}
