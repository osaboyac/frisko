<div class="panel panel-primary">
	<div class="panel-heading">
		Orden de Compra
	</div>
	<div class="panel-body">
		<?= $this->Form->create($ordenCompra) ?>
		<div class="form-group has-success">
			<div class="row">
				<div class="col-lg-12">
					<?php echo $this->Form->input('socio_id',array('options' => $socios,'class'=>'form-control','for'=>'inputSuccess','disabled'=>'true'));?>
				</div>
			<div>
			</div class="row">
				<div class="col-lg-6">
					<label>Fecha</label>
					<div class='input-group date'>
					<?php echo $this->Form->input('fecha',array('div'=>null,'label'=>false,'type'=>'text', 'value' => $ordenCompra['fecha']->format('Y-m-d'),'class'=>'form-control','for'=>'inputSuccess','disabled'=>'true')); ?>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('estado',array('label'=>'Estado','options'=>array('0'=>'Guardar','1'=>'Procesado'),'class'=>'form-control','for'=>'inputSuccess','disabled'=>'true')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('id',array('label'=>'Orden No.','type'=>'text','class'=>'form-control','for'=>'inputSuccess','disabled'=>'true')); ?>
				</div>
				<div class="col-lg-6">
					<label>Total</label>
					<div class="form-group input-group">
						<span class="input-group-addon" id="moneda">S/.</span>
						<?php echo $this->Form->input('total',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control grantotal','for'=>'inputSuccess','disabled'=>true)); ?>
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
										<!--th>Código</th-->
										<th>Articulo</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>Importe</th>
										<th></th>
									</tr>
									</thead>
									<tbody>
										<?php $counter=1; foreach($ordenCompra->orden_compras_detalle as $ocd){ ?>
										<tr>
										 <td>
											<?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.id',array('type'=>'hidden','value'=>$this->Number->format($ocd->id)));?>
											<?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.orden_compra_id',array('type'=>'hidden','value'=>$this->Number->format($ocd->orden_compra_id)));?>
											<?= $counter;?>
										 </td>
										 <td>
											 <?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.articulo_id',array('type'=>'hidden','value'=>$this->Number->format($ocd->articulo_id)));?>
											 <?php echo $ocd->articulo->nombre;?>
										 </td>
										 <td>
										 
										 <?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.cantidad',array('label'=>false,'div'=>false,'value'=>$this->Number->format($ocd->cantidad),'class'=>'cantidad','type'=>'text','disabled'=>'true'));?>																		
										 </td>
										 
										 <td>
										 <?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.precio',array('label'=>false,'div'=>false,'options'=>array($this->Number->precision($ocd->precio,2)=>$this->Number->precision($ocd->precio,2)),'class'=>'precio','disabled'=>'true'));?>
										 </td>
										 
										 <td>
										 <?php $importe =  $this->Number->precision($this->Number->format($ocd->cantidad) * $this->Number->format($ocd->precio),2);?>										 
										 <?php echo $this->Form->input('orden_compras_detalle.'.$counter.'.importe',array('label'=>false,'div'=>false,'value'=>$this->Number->format($importe),'class'=>'importe','disabled'=>'true'));?>
										 </td>									 
										 <td class="actions">
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
<script>
	$('document').ready(function(){
		calculaTotal();
	});
</script>
