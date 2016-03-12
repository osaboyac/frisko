<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
	/*public function beforeFilter(Event $event){
		parent::beforeFilter($event);
		$this->Auth->allow(['logout']);
    }*/

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Socios']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Socios']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
			$data = $this->request->data ; 
			$data['visibility_roles'] = $this->Users->encodeData($data['deposito_id']);
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Depositos');
        $depositos = $this->Depositos->find('list');
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $socios = $this->Users->Socios->find('list', ['conditions' => ['empleado'=>'1']]);
        $this->set(compact('user', 'roles', 'socios','depositos'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $user['deposito_id'] = $this->Users->decodeData($user['visibility_roles']);
        $user = $user;
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data ; 
			$data['visibility_roles'] = $this->Users->encodeData($data['deposito_id']);
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Depositos');
        $depositos = $this->Depositos->find('list');
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $socios = $this->Users->Socios->find('list', ['conditions' => ['empleado'=>'1']]);
        $this->set(compact('user', 'roles', 'socios','depositos'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function login()
	{
		$this->viewBuilder()->layout('login');
		$this->loadModel('Depositos');
		$depositos = $this->Depositos->find('list');
		$this->set(compact('depositos'));
		
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			$deposito_id = $this->request->data['deposito_id'];
            $depositos = $this->Users->decodeData($user['visibility_roles']);
            $user['visibility_roles'] = '';
            foreach($depositos as $d){
                if($deposito_id == $d){
                    $user['visibility_roles'] = $deposito_id;
                }
            }
            if($user['visibility_roles']){
    			if ($user) {
    				$this->Auth->setUser($user);
    			    $this->Flash->success(__('Bienvenido, '. $user['username']));
    				return $this->redirect($this->Auth->redirectUrl());
    			} else {
    				$this->Flash->error(__('Usuario o Contraseña incorrecto'), [
    					'key' => 'auth'
    				]);
    			}
            } else{
                $deposito = $this->Depositos->get($deposito_id, [
                    'contain' => []
                ]);
				$this->Flash->error(__('No tiene acceso a la sucursal '. $deposito['nombre']));
            }
		}
	}
	
	public function logout()
	{
        return $this->redirect($this->Auth->logout());
	}
}
