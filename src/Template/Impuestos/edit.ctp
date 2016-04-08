<div class="panel panel-primary">
	<div class="panel-heading">
		Impuestos
	</div>
	<div class="box-body">
		<?= $this->Form->create($impuesto) ?>
		<div class="form-group">
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
		<div class="box-footer">
			<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-default','action'=>'index')) ?>
			<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-success')) ?>
		</div>
		<?= $this->Form->end() ?>
	</div>
</div>

