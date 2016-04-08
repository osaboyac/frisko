<div class="panel panel-primary">
	<div class="panel-heading">
		Orden de Venta
	</div>
	<div class="box-body">
		<?= $this->Form->create($ordenVenta) ?>
		<div class="form-group">
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('deposito_id', ['label'=>'Sucursal','options' => $depositos,'class'=>'form-control','for'=>'inputSuccess','disabled'=>true]); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('socio_id',array('label'=>'Socio de Negocio','options' => $socios,'class'=>'form-control select2','for'=>'inputSuccess','disabled'=>true));?>
				</div>
			</div>				
			<div class="row">
				<div class="col-lg-3">
					<label>Fecha</label>
					<div class='input-group date'>
					<?php echo $this->Form->input('fecha',array('div'=>null,'label'=>false,'type'=>'text', 'value' => $ordenVenta['fecha']->format('Y-m-d'),'class'=>'form-control','for'=>'inputSuccess','disabled'=>true)); ?>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
				<div class="col-lg-3">
					<?php echo $this->Form->input('forma_pago_id', ['options' => $formaPagos, 'class'=>'form-control','disabled'=>true]); ?>
				</div>
				<div class="col-lg-3">
					<?php echo $this->Form->input('estado',array('label'=>'Tipo','options'=>array('0'=>'Proforma','1'=>'Orden Estándar','2'=>'Orden de Venta (POS)'),'class'=>'form-control','for'=>'inputSuccess','disabled'=>true)); ?>
				</div>
				<div class="col-lg-3">
					<?php echo $this->Form->input('user_id', ['options' => $users,'label'=>'Usuario','class'=>'form-control','for'=>'inputSuccess','disabled'=>true]); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-3">
							<?php echo $this->Form->input('id',array('label'=>'Orden No.','type'=>'text','class'=>'form-control','for'=>'inputSuccess','disabled'=>'true')); ?>
						</div>
						<div class="col-lg-3">
							<label>Subtotal</label>
							<div class="form-group input-group">
								<span class="input-group-addon" id="moneda">S/.</span>								
								<?php echo $this->Form->input('total',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control grantotal','for'=>'inputSuccess','disabled'=>true)); ?>
							</div>
						</div>
						<div class="col-lg-3">
							<label>Impuesto</label>
							<div class="form-group input-group">
								<span class="input-group-addon" id="moneda">S/.</span>								
								<?php echo $this->Form->input('impuesto',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control impuesto_total','for'=>'inputSuccess','disabled'=>true)); ?>
							</div>
						</div>
						<div class="col-lg-3">
							<label>Total</label>
							<div class="form-group input-group">
								<span class="input-group-addon" id="moneda">S/.</span>								
								<?php echo $this->Form->input('grantotal',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control grantotal_total','for'=>'inputSuccess','disabled'=>true)); ?>
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
										<th>Articulo</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>Importe</th>
										<th></th>
									</tr>
									</thead>
									<tbody>
										<?php $counter=0; foreach($ordenVenta->orden_ventas_detalle as $ovd){ ?>
										<tr>
										 <td>
											<?php echo $this->Form->input('orden_ventas_detalle.'.$counter.'.id',array('type'=>'hidden','value'=>$this->Number->format($ovd->id)));?>
											<?php echo ($counter + 1);?>
										 </td>
										 <td>
											 <?php echo $this->Form->input('orden_ventas_detalle.'.$counter.'.incluir_impuesto',array('type'=>'hidden','class'=>'incluir_impuesto','value'=>$this->Number->format($ovd->incluir_impuesto)));?>
											 <?php echo $this->Form->input('orden_ventas_detalle.'.$counter.'.tasa_impuesto',array('type'=>'hidden','class'=>'tasa_impuesto','value'=>$this->Number->format($ovd->tasa_impuesto)));?>
											 
											 <?php echo $this->Form->input('orden_ventas_detalle.'.$counter.'.articulo_id',array('type'=>'hidden','value'=>$this->Number->format($ovd->articulo_id)));?>
											 <?php echo $ovd->articulo->nombre;?>
										 </td>
										 <td>
										 
										 <?php echo $this->Form->input('orden_ventas_detalle.'.$counter.'.cantidad',array('label'=>false,'div'=>false,'value'=>$this->Number->format($ovd->cantidad),'class'=>'cantidad','type'=>'text','disabled'=>true));?>																		
										 </td>
										 
										 <td>
										 <?php echo $this->Form->input('orden_ventas_detalle.'.$counter.'.precio',array('label'=>false,'div'=>false,'options'=>array($this->Number->precision($ovd->precio,2)=>$this->Number->precision($ovd->precio,2)),'class'=>'precio','disabled'=>true));?>
										 </td>
										 
										 <td>
										 <?php $importe =  $this->Number->format($ovd->cantidad) * $this->Number->format($ovd->precio);?>										 
										 <?php echo $this->Form->input('orden_ventas_detalle.'.$counter.'.importe',array('label'=>false,'div'=>false,'value'=>$this->Number->precision($importe,2),'class'=>'importe','disabled'=>'true'));?>
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
		<div class="box-footer">
			<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-default','action'=>'index')) ?>
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