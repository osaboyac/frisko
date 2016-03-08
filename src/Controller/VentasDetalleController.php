<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VentasDetalle Controller
 *
 * @property \App\Model\Table\VentasDetalleTable $VentasDetalle
 */
class VentasDetalleController extends AppController
{
    /**
     * Delete method
     *
     * @param string|null $id Ventas Detalle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $vd_id=null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $ventasDetalle = $this->VentasDetalle->get($id);
        if ($this->VentasDetalle->delete($ventasDetalle)) {
            $this->Flash->success(__('The ventas detalle has been deleted.'));
        } else {
            $this->Flash->error(__('The ventas detalle could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller'=>'ventas','action' => 'edit', $vd_id]);
    }
}
