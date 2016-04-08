<div class="panel panel-primary">
	<div class="panel-heading">
		Serie de Documentos
	</div>
	<div class="box-body">
		<?= $this->Form->create($docseries) ?>
		<div class="form-group">
			<?php 
				echo $this->Form->input('documento_id',array('options' => $documentos,'class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('deposito_id',array('options' => $depositos,'class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('serie',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('numero',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('tipo',array('options'=>array('0'=>'Venta','1'=>'Caja','2'=>'Almacen','3'=>'Manufactura'),'class'=>'form-control','for'=>'inputSuccess'));
			?>
		</div>
		<div class="box-footer">
			<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-default','action'=>'index')) ?>
			<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-success')) ?>
		</div>
		<?= $this->Form->end() ?>
	</div>
</div>

