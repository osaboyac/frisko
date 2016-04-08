<div class="panel panel-primary">
	<div class="panel-heading">
		Información de Articulos
	</div>
	<div class="box-body">
		<div class="form-group">
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('d_id', ['label'=>'Sucursal','options' => $depositos,'class'=>'form-control infoArticuloParametro','data-column'=>'8','for'=>'inputSuccess']); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('l_p_id',array('label'=>'Lista de Precio','options' => $listaPrecios,'empty'=>true,'class'=>'form-control infoArticuloParametro','data-column'=>'9','for'=>'inputSuccess'));?>
				</div>
			</div>
			<div class="box-body"></div>
			<div class="row">
				<div class="col-lg-12">
						<!-- /.panel-heading -->
						<div class="box-body panel panel-default">
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover" id="dataTables-infoArticulos">
									<thead>
									<tr>
										<th>Código</th>
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
												<button type="button" class="btn btn-success btn-xs add-product" tasa_impuesto="<?= h($articulosInfo->articulo_precio->impuesto->tasa) ?>" incluir_impuesto="<?= h($articulosInfo->lista_precio->incluir_impuesto) ?>" onClick="AgregarProductos(this)"><i class="fa fa-check"></i></button>
											</td>
											<?php } ?>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<!-- /.table-responsive -->
						</div>
						<!-- /.box-body -->
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
				{"orderable": true, "width": "40%"},
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
		
		/*$('.add-product').on( 'click', function () {
		});*/
	});
	
	function AgregarProductos(e){
		var articulo_id = $(e).parents('tr').find('td.articulo_id').text();
		var articulo_nombre = $(e).parents('tr').find('td.articulo_nombre').text();
		var articulo_precio_minimo = $(e).parents('tr').find('td.articulo_precio_minimo').text();
		var articulo_precio_estandar = $(e).parents('tr').find('td.articulo_precio_estandar').text();
		var articulo_precio_maximo =$(e).parents('tr').find('td.articulo_precio_maximo').text();
		var incluir_impuesto = $(e).attr('incluir_impuesto');
		var tasa_impuesto = $(e).attr('tasa_impuesto');
		
		if('<?= $detalle; ?>'=='ingresos_detalle' || '<?= $detalle; ?>'=='guias_detalle'){
			var c = 0;
			if(taddIG.rows().count()>0){
				$('input.articuloID').each(function(){
						if($(this).val()==articulo_id){
							fila = $(this).parents('tr');
							cantidad = parseFloat(fila.find('input.cantidad').val()) + 1;
							fila.find('input.cantidad').val(cantidad);
							c += 1;
						}
				});
			}
			if(c==0){
				counter = taddIG.rows().count();
				taddIG.row.add( [
					counter + 1,
					articulo_nombre,
	//					'<input type="text" value="'+articulo_nombre+'" class="descripcion" name="<?= $detalle; ?>['+counter+'][descripcion]">',
					'<input type="hidden" class="articuloID" value="'+articulo_id+'" name="<?= $detalle; ?>['+counter+'][articulo_id]">\
					<input type="text" value="1" class="cantidad" name="<?= $detalle; ?>['+counter+'][cantidad]">',
					'<a href="#" class="fa fa-times del-product"></a>'
				] ).draw( false );
				delLineProductIG();
			}
		} else {
			var c = 0;
			if(tadd.rows().count()>0){
				$('input.articuloID').each(function(){
						if($(this).val()==articulo_id){
							fila = $(this).parents('tr');
							cantidad = parseFloat(fila.find('input.cantidad').val()) + 1;
							importe = parseFloat(fila.find('select.precio').val()) * parseFloat(cantidad);
							fila.find('input.cantidad').val(cantidad);
							fila.find('input.importe').val(importe.toFixed(2));
							c += 1;
						}
				});
			}
			if(c==0){
				counter = tadd.rows().count();
				tadd.row.add( [
					counter + 1,
					articulo_nombre,
					'<input type="hidden" class="incluir_impuesto" value="'+incluir_impuesto+'" name="<?= $detalle; ?>['+counter+'][incluir_impuesto]">\
					<input type="hidden" class="tasa_impuesto" value="'+tasa_impuesto+'" name="<?= $detalle; ?>['+counter+'][tasa_impuesto]">\
					<input type="hidden" class="articuloID" value="'+articulo_id+'" name="<?= $detalle; ?>['+counter+'][articulo_id]">\
					<input type="text" value="1" class="cantidad" name="<?= $detalle; ?>['+counter+'][cantidad]">',
					'<select class="precio" name="<?= $detalle; ?>['+counter+'][precio]">\
						<option value="'+articulo_precio_minimo+'">'+articulo_precio_minimo+'</option>\
						<option value="'+articulo_precio_estandar+'" selected>'+articulo_precio_estandar+'</option>\
						<option value="'+articulo_precio_maximo+'">'+articulo_precio_maximo+'</option>\
					</select>',
					'<input type="text" value="'+articulo_precio_estandar+'" class="importe" disabled="true">', //cantidad * precio
					'<a href="#" class="fa fa-times del-product"></a>	'
				] ).draw( false );
			}
			delLineProduct();
			cambiarImporte();
			calculaTotal();
		}
	}
	
</script>