<div class="panel panel-primary">
	<div class="panel-heading">
		Usuarios
	</div>
	<div class="panel-body">
		<?= $this->Form->create($user) ?>
		<div class="form-group has-success">
			<div class="row">
				<div class="col-lg-12">
					<?php echo $this->Form->input('role_id', ['label'=>'Miembro de','options' => $roles,'class'=>'form-control','for'=>'inputSuccess']);?>
					
				</div>
			</div>
			<?php 
				echo $this->Form->input('username',['label'=>'Usuario','class'=>'form-control','for'=>'inputSuccess']);
				echo $this->Form->input('password',['label'=>'Contraseña','class'=>'form-control','for'=>'inputSuccess']);
				echo $this->Form->input('socio_id', ['options' => $socios,'class'=>'form-control']);
			?>
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('agente',array('label'=>'Vendedor','options'=>array('0'=>'No','1'=>'Si'),'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('estado',array('options'=>array('1'=>'Activo','0'=>'Inactivo'),'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>
