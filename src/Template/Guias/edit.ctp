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
					<?php echo $this->Form->input('socio_id',array('label'=>'Socio de Negocio','options' => $socios,'class'=>'form-control select2','for'=>'inputSuccess'));?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<?php echo $this->Form->input('documento_id', ['type'=>'hidden','id'=>'documento-id']); ?>
					<?php echo $this->Form->input('docserie_id', ['type'=>'hidden','id'=>'docserie-id']); ?>
					<?php echo $this->Form->input('codigo_unico', ['type'=>'hidden','id'=>'codigo-unico']); ?>
					<?php echo $this->Form->input('documento_serie_id', ['label'=>'Documento','options' => $documentoSerie, 'class'=>'form-control','required'=>true]); ?>
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
					<?php echo $this->Form->input('fecha',array('div'=>null,'label'=>false,'type'=>'text','value'=>$guia->fecha->format('Y-m-d'),'class'=>'form-control','for'=>'inputSuccess','required'=>true)); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 box-body">
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
										<?php $counter=0; foreach($guia->guias_detalle as $gd){ ?>
										<tr>
										 <td>
											<?php echo $this->Form->input('guias_detalle.'.$counter.'.id',array('type'=>'hidden','value'=>$this->Number->format($gd->id)));?>
											<?php echo ($counter + 1); ?>
										 </td>
										 <td>
											 <?php echo $this->Form->input('guias_detalle.'.$counter.'.articulo_id',array('type'=>'hidden','value'=>$this->Number->format($gd->articulo_id)));?>
											 <?php echo $gd->articulo->nombre;?>
										 </td>
										 <td>
											 <?php echo $this->Form->input('guias_detalle.'.$counter.'.cantidad',array('label'=>false,'div'=>false,'value'=>$this->Number->format($gd->cantidad),'class'=>'cantidad','type'=>'text'));?>
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