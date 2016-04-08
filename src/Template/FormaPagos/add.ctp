<div class="panel panel-primary">
	<div class="panel-heading">
		Formas de Pago
	</div>
	<div class="box-body">
		<?= $this->Form->create($formaPago) ?>
			<div class="col-lg-12">
				<?php echo $this->Form->input('nombre',array('class'=>'form-control','for'=>'inputSuccess'));?>
			</div>
			<div class="col-lg-12">
				<label>Vencimiento</label>
				<div class="form-group input-group">
					<?php echo $this->Form->input('cantidad',array('div'=>null,'label'=>false, 'type'=>'text','value'=>'0','class'=>'form-control','for'=>'inputSuccess'));?>
					<span class="input-group-addon">días</span>
				</div>
			</div>
		<div class="box-footer">
			<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-default','action'=>'index')) ?>
			<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-success')) ?>
		</div>
		<?= $this->Form->end() ?>
	</div>
</div>
