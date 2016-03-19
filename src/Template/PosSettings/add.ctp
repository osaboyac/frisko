<div class="panel panel-primary">
	<div class="panel-heading">
		Configuración de Punto de Venta
	</div>
	<div class="panel-body">
		<?= $this->Form->create($posSetting) ?>
		<div class="form-group has-success">
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('deposito_id', ['label'=>'Sucursal','class'=>'form-control']); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('user_id', ['label'=>'Usuario','class'=>'form-control']); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('caja_id',array('empty'=>true, 'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('socio_id',array('label'=>'Cliente Predeterminado','class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<label for="docserie-id">Documento de Almacén</label>
					<select name="docserie_id" id ="docserie-id" class="form-control" for="inputSuccess">
						<?php foreach($docseries as $ds){?>
							<option value="<?=$ds->id?>"><?=$ds->nombre?></option>
						<?php }?>
					</select>
				</div>
				<div class="col-lg-6">
					<div class="input select">
						<label for="documento-id">Documento de Venta</label>				
						<select name="documento_id[]" id ="documento-id" class="form-control" for="inputSuccess" multiple="true">
							<?php foreach($documentos as $d){?>
								<option value="<?=$d->id?>"><?=$d->nombre?></option>
							<?php }?>
						</select>
					</div>
				</div>
			</div>
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>
