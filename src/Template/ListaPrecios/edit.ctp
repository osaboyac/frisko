<div class="panel panel-primary">
	<div class="panel-heading">
		Listas de Precios
	</div>
	<div class="box-body">
		<?= $this->Form->create($listaPrecio) ?>
		<div class="form-group">
			<?php 
				echo $this->Form->input('nombre',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('socio_id',array('options' => $socios,'empty'=>true,'class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('moneda_id',array('options' => $monedas,'class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('tipo_lista',['options' =>array('0'=>'Compra','1'=>'Venta'),'class'=>'form-control','for'=>'inputSuccess']);
				echo $this->Form->input('incluir_impuesto',['label'=>'Incluir impuesto en el precio','options' =>array('0'=>'No','1'=>'Si'),'class'=>'form-control','for'=>'inputSuccess']);
				echo $this->Form->input('estado',['options' =>array('1'=>'Activo','0'=>'Inactivo'),'class'=>'form-control','for'=>'inputSuccess']);
			?>
		</div>
		<div class="box-footer">
			<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-default','action'=>'index')) ?>
			<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-success')) ?>
		</div>
		<?= $this->Form->end() ?>
	</div>
</div>