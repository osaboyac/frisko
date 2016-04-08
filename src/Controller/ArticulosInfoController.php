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
        /*$this->paginate = [
            'contain' => ['Articulos', 'Depositos', 'ListaPrecios','ArticuloPrecios','ArticuloPrecios.Impuestos'],
            'conditions' => ['ArticulosInfo.deposito_id'=>$this->Auth->user('visibility_roles')]
        ];
        $articulosInfo = $this->paginate($this->ArticulosInfo);*/
		if($detalle=='orden_compras_detalle' || $detalle=='compras_detalle' || $detalle == 'ingresos_detalle'){
			$this->viewBuilder()->layout('ajax');
			$articulosInfo = $this->ArticulosInfo->find('all', [
				'contain' => ['Articulos', 'Depositos', 'ListaPrecios','ArticuloPrecios','ArticuloPrecios.Impuestos'],
				'conditions' => ['ListaPrecios.tipo_lista'=>0,'ArticulosInfo.deposito_id'=>$this->Auth->user('visibility_roles')]
			]);
			$listaPrecios = $this->ArticulosInfo->ListaPrecios->find('list',['conditions'=>['tipo_lista'=>0]]);
		} else if($detalle=='orden_ventas_detalle' || $detalle=='ventas_detalle' || $detalle == 'guias_detalle'){
			$this->viewBuilder()->layout('ajax');
			$articulosInfo = $this->ArticulosInfo->find('all', [
				'contain' => ['Articulos', 'Depositos', 'ListaPrecios','ArticuloPrecios','ArticuloPrecios.Impuestos'],
				'conditions' => ['ListaPrecios.tipo_lista'=>1,'ArticulosInfo.deposito_id'=>$this->Auth->user('visibility_roles')]
			]);
			$listaPrecios = $this->ArticulosInfo->ListaPrecios->find('list',['conditions'=>['tipo_lista'=>1]]);			
		} else {
			$articulosInfo = $this->ArticulosInfo->find('all', [
				'contain' => ['Articulos', 'Depositos', 'ListaPrecios','ArticuloPrecios','ArticuloPrecios.Impuestos'],
				'conditions' => ['ArticulosInfo.deposito_id'=>$this->Auth->user('visibility_roles')]
			]);
			$listaPrecios = $this->ArticulosInfo->ListaPrecios->find('list');
		}

        $depositos = $this->ArticulosInfo->Depositos->find('list', ['conditions' => ['id'=>$this->Auth->user('visibility_roles')]]);
        $this->set(compact('articulosInfo', 'articulos', 'depositos', 'listaPrecios','detalle'));
        $this->set('_serialize', ['articulosInfo']);
    }
}
