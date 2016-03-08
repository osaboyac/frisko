<div class="panel panel-primary">
	<div class="panel-heading">
		Familia de Articulos
	</div>
	<div class="panel-body">
		<?= $this->Form->create($artfamilia) ?>
		<div class="form-group has-success">
			<?php 
				echo $this->Form->input('nombre',array('class'=>'form-control','for'=>'inputSuccess'));
			?>
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>