<div class="panel panel-primary">
	<div class="panel-heading">
		Cargos
	</div>
	<div class="panel-body">
		<?= $this->Form->create($cargo) ?>
		<div class="form-group has-success">
			<div class="row">
				<div class="col-lg-12">
				<?php echo $this->Form->input('nombre',array('class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('total',array('Label'=>'Costo','type'=>'text','class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('socio_id', ['options' => $socios,'empty'=>true,'class'=>'form-control']); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('impuesto_id', ['options' => $impuestos,'empty'=>true,'class'=>'form-control']); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('incluir_impuesto',array('label'=>'Incluir impuesto al costo','options'=>['0'=>'No','1'=>'Si'],'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('tipo_cargo',array('options'=>['0'=>'Fijo','1'=>'Variable'],'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('estado',array('options'=>['1'=>'Activo','0'=>'Inactivo'],'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>