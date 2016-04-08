<div class="panel panel-primary">
	<div class="panel-heading">
		Libro Caja
	</div>
	<div class="box-body">
		<?= $this->Form->create($libroCaja) ?>
		<div class="form-group has-box-body">
			<?php 
				echo $this->Form->input('nombre',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('descripcion',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('moneda_id', ['options' => $monedas,'class'=>'form-control']);
			?>
		</div>
		<div class="box-footer">
			<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-default','action'=>'index')) ?>
			<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-success')) ?>
		</div>
		<?= $this->Form->end() ?>
	</div>
</div>