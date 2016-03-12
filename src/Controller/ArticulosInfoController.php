<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticulosInfo Controller
 *
 * @property \App\Model\Table\ArticulosInfoTable $ArticulosInfo
 */
class ArticulosInfoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($detalle=null)
    {
        $this->paginate = [
            'contain' => ['Articulos', 'Depositos', 'ListaPrecios','ArticuloPrecios'],
            'conditions' => ['ArticulosInfo.deposito_id'=>$this->Auth->user('visibility_roles')]
        ];
        $articulosInfo = $this->paginate($this->ArticulosInfo);

        $depositos = $this->ArticulosInfo->Depositos->find('list', ['conditions' => ['id'=>$this->Auth->user('visibility_roles')]]);
        $listaPrecios = $this->ArticulosInfo->ListaPrecios->find('list');
        $this->set(compact('articulosInfo', 'articulos', 'depositos', 'listaPrecios','detalle'));
        $this->set('_serialize', ['articulosInfo']);
    }
}
