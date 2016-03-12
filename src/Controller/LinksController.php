<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * Links Controller
 *
 * @property \App\Model\Table\LinksTable $Links
 */
class LinksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($menu_id = null)
    {
        if(!empty($menu_id)){
            $this->paginate = [
                'contain' => ['Menus'],
                'conditions' => ['menu_id'=>$menu_id]
            ];
            $links = $this->paginate($this->Links);
            $menu = $this->Links->Menus->get($menu_id, [
                'contain' => []
            ]);
            $this->set(compact('links','menu'));
            $this->set('_serialize', ['links']);
        } else{
            return $this->redirect(['controller'=>'menus','action' => 'index']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Link id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $link = $this->Links->get($id, [
            'contain' => ['ParentLinks', 'Menus', 'ChildLinks']
        ]);

        $this->set('link', $link);
        $this->set('_serialize', ['link']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($menu_id=null)
    {
        $link = $this->Links->newEntity();
        if ($this->request->is('post')) {
			$data = $this->request->data ; 
			$data['visibility_roles'] = $this->Links->encodeData($data['role_id']);
            $link = $this->Links->patchEntity($link, $data);
            
            if ($this->Links->save($link)) {
                $this->Flash->success(__('The link has been saved.'));
                return $this->redirect(['action' => 'index',$menu_id]);
            } else {
                $this->Flash->error(__('The link could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Roles');
        $roles = $this->Roles->find('list');
        $parentLinks = $this->Links->find('list',['conditions'=>['menu_id'=>$menu_id]]);
        $menus = $this->Links->Menus->find('list');
        
        $menu = $this->Links->Menus->get($menu_id, [
            'contain' => []
        ]);

        $this->set(compact('link', 'parentLinks', 'menus','roles','menu'));
        $this->set('_serialize', ['link']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Link id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $link = $this->Links->get($id, [
            'contain' => []
        ]);
        $user['roles_id'] = $this->Users->decodeData($user['visibility_roles']);
        $user = $user;
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data ; 
			$data['visibility_roles'] = $this->Links->encodeData($data['role_id']);
            $link = $this->Links->patchEntity($link, $data);
            if ($this->Links->save($link)) {
                $this->Flash->success(__('The link has been saved.'));
                return $this->redirect(['action' => 'index',$link->menu_id]);
            } else {
                $this->Flash->error(__('The link could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Roles');
        $roles = $this->Roles->find('list');
        $parentLinks = $this->Links->find('list',['conditions'=>['menu_id'=>$link->menu_id]]);
        $menus = $this->Links->Menus->find('list');
        $menu = $this->Links->Menus->get($menu_id, [
            'contain' => []
        ]);
        $this->set(compact('link', 'parentLinks', 'menus','roles','menu'));
        $this->set('_serialize', ['link']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Link id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $menu_id=null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $link = $this->Links->get($id);
        if ($this->Links->delete($link)) {
            $this->Flash->success(__('The link has been deleted.'));
        } else {
            $this->Flash->error(__('The link could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index', $menu_id]);
    }
}
