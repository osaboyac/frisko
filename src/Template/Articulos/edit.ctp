<div class="panel panel-primary">
	<div class="panel-heading">
		Articulos, Servicios y Tipo de Gasto
	</div>
	<div class="panel-body">
	<!-- form add optional, for not validade navigator 'novalidate'=>'novalidate' -->
		<?= $this->Form->create($articulo,array('type'=>'file')) ?>
		<div class="form-group has-success">
			<div class="row">
				<div class="col-lg-4">
					<?php echo $this->Form->input('codigo',array('class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-8">
					<?php echo $this->Form->input('nombre',array('type'=>'text','class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-12">
					<?php echo $this->Form->input('descripcion',array('class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('artfamilia_id',array('label'=>'Familia','class'=>'form-control anyCombo','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('artmarca_id',array('label'=>'Marca','empty'=>true,'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('umedida_id',array('label'=>'Unidad Medida','class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('tipo',array('options'=>array('0'=>'Articulo','1'=>'Servicio','2'=>'Tipo Gasto','3'=>'Patrimonio'),'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('imagen',array('type'=>'file')); ?>
					<?php echo $this->Form->input('imagen_dir',array('type'=>'hidden')); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('pdv',array('label'=>'Mostrar en el PDV','options'=>array('0'=>'NO','1'=>'Si'),'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>			
				<div class="col-lg-4">
					<?php echo $this->Form->input('estado',array('options'=>array('1'=>'Activo','0'=>'Inactivo'),'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>			
			</div>
			
				
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>
