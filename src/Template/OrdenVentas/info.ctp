<div class="panel panel-primary">
	<div class="panel-heading">
		Orden de Venta
	</div>
	<div class="box-body">
		<div class="form-group">
			<div class="row">
				<div class="col-lg-6">
				<?php if($detalle=='ventas_detalle') {?>
					<?php echo $this->Form->input('orden_venta_id', ['label'=>'Orden de Venta','options' => $ordenVentas,'empty'=>true,'class'=>'form-control infoOrdenVentaParametro','data-column'=>'5','for'=>'inputSuccess']); ?>
				<?php } else {?>
					<?php echo $this->Form->input('orden_venta_id', ['label'=>'Orden de Venta','options' => $ordenVentas,'empty'=>true,'class'=>'form-control infoOrdenVentaParametro','data-column'=>'3','for'=>'inputSuccess']); ?>
				<?php } ?>
				</div>
				<div class="col-lg-6">
					<?php //echo $this->Form->input('ingreso_id',array('label'=>'Ingresos Almacen','options' => '','empty'=>true,'class'=>'form-control infoArticuloParametro','data-column'=>'9','for'=>'inputSuccess'));?>
				</div>
			</div><!-- /.row -->
			<div class="row">
				<div class="box-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover" id="dataTables-infoOrdenVenta">
							<thead>
							<tr>
								<th>Item</th>
								<th>Articulo</th>
								<th>Cantidad</th>
								<?php if($detalle=='ventas_detalle') { ?>
									<th>Precio</th>
									<th>Importe</th>
								<?php } ?>
								<th></th>
							</tr>
							</thead>
							<tbody>
								<?php $counter=0; foreach($ordenVentasDetalle as $ovd){ ?>
								<tr>
								 <td class="articulo_id"><?= $this->Number->format($ovd->articulo_id) ?></td>
								 <td class="articulo_nombre"><?= $ovd->articulo->nombre ?></td>
								 <td class="articulo_cantidad"><?= $this->Number->precision($ovd->cantidad,2) ?></td>										 
								 <?php if($detalle=='ventas_detalle') { ?>
									 <td class="articulo_precio"><?= $this->Number->precision($ovd->precio,2) ?></td>										 
									 <td class="articulo_importe"><?= $this->Number->precision(($ovd->cantidad * $ovd->precio),2) ?></td>		 
								 <?php } ?>
								 <td><?= $ovd->orden_venta_id ?></td>
								</tr>
								<?php $counter++;} ?>
							</tbody>
						</table>
					</div><!-- /.table-responsive -->
				</div>
			</div><!-- /.row -->
		</div><!-- form-group has-box-body -->
	</div>
</div>
<script>
	$(document).ready(function () {
		$('#dataTables-infoOrdenVenta').DataTable({
			responsive: true,
			"order": [[ 1, "asc" ]],
			<?php if($detalle=='ventas_detalle') {?>
			"columnDefs": [
				{
					"targets": [ 5 ],//columna orden_venta_id
					"visible": false,
					"searchable": true
				}
			],
			<?php } else{ ?>
			"columnDefs": [
				{
					"targets": [ 3 ],//columna orden_venta_id
					"visible": false,
					"searchable": true
				}
			],
			<?php } ?>			
			lengthChange: false, 
			paging: false, 
			searching: [true,'<p>a</p>'], 
			info:false,
			language:{"emptyTable":"Sin registros", "search":"Buscar:"},
			"columns": [
				{"orderable": false, "width": "3%"},
				{"orderable": true, "width": "45%"}
			]
		});
		$('select.infoOrdenVentaParametro').on('change', function () {
			if($(this).val){
				$('#dataTables-infoOrdenVenta').DataTable().column( $(this).attr('data-column') ).search(
					$(this).val()
				).draw();
			}
		});
		$('button.addOV').on('click', function(){
			var ov_id = $('select#orden-venta-id').val();
			if(ov_id){
				<?php foreach($socios as $s) { ?>
					if(ov_id == "<?= $s['orden_venta_id'] ?>"){
						$("input.addText").val("<?= $s['socio_nombre'] ?>");
						$("input[name='socio_id']").val("<?= $s['socio_id'] ?>");
						$("select#estado option[value=1]").attr('selected', 'selected');
						$("select#estado").attr('readonly', 'readonly');
						
						<?php foreach($ordenVentasDetalle as $ovd){ ?>
							if(ov_id == "<?= $ovd['orden_venta_id'] ?>"){
								<?php if($detalle=="ventas_detalle") { ?>
									counter = tadd.rows().count();
									tadd.row.add( [
										counter + 1,
										"<?= $ovd->articulo->nombre ?>",
										'<input type="hidden" class="incluir_impuesto" value="<?= $ovd->incluir_impuesto ?>" name="<?= $detalle; ?>['+counter+'][incluir_impuesto]">\
										<input type="hidden" class="tasa_impuesto" value="<?= $ovd->tasa_impuesto ?>" name="<?= $detalle; ?>['+counter+'][tasa_impuesto]">\
										<input type="hidden" value="<?= $ovd->articulo->id ?>" name="<?= $detalle; ?>['+counter+'][articulo_id]">\
										<input type="text" value="<?= $this->Number->precision($ovd->cantidad,2) ?>" class="cantidad" name="<?= $detalle; ?>['+counter+'][cantidad]">',
										'<select class="precio" name="<?= $detalle; ?>['+counter+'][precio]">\
											<option value="<?= $this->Number->precision($ovd->precio,2) ?>" selected><?= $this->Number->precision($ovd->precio,2) ?></option>\
										</select>',
										'<input type="text" value="<?= $this->Number->precision(($ovd->precio * $ovd->cantidad),2) ?>" class="importe" name="<?= $detalle; ?>['+counter+'][importe]">',
										'<a href="#" class="fa fa-times del-product"></a>'
									]).draw(false);
								<?php } else {?>
									counter = taddIG.rows().count();
									taddIG.row.add( [
										counter + 1,
										"<?= $ovd->articulo->nombre ?>",
										'<input type="hidden" value="<?= $ovd->articulo->id ?>" name="<?= $detalle; ?>['+counter+'][articulo_id]">\
										<input type="text" value="<?= $this->Number->precision($ovd->cantidad,2) ?>" class="cantidad" name="<?= $detalle; ?>['+counter+'][cantidad]">',
										'<a href="#" class="fa fa-times del-product"></a>'
									]).draw(false);
								<?php } ?>
							}
						<?php } ?>
						delLineProductIG();
						delLineProduct();
						cambiarImporte();
						calculaTotal();
						$("#LinkArticulosInfo").click(function() { return false; });
					}
				<?php } ?>
			}
		});
	});
</script>
