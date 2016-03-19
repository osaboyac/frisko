<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PosSettings Controller
 *
 * @property \App\Model\Table\PosSettingsTable $PosSettings
 */
class PosSettingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Depositos', 'Users', 'Docseries', 'Cajas', 'Socios','Docseries.Documentos']
        ];
        $posSettings = $this->paginate($this->PosSettings);

        $this->set(compact('posSettings'));
        $this->set('_serialize', ['posSettings']);
    }

    /**
     * View method
     *
     * @param string|null $id Pos Setting id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $posSetting = $this->PosSettings->get($id, [
            'contain' => ['Depositos', 'Users', 'Docseries', 'Cajas', 'Socios']
        ]);

        $this->set('posSetting', $posSetting);
        $this->set('_serialize', ['posSetting']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $posSetting = $this->PosSettings->newEntity();
        if ($this->request->is('post')) {
			$data = $this->request->data ; 
			$data['documento_venta'] = $this->PosSettings->Users->encodeData($data['documento_id']);
            $posSetting = $this->PosSettings->patchEntity($posSetting, $data);
            if ($this->PosSettings->save($posSetting)) {
                $this->Flash->success(__('The pos setting has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pos setting could not be saved. Please, try again.'));
            }
        }
        $depositos = $this->PosSettings->Depositos->find('list', ['id'=>$this->Auth->user('visibility_roles')]);
        $users = $this->PosSettings->Users->find('list', ['limit' => 200]);
        $docseries = $this->PosSettings->Depositos->Docseriev->find('all',[
			'conditions' => ['tipo'=>2,'deposito_id'=>$this->Auth->user('visibility_roles')],
			'fields' => ['id','nombre']
		]);
        $documentos = $this->PosSettings->Depositos->Docseriev->find('all',[
			'conditions' => ['tipo'=>0,'deposito_id'=>$this->Auth->user('visibility_roles')],
			'fields' => ['id','nombre']
		]);
        $cajas = $this->PosSettings->Cajas->find('list', ['conditions' => ['fecha'=>date('Y-m-d'),'deposito_id'=>$this->Auth->user('visibility_roles')]]);
        $socios = $this->PosSettings->Socios->find('list', ['conditions' => ['cliente'=>1]]);
        $this->set(compact('posSetting', 'depositos', 'users', 'docseries','documentos', 'cajas', 'socios'));
        $this->set('_serialize', ['posSetting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pos Setting id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $posSetting = $this->PosSettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data ; 
			$data['documento_venta'] = $this->PosSettings->Users->encodeData($data['documento_id']);
            $posSetting = $this->PosSettings->patchEntity($posSetting, $data);
            if ($this->PosSettings->save($posSetting)) {
                $this->Flash->success(__('The pos setting has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pos setting could not be saved. Please, try again.'));
            }
        }
        $depositos = $this->PosSettings->Depositos->find('list', ['id'=>$this->Auth->user('visibility_roles')]);
        $users = $this->PosSettings->Users->find('list', ['limit' => 200]);
        $docseries = $this->PosSettings->Depositos->Docseriev->find('all',[
			'conditions' => ['tipo'=>2,'deposito_id'=>$this->Auth->user('visibility_roles')],
			'fields' => ['id','nombre']
		]);
        $documentos = $this->PosSettings->Depositos->Docseriev->find('all',[
			'conditions' => ['tipo'=>0,'deposito_id'=>$this->Auth->user('visibility_roles')],
			'fields' => ['id','nombre']
		]);
        $cajas = $this->PosSettings->Cajas->find('list', ['conditions' => ['fecha'=>date('Y-m-d'),'deposito_id'=>$this->Auth->user('visibility_roles')]]);
        $socios = $this->PosSettings->Socios->find('list', ['conditions' => ['cliente'=>1]]);
        $this->set(compact('posSetting', 'depositos', 'users', 'docseries','documentos', 'cajas', 'socios'));
        $this->set('_serialize', ['posSetting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pos Setting id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $posSetting = $this->PosSettings->get($id);
        if ($this->PosSettings->delete($posSetting)) {
            $this->Flash->success(__('The pos setting has been deleted.'));
        } else {
            $this->Flash->error(__('The pos setting could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
