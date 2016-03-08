<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IngresosDetalle Controller
 *
 * @property \App\Model\Table\IngresosDetalleTable $IngresosDetalle
 */
class IngresosDetalleController extends AppController
{
    /**
     * Delete method
     *
     * @param string|null $id Ingresos Detalle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $ingd_id=null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $ingresosDetalle = $this->IngresosDetalle->get($id);
        if ($this->IngresosDetalle->delete($ingresosDetalle)) {
            $this->Flash->success(__('The ingresos detalle has been deleted.'));
        } else {
            $this->Flash->error(__('The ingresos detalle could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller'=>'ingresos','action' => 'edit',$ingd_id]);
    }
}
