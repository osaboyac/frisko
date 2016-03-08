<div class="panel panel-primary">
	<div class="panel-heading">
		Impuestos
	</div>
	<div class="panel-body">
		<?= $this->Form->create($impuesto) ?>
		<div class="form-group has-success">
			<?php 
				echo $this->Form->input('nombre',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('descripcion',array('class'=>'form-control','for'=>'inputSuccess'));
			?>
			<label>tasa</label>
			<div class="form-group input-group">
				<?php echo $this->Form->input('tasa',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control','for'=>'inputSuccess'));?>
				<span class="input-group-addon">%</span>
			</div>
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>

