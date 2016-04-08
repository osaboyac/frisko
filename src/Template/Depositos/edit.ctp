<div class="panel panel-primary">
	<div class="panel-heading">
		Sucursales
	</div>
	<div class="box-body">
		<?= $this->Form->create($deposito) ?>
		<div class="form-group">
			<?php 
				echo $this->Form->input('nombre',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('direccion',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('telefono',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('email',array('class'=>'form-control','for'=>'inputSuccess'));
			?>
		</div>
		<div class="box-footer">
			<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-default','action'=>'index')) ?>
			<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-success')) ?>
		</div>
		<?= $this->Form->end() ?>
	</div>
</div>
