<div class="panel panel-primary">
	<div class="panel-heading">
		Configuración de Punto de Venta
	</div>
	<div class="box-body">
		<?= $this->Form->create($posSetting) ?>
		<div class="form-group">
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
					<?php echo $this->Form->input('socio_id',array('label'=>'Cliente Predeterminado','class'=>'form-control select2','for'=>'inputSuccess')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<label>Documento de Almacén</label>
					<select name="docserie_id" id ="docserie-id" class="form-control" for="inputSuccess">
						<?php foreach($docseries as $ds){?>
							<?php $select = ''; if($ds->id == $posSetting->docserie_id){ $select = "selected";}?>
							<option value="<?=$ds->id?>" selected="<?=$select?>"><?=$ds->nombre?></option>
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
		<div class="box-footer">
			<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-default','action'=>'index')) ?>
			<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-success')) ?>
		</div>
		<?= $this->Form->end() ?>
	</div>
</div>
