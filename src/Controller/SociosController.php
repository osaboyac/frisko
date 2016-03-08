<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Socios Controller
 *
 * @property \App\Model\Table\SociosTable $Socios
 */
class SociosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $socios = $this->paginate($this->Socios);

        $this->set(compact('socios'));
        $this->set('_serialize', ['socios']);
    }

    /**
     * View method
     *
     * @param string|null $id Socio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $socio = $this->Socios->get($id, [
            'contain' => ['Addresses', 'Compras', 'Ctacorrientes', 'Guias', 'Ingresos', 'ListaPrecios', 'OrdenCompras', 'OrdenVentas', 'Users', 'Ventas']
        ]);

        $this->set('socio', $socio);
        $this->set('_serialize', ['socio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $socio = $this->Socios->newEntity();
        if ($this->request->is('post')) {
            $socio = $this->Socios->patchEntity($socio, $this->request->data,['associated' => ['Addresses']]);
            if ($this->Socios->save($socio)) {
                $this->Flash->success(__('The socio has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The socio could not be saved. Please, try again.'));
            }
        }
		$departamento = $this->Socios->Addresses->Departamentos->find('list');
		$provincia = $this->Socios->Addresses->Provincias->find('all');
		$distrito = $this->Socios->Addresses->Distritos->find('all');
        $this->set(compact('socio','departamento','provincia','distrito'));
        $this->set('_serialize', ['socio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Socio id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $socio = $this->Socios->get($id, [
            'contain' => ['Addresses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $socio = $this->Socios->patchEntity($socio, $this->request->data,['associated' => ['Addresses']]);
            if ($this->Socios->save($socio)) {
                $this->Flash->success(__('The socio has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The socio could not be saved. Please, try again.'));
            }
        }
        $address = $this->Socios->Addresses->get($socio->address_id);
		$departamento = $this->Socios->Addresses->Departamentos->find('list');
		$provincias = $this->Socios->Addresses->Provincias->find('list',['conditions'=>['departamento_id'=>$address->departamento_id]]);
		$provincia = $this->Socios->Addresses->Provincias->find('all');
		$distritos = $this->Socios->Addresses->Distritos->find('list',['conditions'=>['provincia_id'=>$address->provincia_id]]);
		$distrito = $this->Socios->Addresses->Distritos->find('all');
        $this->set(compact('socio','departamento','provincia','distrito','provincias','distritos'));
        $this->set('_serialize', ['socio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Socio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $socio = $this->Socios->get($id);
        if ($this->Socios->delete($socio)) {
            $this->Flash->success(__('The socio has been deleted.'));
        } else {
            $this->Flash->error(__('The socio could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
