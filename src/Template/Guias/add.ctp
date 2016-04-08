<div class="panel panel-primary">
	<div class="panel-heading">
		Guías de Remisión
	</div>
	<div class="box-body">
		<?= $this->Form->create($guia) ?>
		<div class="form-group">
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('deposito_id', ['label'=>'Sucursal','options' => $depositos,'empty'=>true,'class'=>'form-control','for'=>'inputSuccess','required'=>true]); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('socio_id',array('label'=>'Socio de Negocio','options' => $socios,'class'=>'form-control addText select2','for'=>'inputSuccess','id'=>'socio-id'));?>
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
					<?php echo $this->Form->input('estado',array('label'=>'Estado','options'=>array('0'=>'Guardar','1'=>'Procesar'),'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<?php echo $this->Form->input('direccion', ['label' => 'Punto de llegada','class'=>'form-control','for'=>'inputSuccess']); ?>
				</div>
				<div class="col-lg-4">
					<label>Fecha</label>
					<div class='input-group date'>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					<?php echo $this->Form->input('fecha',array('div'=>null,'label'=>false,'type'=>'text','class'=>'form-control','for'=>'inputSuccess','required'=>true)); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 box-body">
					<div class="row">
						<div class="col-lg-4 panel-heading">
							<?= $this->Html->link(__('Buscar Artículos'), ['controller'=>'articulos-info','action' => 'index','guias_detalle'],['class'=>'btn btn-info','data-toggle'=>'modal','data-target'=>'#articulosInfo','id'=>'LinkArticulosInfo']) ?>
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
							<?= $this->Html->link(__('Crear desde'), ['controller'=>'orden-ventas','action' => 'info','guias_detalle'],['class'=>'btn btn-warning','data-toggle'=>'modal','data-target'=>'#ordenVentasInfo']) ?>
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
										<th>Descripción</th>
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
		<div class="box-footer">
			<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-default','action'=>'index')) ?>
			<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-success')) ?>
		</div>
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
		if($(this).val()){
			combo.options[combo.length] = new Option("", "", true);
			<?php foreach($documentos as $ds){ ?>
				if($(this).val() == '<?= $ds->deposito_id;?>'){
					combo.options[combo.length] = new Option("<?= $ds->nombre; ?>", "<?= $ds->documento_id.'-'.$ds->serie.'-'.$ds->numero.'-'.$ds->id.'-'.$ds->deposito_id; ?>");
				} else {
					while(combo.length > 0){
						combo.remove(combo.length-1);
					}
				}
			 <?php } ?>
		} else {
			while(combo.length > 0){
				combo.remove(combo.length-1);
			}			
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