<div class="panel panel-primary">
	<div class="panel-heading">
		Orden de Compra
	</div>
	<div class="box-body">
		<div class="form-group">
			<div class="row">
				<div class="col-lg-6">
				<?php if($detalle=='compras_detalle') {?>
					<?php echo $this->Form->input('orden_compra_id', ['label'=>'Orden de Compra','options' => $ordenCompras,'empty'=>true,'class'=>'form-control infoOrdenCompraParametro','data-column'=>'5','for'=>'inputSuccess']); ?>
				<?php } else {?>
					<?php echo $this->Form->input('orden_compra_id', ['label'=>'Orden de Compra','options' => $ordenCompras,'empty'=>true,'class'=>'form-control infoOrdenCompraParametro','data-column'=>'3','for'=>'inputSuccess']); ?>
				<?php } ?>
				</div>
				<div class="col-lg-6">
					<?php //echo $this->Form->input('ingreso_id',array('label'=>'Ingresos Almacen','options' => '','empty'=>true,'class'=>'form-control infoArticuloParametro','data-column'=>'9','for'=>'inputSuccess'));?>
				</div>
			</div><!-- /.row -->
			<div class="row">
				<div class="box-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover" id="dataTables-infoOrdenCompra">
							<thead>
							<tr>
								<th>Item</th>
								<th>Articulo</th>
								<th>Cantidad</th>
								<?php if($detalle == 'compras_detalle') {?>
								<th>Precio</th>
								<th>Importe</th>
								<?php } ?>
								<th></th>
							</tr>
							</thead>
							<tbody>
								<?php $counter=0; foreach($ordenComprasDetalle as $ocd){ ?>
								<tr>
								 <td class="articulo_id"><?= $this->Number->format($ocd->articulo_id) ?></td>
								 <td class="articulo_nombre"><?= $ocd->articulo->nombre ?></td>
								 <td class="articulo_cantidad"><?= $this->Number->format($ocd->cantidad) ?></td>										 
								<?php if($detalle == 'compras_detalle') {?>
									 <td class="articulo_precio"><?= $this->Number->precision($ocd->precio,2) ?></td>			 
									 <td class="articulo_importe"><?= $this->Number->precision(($ocd->cantidad * $ocd->precio),2) ?></td>
								 <?php } ?>
								 <td><?= $ocd->orden_compra_id ?></td>
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
		$('#dataTables-infoOrdenCompra').DataTable({
			responsive: true,
			"order": [[ 1, "asc" ]],
			<?php if($detalle=='compras_detalle') {?>
			"columnDefs": [
				{
					"targets": [ 5 ],//columna orden_compra_id
					"visible": false,
					"searchable": true
				}
			],
			<?php } else { ?>
			"columnDefs": [
				{
					"targets": [ 3 ],//columna orden_compra_id
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
		$('select.infoOrdenCompraParametro').on('change', function () {
			if($(this).val){
				$('#dataTables-infoOrdenCompra').DataTable().column( $(this).attr('data-column') ).search(
					$(this).val()
				).draw();
			}
		});
		$('button.addOC').on('click', function(){
			var oc_id = $('select#orden-compra-id').val();
			if(oc_id){
				<?php foreach($socios as $s) { ?>
					if(oc_id == "<?= $s['orden_compra_id'] ?>"){
						$("input.addText").val("<?= $s['socio_nombre'] ?>");
						$("input[name='socio_id']").val("<?= $s['socio_id'] ?>");
						$("select#estado option[value=1]").attr('selected', 'selected');
						$("select#estado").attr('readonly', 'readonly');
						
						<?php foreach($ordenComprasDetalle as $ocd){ ?>
							if(oc_id == "<?= $ocd['orden_compra_id'] ?>"){
								<?php if($detalle=="compras_detalle") { ?>
								counter = tadd.rows().count();
								tadd.row.add( [
									counter + 1,
									"<?= $ocd->articulo->nombre ?>",
									'<input type="hidden" class="incluir_impuesto" value="<?= $ocd->incluir_impuesto ?>" name="<?= $detalle; ?>['+counter+'][incluir_impuesto]">\
									<input type="hidden" class="tasa_impuesto" value="<?= $ocd->tasa_impuesto ?>" name="<?= $detalle; ?>['+counter+'][tasa_impuesto]">\
									<input type="hidden" value="<?= $ocd->articulo->id ?>" name="<?= $detalle; ?>['+counter+'][articulo_id]">\
									<input type="text" value="<?= $ocd->cantidad ?>" class="cantidad" name="<?= $detalle; ?>['+counter+'][cantidad]">',
									'<select class="precio" name="<?= $detalle; ?>['+counter+'][precio]">\
										<option value="<?= $ocd->precio ?>"><?= $ocd->precio ?></option>\
									</select>',
									'<input type="text" value="<?php echo $this->Number->precision(($ocd->cantidad * $ocd->precio),2); ?>" class="importe" disabled="true">', //cantidad * precio
									'<a href="#" class="fa fa-times del-product"></a>'
								] ).draw( false );
								<?php } else { ?>
									counter = taddIG.rows().count();
									taddIG.row.add( [
										counter + 1,
										'<?= $ocd->articulo->nombre ?>',
										'<input type="hidden" value="<?= $ocd->articulo->id ?>" name="<?= $detalle; ?>['+counter+'][articulo_id]">\
										<input type="text" value="<?= $this->Number->precision($ocd->cantidad,2) ?>" class="cantidad" name="<?= $detalle; ?>['+counter+'][cantidad]">',
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
