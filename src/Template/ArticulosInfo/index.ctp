<div class="panel panel-primary">
	<div class="panel-heading">
		Información de Articulos
	</div>
	<div class="panel-body">
		<div class="form-group has-success">
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('d_id', ['label'=>'Sucursal','options' => $depositos,'class'=>'form-control infoArticuloParametro','data-column'=>'8','for'=>'inputSuccess']); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('l_p_id',array('label'=>'Lista de Precio','options' => $listaPrecios,'empty'=>true,'class'=>'form-control infoArticuloParametro','data-column'=>'9','for'=>'inputSuccess'));?>
				</div>
			</div>
			<div class="panel-body"></div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover" id="dataTables-infoArticulos">
									<thead>
									<tr>
										<th>ID</th>
										<th>Artículo</th>
										<th>Disponible</th>
										<th>Reservada</th>
										<th>Existencia</th>
										<th>Precio Mínimo</th>
										<th>Precio Estándar</th>
										<th>Precio Máximo</th>
										<th>Deposito</th>
										<th>Lista Precio</th>
										<?php if($detalle) {?>
										<th>Agregar</th>
										<?php } ?>
									</tr>
									</thead>
									<tbody>
										<?php foreach ($articulosInfo as $articulosInfo):?>
										<tr>
											<td class="articulo_id"><?= h($articulosInfo->articulo->id) ?></td>
											<td class="articulo_nombre"><?= h($articulosInfo->articulo->nombre) ?></td>
											<td><?= h($articulosInfo->disponible) ?></td>
											<td><?= h($articulosInfo->reservada) ?></td>
											<td><?= h($articulosInfo->existencia) ?></td>
											<td class="articulo_precio_minimo"><?= $this->Number->precision(h($articulosInfo->articulo_precio->precio_minimo),2) ?></td>
											<td class="articulo_precio_estandar"><?= $this->Number->precision(h($articulosInfo->articulo_precio->precio_estandar),2) ?></td>
											<td class="articulo_precio_maximo"><?= $this->Number->precision(h($articulosInfo->articulo_precio->precio_maximo),2) ?></td>
											<td><?= h($articulosInfo->deposito->id) ?></td>
											<td><?= h($articulosInfo->lista_precio->id) ?></td>
											<?php if($detalle) {?>
											<td style="text-align:center">
												<button type="button" class="btn btn-info btn-circle add-product"><i class="fa fa-check"></i></button>
											</td>
											<?php } ?>
										</tr>
										<?php endforeach; ?>
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
	</div>
</div>
<script>
	$(document).ready(function () {
		$('#dataTables-infoArticulos').DataTable({			
			responsive: true,
			"order": [[ 1, "asc" ]],
			"columnDefs": [
				{
					"targets": [ 8 ],
					"visible": false,
					"searchable": true
				},
				{
					"targets": [ 9 ],
					"visible": false,
					"searchable": true
				}
			],
			"language": {
				"lengthMenu": "Ver _MENU_ registros por página",
				"zeroRecords": "Lo sentimos - no se encontró registros",
				"info": "Ver pagina _PAGE_ de _PAGES_",
				"infoEmpty": "No hay registros disponibles",
				"infoFiltered": "(filtro de _MAX_ registros en total)",
				"paginate": {
					"first":      "Primero",
					"last":       "Ultimo",
					"next":       "Siguiente",
					"previous":   "Anterior"
				},
				"loadingRecords": "Cargando...",
				"processing":     "Procesando...",
				"search":         "Buscar:",
			},
			"columns": [
				{"width": "5%"},
				{"orderable": true, "width": "30%"},
				null,
				null,
				null,
				null,
				null,
				null,
				null,
				<?php if($detalle) {?>
				null,
				{"orderable": false, "width": "5%"}
				<?php } else {?>
				null
				<?php }?>
			]
		});
		$('select.infoArticuloParametro, select.lista-precio').on('change', function () {
			$('#dataTables-infoArticulos').DataTable().column( $(this).attr('data-column') ).search(
				$(this).val()
			).draw();
		});		
		
		$('.add-product').on( 'click', function () {
			var articulo_id =  $(this).parent().parent().children('td.articulo_id').text();
			var articulo_nombre =  $(this).parent().parent().children('td.articulo_nombre').text();
			var articulo_precio_minimo = $(this).parent().parent().children('td.articulo_precio_minimo').text();
			var articulo_precio_estandar = $(this).parent().parent().children('td.articulo_precio_estandar').text();
			var articulo_precio_maximo = $(this).parent().parent().children('td.articulo_precio_maximo').text();
			
			if('<?= $detalle; ?>'=='ingresos_detalle' || '<?= $detalle; ?>'=='guias_detalle'){
				counter = taddIG.rows().count();
				taddIG.row.add( [
					counter + 1,
					articulo_nombre,
//					'<input type="text" value="'+articulo_nombre+'" class="descripcion" name="<?= $detalle; ?>['+counter+'][descripcion]">',
					'<input type="hidden" value="'+articulo_id+'" name="<?= $detalle; ?>['+counter+'][articulo_id]">\
					<input type="text" value="1" class="cantidad" name="<?= $detalle; ?>['+counter+'][cantidad]">',
					'<a href="#" class="fa fa-times del-product"></a>'
				] ).draw( false );
				delLineProductIG();
			} else {
				counter = tadd.rows().count();
				tadd.row.add( [
					counter + 1,
					articulo_nombre,
					'<input type="hidden" value="'+articulo_id+'" name="<?= $detalle; ?>['+counter+'][articulo_id]">\
					<input type="text" value="1" class="cantidad" name="<?= $detalle; ?>['+counter+'][cantidad]">',
					'<select class="precio" name="<?= $detalle; ?>['+counter+'][precio]">\
						<option value="'+articulo_precio_minimo+'">'+articulo_precio_minimo+'</option>\
						<option value="'+articulo_precio_estandar+'" selected>'+articulo_precio_estandar+'</option>\
						<option value="'+articulo_precio_maximo+'">'+articulo_precio_maximo+'</option>\
					</select>',
					'<input type="text" value="'+articulo_precio_estandar+'" class="importe" disabled="true">', //cantidad * precio
					'<a href="#" class="fa fa-times del-product"></a>	'
				] ).draw( false );
				delLineProduct();
				cambiarImporte();
				calculaTotal();
			}
		});	
	});
</script>