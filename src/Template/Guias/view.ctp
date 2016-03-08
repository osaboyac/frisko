<div class="panel panel-primary">
	<div class="panel-heading">
		Guías de Remisión
	</div>
	<div class="panel-body">
		<?= $this->Form->create($guia) ?>
		<div class="form-group has-success">
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('deposito_id', ['label'=>'Sucursal','options' => $depositos,'empty'=>true,'class'=>'form-control','for'=>'inputSuccess','disabled'=>true]); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('socio_id',array('label'=>'Socio de Negocio','options' => $socios,'class'=>'form-control','for'=>'inputSuccess','disabled'=>true));?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<?php echo $this->Form->input('documento_serie_id', ['label'=>'Documento','options' => $documentoSerie, 'class'=>'form-control','disabled'=>true]); ?>
				</div>
				<div class="col-lg-3">
					<?php echo $this->Form->input('serie',array('type'=>'text','class'=>'form-control','for'=>'inputSuccess','disabled'=>true)); ?>
				</div>
				<div class="col-lg-3">
					<?php echo $this->Form->input('numero',array('type'=>'text','class'=>'form-control','for'=>'inputSuccess','disabled'=>true)); ?>
				</div>
				<div class="col-lg-3">
					<?php echo $this->Form->input('estado',array('label'=>'Estado','options'=>array('0'=>'Guardar','1'=>'Procesado'),'class'=>'form-control','for'=>'inputSuccess','disabled'=>true)); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('direccion', ['label' => 'Punto de llegada','class'=>'form-control','for'=>'inputSuccess','disabled'=>true]); ?>
				</div>
				<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-6">
						<?php echo $this->Form->input('id',array('label'=>'Registro No.','type'=>'text','class'=>'form-control','for'=>'inputSuccess','disabled'=>'true')); ?>
						</div>
						<div class="col-lg-6">
							<label>Fecha</label>
							<div class='input-group date'>
							<?php echo $this->Form->input('fecha',array('div'=>null,'label'=>false,'type'=>'text','value'=>$guia->fecha->format('Y-m-d'),'class'=>'form-control','for'=>'inputSuccess','disabled'=>true)); ?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 panel-body">
					<div class="row">
						<div class="col-lg-4 panel-heading">
							<?= $this->Html->link(__('Buscar Artículos'), ['controller'=>'articulos-info','action' => 'index','guias_detalle'],['class'=>'btn btn-info','data-toggle'=>'modal','data-target'=>'#articulosInfo']) ?>
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
							<button type="button" class="btn btn-warning">Ingresar desde</button>
						</div>
					</div>
				</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover dataTables-addIG">
									<thead style="background:#f2f2f2">
									<tr>
										<th>Item</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Eliminar</th>
									</tr>
									</thead>
									<tbody>
										<?php $counter=0; foreach($guia->guias_detalle as $gd){ ?>
										<tr>
										 <td>
											<?php echo $this->Form->input('guias_detalle.'.$counter.'.id',array('type'=>'hidden','value'=>$this->Number->format($gd->id)));?>
											<?php echo ($counter + 1); ?>
										 </td>
										 <td>
											 <?= $gd->descripcion;?>
										 </td>
										 <td>
											 <?= $this->Form->input('guias_detalle.'.$counter.'.cantidad',array('label'=>false,'div'=>false,'value'=>$this->Number->format($gd->cantidad),'class'=>'cantidad','type'=>'text','disabled'=>true));?>
										 </td>
										 <td class="actions">
											 <?php echo $this->Html->link('<i class="fa fa-times"></i>', ['controller'=>'guiasDetalle','action' => 'delete', $gd->id,$gd->iguia_id], ['escape'=>false, 'confirm' => __('Esta seguro de eliminar el registro # {0}?', $gd->id)]);?>
										 </td>
										</tr>
										<?php $counter++;} ?>
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
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>