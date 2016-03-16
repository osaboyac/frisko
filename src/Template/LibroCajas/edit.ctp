<div class="panel panel-primary">
	<div class="panel-heading">
		Libro Caja
	</div>
	<div class="panel-body">
		<?= $this->Form->create($libroCaja) ?>
		<div class="form-group has-success">
			<?php 
				echo $this->Form->input('nombre',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('descripcion',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('moneda_id', ['options' => $monedas,'class'=>'form-control']);
				echo $this->Form->input('estado',array('options'=>['1'=>'Activo','2'=>'Procesar'],'class'=>'form-control','for'=>'inputSuccess'));
			?>
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>