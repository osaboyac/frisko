<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Ingresos Controller
 *
 * @property \App\Model\Table\IngresosTable $Ingresos
 */
class IngresosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Depositos', 'Socios', 'OrdenCompras'],
            'conditions' => ['Ingresos.deposito_id'=>$this->Auth->user('visibility_roles')]
        ];
        $ingresos = $this->paginate($this->Ingresos);

        $this->set(compact('ingresos'));
        $this->set('_serialize', ['ingresos']);
    }

    /**
     * View method
     *
     * @param string|null $id Ingreso id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ingreso = $this->Ingresos->get($id, [
            'contain' => ['IngresosDetalle','IngresosDetalle.Articulos']
        ]);
        $depositos = $this->Ingresos->Depositos->find('list', ['limit' => 200]);
        $socios = $this->Ingresos->Socios->find('list', ['conditions' => ['proveedor'=>1]]);
        $ordenCompras = $this->Ingresos->OrdenCompras->find('list', ['limit' => 200]);
        $this->set(compact('ingreso', 'depositos', 'socios', 'ordenCompras'));
        $this->set('_serialize', ['ingreso']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ingreso = $this->Ingresos->newEntity();
        if ($this->request->is('post')) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
            $ingreso = $this->Ingresos->patchEntity($ingreso, $data, ['associated' => ['IngresosDetalle']]);
            if ($this->Ingresos->save($ingreso)) {
                $this->Flash->success(__('The ingreso has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ingreso could not be saved. Please, try again.'));
            }
        }
        $depositos = $this->Ingresos->Depositos->find('list', ['conditions' => ['id'=>$this->Auth->user('visibility_roles')]]);
        $socios = $this->Ingresos->Socios->find('list', ['conditions' => array('proveedor'=>'1')]);
        $this->set(compact('ingreso', 'depositos', 'socios'));
        $this->set('_serialize', ['ingreso']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ingreso id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ingreso = $this->Ingresos->get($id, [
            'contain' => ['IngresosDetalle','IngresosDetalle.Articulos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
            $ingreso = $this->Ingresos->patchEntity($ingreso, $data, ['associated' => ['IngresosDetalle' => ['validate' => false]]]);
            if ($this->Ingresos->save($ingreso)) {
                $this->Flash->success(__('The ingreso has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ingreso could not be saved. Please, try again.'));
            }
        }
        $depositos = $this->Ingresos->Depositos->find('list', ['limit' => 200]);
        $socios = $this->Ingresos->Socios->find('list', ['conditions' => ['proveedor'=>1]]);
        $this->set(compact('ingreso', 'depositos', 'socios'));
        $this->set('_serialize', ['ingreso']);
		if($ingreso->estado){
                return $this->redirect(['action' => 'view', $id]);			
		}
		
    }

    /**
     * Delete method
     *
     * @param string|null $id Ingreso id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ingreso = $this->Ingresos->get($id);
        if ($this->Ingresos->delete($ingreso)) {
            $this->Flash->success(__('The ingreso has been deleted.'));
        } else {
            $this->Flash->error(__('The ingreso could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
