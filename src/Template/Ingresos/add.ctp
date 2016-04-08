<div class="panel panel-primary">
	<div class="panel-heading">
		Ingreso de Articulos
	</div>
	<div class="box-body">
		<?= $this->Form->create($ingreso) ?>
		<div class="form-group has-box-body">
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('deposito_id',array('label'=>'Sucursal','options' => $depositos,'class'=>'form-control','for'=>'inputSuccess'));?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('socio_id',array('options' => $socios,'class'=>'form-control addText select2','for'=>'inputSuccess'));?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<label>Fecha</label>
					<div class='input-group date'>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					<?php echo $this->Form->input('fecha',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control','for'=>'inputSuccess')); ?>
					</div>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('estado',array('label'=>'Estado','options'=>array('0'=>'Guardar','1'=>'Procesar'),'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>				
			<div class="row">
				<div class="col-lg-6">
					<div class="col-lg-4 panel-heading">
						<?= $this->Html->link(__('Buscar Artículos'), ['controller'=>'articulos-info','action' => 'index','ingresos_detalle'],['class'=>'btn btn-info','data-toggle'=>'modal','data-target'=>'#articulosInfo','id'=>'LinkArticulosInfo']) ?>
					</div>							
					<div class="modal fade" id="articulosInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
								<div class="modal-content"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								</div>
						</div>
						<!-- /.modal-dialog -->
					</div>
					<div class="col-lg-4 panel-heading">
						<?= $this->Html->link(__('Crear desde'), ['controller'=>'orden-compras','action' => 'info','ingresos_detalle'],['class'=>'btn btn-warning','data-toggle'=>'modal','data-target'=>'#ingresosInfo']) ?>
					</div>
					<div class="modal fade" id="ingresosInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
								<div class="modal-content"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-success addOC" data-dismiss="modal">Agregar</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								</div>
						</div>
						<!-- /.modal-dialog -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<!-- /.panel-heading -->
						<div class="box-body">
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover dataTables-addIG">
									<thead class="label-default">
									<tr>
										<th>Item</th>
										<th>Articulo</th>
										<th>Cantidad</th>
										<th>Eliminar</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<!-- /.table-responsive -->
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-12 -->
			</div>
		</div>
		<div class="box-footer">
			<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-default','action'=>'index')) ?>
			<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-success')) ?>
		</div>
		<?= $this->Form->end() ?>
	</div>
</div>