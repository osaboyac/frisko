<div class="panel panel-primary">
	<div class="panel-heading">
		Cargos
	</div>
	<div class="box-body">
		<?= $this->Form->create($cargo) ?>
		<div class="form-group">
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
					<?php echo $this->Form->input('incluir_impuesto',array('label'=>'Incluir impuesto al costo','options'=>['1'=>'No','2'=>'Si'],'empty'=>true,'class'=>'form-control','for'=>'inputSuccess')); ?>
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
		<div class="box-footer">
			<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-default','action'=>'index')) ?>
			<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-success')) ?>
		</div>
		<?= $this->Form->end() ?>
	</div>
</div>