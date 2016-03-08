<div class="panel panel-primary">
	<div class="panel-heading">
		Precio de Articulos
	</div>
	<div class="panel-body">
		<?= $this->Form->create($articuloPrecio) ?>
		<div class="form-group has-success">
			<?php 
				echo $this->Form->input('deposito_id',array('label'=>'Sucursal','options' => $depositos,'class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('lista_precio_id',array('options' => $listaPrecios,'class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('articulo_id',array('options' => $articulos,'class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('impuesto_id',array('options' => $impuestos,'class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('precio_minimo',['type'=>'decimal','class'=>'form-control','for'=>'inputSuccess']);
				echo $this->Form->input('precio_estandar',['type'=>'decimal','class'=>'form-control','for'=>'inputSuccess']);
				echo $this->Form->input('precio_maximo',['type'=>'decimal','class'=>'form-control','for'=>'inputSuccess']);
			?>
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>
