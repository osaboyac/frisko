<div class="panel panel-primary">
	<div class="panel-heading">
		Cuentas Corrientes
	</div>
	<div class="box-body">
		<?= $this->Form->create($ctacorriente) ?>
		<div class="form-group">
			<div class="row">
				<div class="col-lg-4">
					<?php echo $this->Form->input('banco_id', ['options' => $bancos,'class'=>'form-control']); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('deposito_id', ['label'=>'Sucursal','options' => $depositos,'empty'=>true,'class'=>'form-control']); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('socio_id', ['label'=>'Socio de Negocio','options' => $socios,'empty'=>true,'class'=>'form-control select2']); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('moneda_id', ['options' => $monedas,'class'=>'form-control']); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('nro_cuenta',array('class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('descripcion',array('class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('tipo',array('options'=>[0=>'Cuenta Ahorros',1=>'Cuenta Corriente'],'class'=>'form-control','for'=>'inputSuccess')); ?>
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
