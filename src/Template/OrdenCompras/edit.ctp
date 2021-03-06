<div class="panel panel-primary">
	<div class="panel-heading">
		Orden de Compra
	</div>
	<div class="box-body">
		<?= $this->Form->create($ordenCompra) ?>
		<div class="form-group">
			<div class="row">
				<div class="col-lg-12">
					<?php echo $this->Form->input('socio_id',array('options' => $socios,'class'=>'form-control select2','for'=>'inputSuccess'));?>
				</div>
			<div>
			</div class="row">
				<div class="col-lg-6">
					<label>Fecha</label>
					<div class='input-group date'>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
					<?php echo $this->Form->input('fecha',array('div'=>null,'label'=>false,'type'=>'text', 'value' => $ordenCompra['fecha']->format('Y-m-d'),'class'=>'form-control','for'=>'inputSuccess')); ?>
					</div>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('estado',array('label'=>'Estado','options'=>array('0'=>'Guardar','1'=>'Procesar'),'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 panel-heading">
					<div class="row">
						<div class="col-lg-6 panel-heading">
							<?= $this->Html->link(__('Buscar Artículos'), ['controller'=>'articulos-info','action' => 'index', 'orden_compras_detalle'],['class'=>'btn btn-info','data-toggle'=>'modal','data-target'=>'#articulosInfo']) ?>
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
				<div class="col-lg-10">
					<div class="row">
						<div class="col-lg-3">
							<?php echo $this->Form->input('id',array('label'=>'Orden No.','type'=>'text','class'=>'form-control','for'=>'inputSuccess','readonly'=>'true')); ?>
						</div>
						<div class="col-lg-3">
							<label>Subtotal</label>
							<div class="form-group input-group">
								<span class="input-group-addon" id="moneda">S/.</span>
								<?php echo $this->Form->input('total',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control grantotal','for'=>'inputSuccess','readonly'=>true)); ?>
							</div>
						</div>
						<div class="col-lg-3">
							<label>Impuesto</label>
							<div class="form-group input-group">
								<span class="input-group-addon" id="moneda">S/.</span>
								<?php echo $this->Form->input('impuesto',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control impuesto_total','for'=>'inputSuccess','readonly'=>true)); ?>
							</div>
						</div>
						<div class="col-lg-3">
							<label>Total</label>
							<div class="form-group input-group">
								<span class="input-group-addon" id="moneda">S/.</span>
								<?php echo $this->Form->input('grantotal',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control grantotal_total','for'=>'inputSuccess','readonly'=>true)); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<!-- /.panel-heading -->
						<div class="box-body">
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover dataTables-add">
									<thead class="label-default">
									<tr>
										<th>Item</th>
										<!--th>Código</th-->
										<th>Articulo</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>Importe</th>
										<th>Eliminar</th>
									</tr>
									</thead>
									<tbody>
										<?php $counter=0; foreach($ordenCompra->orden_compras_detalle as $ocd){ ?>
										<tr>
										 <td>
											<?php echo ($counter + 1);?>
										 </td>
										 <td>
											<?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.id',array('type'=>'hidden','value'=>$this->Number->format($ocd->id)));?>
											<?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.orden_compra_id',array('type'=>'hidden','value'=>$this->Number->format($ordenCompra->id)));?>

											 <?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.incluir_impuesto',array('type'=>'hidden','class'=>'incluir_impuesto','value'=>$this->Number->format($ocd->incluir_impuesto)));?>
											 <?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.tasa_impuesto',array('type'=>'hidden','class'=>'tasa_impuesto','value'=>$this->Number->format($ocd->tasa_impuesto)));?>

											 <?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.articulo_id',array('type'=>'hidden','value'=>$this->Number->format($ocd->articulo_id)));?>
											 <?php echo $ocd->articulo->nombre;?>
										 </td>
										 <td>
										 
										 <?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.cantidad',array('label'=>false,'div'=>false,'value'=>$this->Number->format($ocd->cantidad),'class'=>'cantidad','type'=>'text'));?>																		
										 </td>
										 
										 <td>
										 <?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.precio',array('label'=>false,'div'=>false,'options'=>array($this->Number->precision($ocd->precio,2)=>$this->Number->precision($ocd->precio,2)),'class'=>'precio'));?>
										 </td>
										 
										 <td>
										 <?php $importe =  $this->Number->format($ocd->cantidad) * $this->Number->format($ocd->precio);?>										 
										 <?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.importe',array('label'=>false,'div'=>false,'value'=>$this->Number->precision($importe,2),'class'=>'importe','readonly'=>'true'));?>
										 </td>									 
										 <td class="actions">
										 <?php echo $this->Html->link('<i class="fa fa-times"></i>', ['controller'=>'ordenComprasDetalle','action' => 'delete', $ocd->id,$ocd->orden_compra_id], ['escape'=>false, 'confirm' => __('Esta seguro de eliminar el registro # {0}?', $ocd->id)]);?>
										 </td>
										</tr>
										<?php $counter++;} ?>
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
<script>
	$('document').ready(function(){
		delLineProduct();
		cambiarImporte();
		calculaTotal();
	});
</script>
