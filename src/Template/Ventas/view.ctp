<div class="panel panel-primary">
	<div class="panel-heading">
		Ventas
	</div>
	<div class="panel-body">
		<?= $this->Form->create($venta) ?>
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
				<div class="col-lg-4">
					<label>Fecha</label>
					<div class='input-group date'>
					<?php echo $this->Form->input('fecha',array('div'=>null,'label'=>false,'type'=>'text','value'=>$venta->fecha->format('Y-m-d'),'class'=>'form-control','for'=>'inputSuccess','readonly'=>true)); ?>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('forma_pago_id', ['options' => $formaPagos,'label'=>'Forma de Pago','class'=>'form-control','for'=>'inputSuccess','disabled'=>true]); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('user_id', ['options' => $users,'label'=>'Usuario','class'=>'form-control','for'=>'inputSuccess','disabled'=>true]); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<?php echo $this->Form->input('documento_id', ['type'=>'hidden','id'=>'documento-id']); ?>
					<?php echo $this->Form->input('docserie_id', ['type'=>'hidden','id'=>'docserie-id']); ?>
					<?php echo $this->Form->input('codigo_unico', ['type'=>'hidden','id'=>'codigo-unico']); ?>
					<?php echo $this->Form->input('documento_serie_id', ['label'=>'Documento','options' => $documentoSerie, 'class'=>'form-control','disabled'=>true]); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('serie',array('type'=>'text','class'=>'form-control','for'=>'inputSuccess','readonly'=>true)); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('numero',array('type'=>'text','class'=>'form-control','for'=>'inputSuccess','readonly'=>true)); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">					
				</div>
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-6">
							<?php echo $this->Form->input('estado',array('label'=>'Estado','options'=>array('0'=>'Guardar','1'=>'Procesado'),'class'=>'form-control','for'=>'inputSuccess','disabled'=>true)); ?>
						</div>
						<div class="col-lg-6">
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
										<th></th>
									</tr>
									</thead>
									<tbody>
										<?php $counter=0; foreach($venta->ventas_detalle as $vd){ ?>
										<tr>
										 <td>
											<?php echo $this->Form->input('ventas_detalle.'.$counter.'.id',array('type'=>'hidden','value'=>$this->Number->format($vd->id)));?>
											<?php echo $this->Form->input('ventas_detalle.'.$counter.'.compra_id',array('type'=>'hidden','value'=>$this->Number->format($vd->orden_compra_id)));?>
											<?php echo ($counter + 1);?>
										 </td>
										 <td>
											 <?php echo $this->Form->input('ventas_detalle.'.$counter.'.articulo_id',array('type'=>'hidden','value'=>$this->Number->format($vd->articulo_id)));?>
											 <?php echo $vd->articulo->nombre;?>
										 </td>
										 <td>										 
										 <?= $this->Number->format($vd->cantidad);?>																		
										 </td>										 
										 <td>
										 <?= $this->Number->precision($vd->precio,2);?>
										 </td>										 
										 <td>
										 <?php $importe =  $this->Number->format($vd->cantidad) * $this->Number->format($vd->precio);?> 
										 <?php echo $this->Form->input('ventas_detalle.'.$counter.'.importe',array('label'=>false,'div'=>false,'value'=>$this->Number->precision($importe,2),'class'=>'importe','disabled'=>'true'));?>
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