<div class="panel panel-primary">
	<div class="panel-heading">
		Provincias
	</div>
	<div class="panel-body">
		<?= $this->Form->create($provincia) ?>
		<div class="form-group has-success">
			<?php 
				echo $this->Form->input('nombre',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('departamento_id', ['options' => $departamentos,'class'=>'form-control']);
			?>
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>