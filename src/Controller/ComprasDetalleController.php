<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ComprasDetalle Controller
 *
 * @property \App\Model\Table\ComprasDetalleTable $ComprasDetalle
 */
class ComprasDetalleController extends AppController
{
    /**
     * Delete method
     *
     * @param string|null $id Compras Detalle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $cd_id)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $comprasDetalle = $this->ComprasDetalle->get($id);
        if ($this->ComprasDetalle->delete($comprasDetalle)) {
            $this->Flash->success(__('The compras detalle has been deleted.'));
        } else {
            $this->Flash->error(__('The compras detalle could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller'=>'compras','action' => 'edit', $cd_id]);
    }
}
