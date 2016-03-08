<div class="panel panel-primary">
	<div class="panel-heading">
		Orden de Venta
	</div>
	<div class="panel-body">
		<?= $this->Form->create($ordenVenta) ?>
		<div class="form-group has-success">
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('deposito_id', ['label'=>'Sucursal','options' => $depositos,'class'=>'form-control','for'=>'inputSuccess']); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('socio_id',array('label'=>'Socio de Negocio','options' => $socios,'class'=>'form-control','for'=>'inputSuccess'));?>
				</div>
			</div>				
			<div class="row">
				<div class="col-lg-4">
					<?php echo $this->Form->input('forma_pago_id', ['options' => $formaPagos, 'class'=>'form-control']); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('estado',array('label'=>'Tipo','options'=>array('0'=>'Proforma','1'=>'Orden Estándar','2'=>'Orden POS'),'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('user_id', ['options' => $users,'label'=>'Usuario','class'=>'form-control','for'=>'inputSuccess']); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 panel-body">
					<div class="row">
						<div class="col-lg-4 panel-body">
							<?= $this->Html->link(__('Buscar Artículos'), ['controller'=>'articulos-info','action' => 'index', 'orden_ventas_detalle'],['class'=>'btn btn-info','data-toggle'=>'modal','data-target'=>'#articulosInfo']) ?>
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
						
					</div>
				</div>
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-6 panel-body">
							<label>Fecha</label>
							<div class='input-group date'>
							<?php echo $this->Form->input('fecha',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control','for'=>'inputSuccess')); ?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
						<div class="col-lg-6 panel-body">
							<label>Total</label>
							<div class="form-group input-group">
								<span class="input-group-addon" id="moneda">S/.</span>								
								<?php echo $this->Form->input('total',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control grantotal','for'=>'inputSuccess','disabled'=>true)); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover dataTables-add">
									<thead style="background:#f2f2f2">
									<tr>
										<th>Item</th>
										<th>Articulo</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>Importe</th>
										<th>Eliminar</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<!-- /.table-responsive -->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-12 -->
			</div>
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>
