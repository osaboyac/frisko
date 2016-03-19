<div class="panel panel-primary">
	<div class="panel-heading">
		Ventas
	</div>
	<div class="panel-body">
		<?= $this->Form->create($venta) ?>
		<div class="form-group has-success">
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('deposito_id', ['label'=>'Sucursal','options' => $depositos,'empty'=>true,'class'=>'form-control','for'=>'inputSuccess','required'=>true]); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('socio_id',array('label'=>'Socio de Negocio','options' => $socios,'class'=>'form-control addText','for'=>'inputSuccess','required'=>true));?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<?php echo $this->Form->input('documento_id', ['type'=>'hidden','value'=>'','id'=>'documento-id']); ?>
					<?php echo $this->Form->input('docserie_id', ['type'=>'hidden','value'=>'','id'=>'docserie-id']); ?>
					<?php echo $this->Form->input('codigo_unico', ['type'=>'hidden','value'=>'','id'=>'codigo-unico']); ?>
					<?php echo $this->Form->input('documento_serie_id', ['label'=>'Documento','options' => '', 'class'=>'form-control','required'=>true]); ?>
				</div>
				<div class="col-lg-3">
					<?php echo $this->Form->input('serie',array('type'=>'text','class'=>'form-control','for'=>'inputSuccess','readonly'=>true)); ?>
				</div>
				<div class="col-lg-3">
					<?php echo $this->Form->input('numero',array('type'=>'text','class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-3">
					<label>Fecha</label>
					<div class='input-group date'>
					<?php echo $this->Form->input('fecha',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control','for'=>'inputSuccess')); ?>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<?php echo $this->Form->input('forma_pago_id', ['options' => $formaPagos,'label'=>'Forma de Pago','class'=>'form-control','for'=>'inputSuccess']); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('user_id', ['options' => $users,'label'=>'Usuario','class'=>'form-control','for'=>'inputSuccess']); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('estado',array('label'=>'Estado','options'=>array('0'=>'Guardar','1'=>'Procesar'),'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 panel-body">
					<div class="row">
						<div class="col-lg-6 panel-heading">
							<?= $this->Html->link(__('Buscar Artículos'), ['controller'=>'articulos-info','action' => 'index','ventas_detalle'],['class'=>'btn btn-info','data-toggle'=>'modal','data-target'=>'#articulosInfo','id'=>'LinkArticulosInfo']) ?>
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
							<?= $this->Html->link(__('Crear desde'), ['controller'=>'orden-ventas','action' => 'info','ventas_detalle'],['class'=>'btn btn-warning','data-toggle'=>'modal','data-target'=>'#ordenVentasInfo']) ?>
						</div>
						<div class="modal fade" id="ordenVentasInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
									<div class="modal-content"></div>
									<div class="modal-footer">
										<button type="button" class="btn btn-success addOV" data-dismiss="modal">Agregar</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									</div>
							</div>
							<!-- /.modal-dialog -->
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-4">
							<label>Subtotal</label>
							<div class="form-group input-group">
								<span class="input-group-addon" id="moneda">S/.</span>
								<?php echo $this->Form->input('total',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control grantotal','for'=>'inputSuccess','readonly'=>true)); ?>
							</div>
						</div>
						<div class="col-lg-4">
							<label>Impuesto</label>
							<div class="form-group input-group">
								<span class="input-group-addon" id="moneda">S/.</span>
								<?php echo $this->Form->input('impuesto',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control impuesto_total','for'=>'inputSuccess','readonly'=>true)); ?>
							</div>
						</div>
						<div class="col-lg-4">
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
<script>
 $(document).ready(function(){
	$("select#deposito-id").val('');
	$("input#serie").val('');
	$("input#numero").val('');
	
	$("select#deposito-id").on("change", function () {
		combo = document.getElementById('documento-serie-id');
		$('select#documento-serie-id').empty();
		combo.options[combo.length] = new Option("", "", true);
		if($(this).val()){
			<?php foreach($documentos as $ds){ ?>
				if($(this).val() == '<?= $ds->deposito_id;?>'){
					combo.options[combo.length] = new Option("<?= $ds->nombre; ?>", "<?= $ds->documento_id.'-'.$ds->serie.'-'.$ds->numero.'-'.$ds->id.'-'.$ds->deposito_id; ?>");
				}
			 <?php } ?>
		}
	});
	
	$("select#documento-serie-id").on("change", function () {
		serie = $(this).val().split('-');
		$('input#documento-id').val(serie[0]);
		$('input#serie').val(serie[1]);
		$('input#numero').val(serie[2]);
		$('input#docserie-id').val(serie[3]);
		$('input#codigo-unico').val(serie[1]+'.'+serie[2]+'.'+serie[3]+'.'+serie[4]);//serie.numero.docserie_id.deposito_id
	});
	$('input#numero').on("change", function () {
		serie = $('input#codigo-unico').val().split('.');
		$('input#codigo-unico').val(serie[0]+'.'+$(this).val()+'.'+serie[2]+'.'+serie[3]);//serie.numero.docserie_id.deposito_id		
	});
	
 }); 
</script>