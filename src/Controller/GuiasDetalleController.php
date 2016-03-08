<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GuiasDetalle Controller
 *
 * @property \App\Model\Table\GuiasDetalleTable $GuiasDetalle
 */
class GuiasDetalleController extends AppController
{
    /**
     * Delete method
     *
     * @param string|null $id Guias Detalle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */		
    public function delete($id = null,$gd_id=null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $guiasDetalle = $this->GuiasDetalle->get($id);
        if ($this->GuiasDetalle->delete($guiasDetalle)) {
            $this->Flash->success(__('The guias detalle has been deleted.'));
        } else {
            $this->Flash->error(__('The guias detalle could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller'=>'guias','action' => 'edit', $gd_id]);
    }
}
