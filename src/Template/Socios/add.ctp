<div class="panel panel-primary">
	<div class="panel-heading">
		Socios de Negocio
	</div>
	<div class="box-body">
		<?= $this->Form->create($socio) ?>
		<div class="form-group">
			<?php 
				echo $this->Form->input('nombre',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('descripcion',array('class'=>'form-control','for'=>'inputSuccess'));
			?>
			<div class="row">
				<div class="col-lg-4">
					<?php echo $this->Form->input('tipo_doc',array('label'=>'Tipo Documento','options'=>array('1'=>'DNI','0'=>'RUC'),'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-8">
					<?php echo $this->Form->input('codigo',array('label'=>'Nro. Documento','type'=>'text','class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('email',array('class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('telefono',array('class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('movil',array('class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<?php echo $this->Form->input('addresses.0.departamento_id',array('options'=>$departamento,'empty'=>true,'class'=>'form-control select2','for'=>'inputSuccess','id'=>'departamento-id')); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('addresses.0.provincia_id',array('options'=>'','class'=>'form-control select2','for'=>'inputSuccess','id'=>'provincia-id')); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('addresses.0.distrito_id',array('options'=>'','class'=>'form-control','for'=>'inputSuccess','id'=>'distrito-id')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<?php echo $this->Form->input('addresses.0.zona',array('class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-8">
					<?php echo $this->Form->input('addresses.0.direccion',array('class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 checkbox">
					<div class="form-group">
						<label class="checkbox-inline">
							<?php echo $this->Form->input('cliente',['type'=>'checkbox','class'=>'minimal']); ?>
						</label>
						<label class="checkbox-inline">
							<?php echo $this->Form->input('proveedor',['type'=>'checkbox','class'=>'minimal']); ?>
						</label>
						<label class="checkbox-inline">
							<?php echo $this->Form->input('empleado',['type'=>'checkbox','class'=>'minimal']); ?>
						</label>
					</div>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('estado',array('options'=>array('1'=>'Activo','0'=>'Inactivo'),'class'=>'form-control','for'=>'inputSuccess')); ?>
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

<script>
 $('document').ready(function(){
	$('select#departamento-id').on('change',function(){
		combo = document.getElementById('provincia-id');
		$('select#provincia-id').empty();	
		combo.options[combo.length] = new Option("", "", true);
		if($(this).val()){
			<?php foreach($provincia as $rs){ ?>
				if($(this).val() == '<?= $rs->departamento_id;?>'){
					combo.options[combo.length] = new Option("<?= $rs->nombre ?>", "<?= $rs->id; ?>");
				}
			 <?php } ?>
		}
	});
	$('select#provincia-id').on('change',function(){
		combo = document.getElementById('distrito-id');
		$('select#distrito-id').empty();	
		if($(this).val()){
			<?php foreach($distrito as $rs){ ?>
				if($(this).val() == '<?= $rs->provincia_id;?>'){
					combo.options[combo.length] = new Option("<?= $rs->nombre ?>", "<?= $rs->id; ?>");
				}
			 <?php } ?>
		}
	});
 });
</script>