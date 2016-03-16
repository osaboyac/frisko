<div class="panel panel-primary">
	<div class="panel-heading">
		Caja Diario
	</div>
	<div class="panel-body">
		<?= $this->Form->create($caja) ?>
		<div class="form-group has-success">
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('libro_caja_id', ['options' => $libroCajas,'class'=>'form-control']); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('deposito_id', ['label'=>'Sucursal','options' => $depositos,'class'=>'form-control']); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('nombre',array('class'=>'form-control','for'=>'inputSuccess','value'=>'Caja Menor '.date('d-m-Y H:i'))); ?>
				</div>
				<div class="col-lg-6">
					<label>Fecha</label>
					<div class='input-group date'>
					<?php echo $this->Form->input('fecha',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control','for'=>'inputSuccess')); ?>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<?php echo $this->Form->input('descripcion',array('class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>
