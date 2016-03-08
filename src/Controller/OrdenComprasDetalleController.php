<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrdenComprasDetalle Controller
 *
 * @property \App\Model\Table\OrdenComprasDetalleTable $OrdenComprasDetalle
 */
class OrdenComprasDetalleController extends AppController
{

    /**
     * Delete method
     *
     * @param string|null $id Orden Compras Detalle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $oc_id=null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $ordenComprasDetalle = $this->OrdenComprasDetalle->get($id);
        if ($this->OrdenComprasDetalle->delete($ordenComprasDetalle)) {
            $this->Flash->success(__('The orden compras detalle has been deleted.'));
        } else {
            $this->Flash->error(__('The orden compras detalle could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller'=>'orden-compras','action' => 'edit', $oc_id]);
    }
}
