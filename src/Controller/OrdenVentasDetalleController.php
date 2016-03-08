<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrdenVentasDetalle Controller
 *
 * @property \App\Model\Table\OrdenVentasDetalleTable $OrdenVentasDetalle
 */
class OrdenVentasDetalleController extends AppController
{
    public function delete($id = null, $ov_id=null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $ordenVentasDetalle = $this->OrdenVentasDetalle->get($id);
        if ($this->OrdenVentasDetalle->delete($ordenVentasDetalle)) {
            $this->Flash->success(__('The orden ventas detalle has been deleted.'));
        } else {
            $this->Flash->error(__('The orden ventas detalle could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller'=>'orden-ventas','action' => 'edit', $ov_id]);
    }
}
