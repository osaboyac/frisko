<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Guias Controller
 *
 * @property \App\Model\Table\GuiasTable $Guias
 */
class GuiasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Depositos', 'OrdenVentas', 'Ventas', 'Socios', 'Documentos'],
            'conditions' => ['Guias.deposito_id'=>$this->Auth->user('visibility_roles')]
        ];
        $guias = $this->paginate($this->Guias);

        $this->set(compact('guias'));
        $this->set('_serialize', ['guias']);
    }

    /**
     * View method
     *
     * @param string|null $id Guia id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $guia = $this->Guias->get($id, [
            'contain' => ['GuiasDetalle','GuiasDetalle.Articulos']
        ]);

        $depositos = $this->Guias->Depositos->find('list', ['conditions' => ['id'=>$this->Auth->user('visibility_roles')]]);
        $ordenVentas = $this->Guias->OrdenVentas->find('list', ['limit' => 200]);
        $ventas = $this->Guias->Ventas->find('list', ['limit' => 200]);
        $socios = $this->Guias->Socios->find('list', ['limit' => 200]);
        $documentos = $this->Guias->Depositos->Docseriev->find('all',['fields'=>['id','nombre','documento_id','deposito_id','serie','numero'],'conditions'=>['tipo'=>2]]);
        $documentoSerie = $this->Guias->Depositos->Docseriev->find('list', ['fields'=>['id','nombre'],'conditions' => ['id'=>$guia->docserie_id,'deposito_id'=>$guia->deposito_id,'tipo'=>2]]);
        $this->set(compact('guia', 'depositos', 'ordenVentas', 'ventas', 'socios', 'documentos','documentoSerie'));
        $this->set('_serialize', ['guia']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $guia = $this->Guias->newEntity();
        if ($this->request->is('post')) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
            if($data['estado']){
	            $c=0;
    	        foreach($data['guias_detalle'] as $gd){
    	            if($data['orden_venta_id']){
        	            $data['guias_detalle'][$c]['estado']=2;
    	            } else{
        	            $data['guias_detalle'][$c]['estado']=$data['estado'];
    	            }
    	            $data['guias_detalle'][$c]['deposito_id']=$data['deposito_id'];
    	            $c++;
    	        }
    	    }
            $guia = $this->Guias->patchEntity($guia, $data, ['associated' => ['GuiasDetalle']]);
            if ($this->Guias->save($guia)) {
                $this->Flash->success(__('The guia has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The guia could not be saved. Please, try again.'));
            }
        }
        $depositos = $this->Guias->Depositos->find('list', ['conditions' => ['id'=>$this->Auth->user('visibility_roles')]]);
        $ordenVentas = $this->Guias->OrdenVentas->find('list', ['limit' => 200]);
        $ventas = $this->Guias->Ventas->find('list', ['limit' => 200]);
        $socios = $this->Guias->Socios->find('list', ['conditions' => ['cliente'=>1]]);
        $documentos = $this->Guias->Depositos->Docseriev->find('all',['fields'=>['id','nombre','documento_id','deposito_id','serie','numero'],'conditions'=>['tipo'=>2]]);
        $this->set(compact('guia', 'depositos', 'ordenVentas', 'ventas', 'socios', 'documentos'));
        $this->set('_serialize', ['guia']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Guia id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $guia = $this->Guias->get($id, [
            'contain' => ['GuiasDetalle','GuiasDetalle.Articulos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data ; 
			$data['fecha'] = new Time($data['fecha']);
            if($data['estado']){
	            $c=0;
    	        foreach($data['guias_detalle'] as $gd){
    	            $data['guias_detalle'][$c]['estado']=$data['estado'];
    	            $data['guias_detalle'][$c]['deposito_id']=$data['deposito_id'];
    	            $c++;
    	        }
    	    }
            $guia = $this->Guias->patchEntity($guia, $data, ['associated' => ['GuiasDetalle']]);
            if ($this->Guias->save($guia)) {
                $this->Flash->success(__('The guia has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The guia could not be saved. Please, try again.'));
            }
        }
        $depositos = $this->Guias->Depositos->find('list', ['conditions' => ['id'=>$this->Auth->user('visibility_roles')]]);
        $ordenVentas = $this->Guias->OrdenVentas->find('list', ['limit' => 200]);
        $ventas = $this->Guias->Ventas->find('list', ['limit' => 200]);
        $socios = $this->Guias->Socios->find('list', ['limit' => 200]);
        $documentos = $this->Guias->Depositos->Docseriev->find('all',['fields'=>['id','nombre','documento_id','deposito_id','serie','numero'],'conditions'=>['tipo'=>2]]);
        $documentoSerie = $this->Guias->Depositos->Docseriev->find('list', ['fields'=>['id','nombre'],'conditions' => ['id'=>$guia->docserie_id,'deposito_id'=>$guia->deposito_id,'tipo'=>2]]);
        $this->set(compact('guia', 'depositos', 'ordenVentas', 'ventas', 'socios', 'documentos','documentoSerie'));
        $this->set('_serialize', ['guia']);
		if($guia->estado){
                return $this->redirect(['action' => 'view', $id]);			
		}
    }

    /**
     * Delete method
     *
     * @param string|null $id Guia id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $guia = $this->Guias->get($id);
        if ($this->Guias->delete($guia)) {
            $this->Flash->success(__('The guia has been deleted.'));
        } else {
            $this->Flash->error(__('The guia could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
