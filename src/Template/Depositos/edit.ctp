<div class="panel panel-primary">
	<div class="panel-heading">
		Sucursales
	</div>
	<div class="panel-body">
		<?= $this->Form->create($deposito) ?>
		<div class="form-group has-success">
			<?php 
				echo $this->Form->input('nombre',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('direccion',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('telefono',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('email',array('class'=>'form-control','for'=>'inputSuccess'));
			?>
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>
