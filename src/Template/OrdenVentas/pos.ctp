<div class="page-pos">
	<?= $this->Form->create($ordenVenta) ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-primary" style="padding:5px">
				<div class="row">
					<div class="col-lg-8">
						<div class="form-group input-group has-default col-lg-12">
							<?php echo $this->Form->input('socio_id',array('div'=>false,'label'=>false,'default'=>$posSetting->socio_id,'style'=>'width:100%','class'=>'form-control addText select2')); ?>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<select name="docserie_id" id ="docserie-id" class="form-control" for="inputSuccess">
								<?php foreach($documentos as $ds){?>
									<option value="<?=$ds->id?>"><?=$ds->nombre?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<?php echo $this->Form->input('articulo', ['label'=>false,'class'=>'form-control','for'=>'inputSuccess','placeholder'=>'Buscar producto por código de barra']); ?>
						</div>
					</div>
				</div>				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel dataTable_wrapper">
							<table class="table table-striped table-bordered table-hover" id="dataTables-pos">
								<thead class="label-default">
									<tr>
										<th>Item</th>
										<th>Articulo</th>
										<th>Cantidad</th>
										<th>Importe</th>
										<th><i class="fa fa-trash"></i></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="panel-primary" style="margin-top:-25px; padding-top:5px; font-size:12px">
							<div class="table-responsive table-bordered">
								<table class="table table-striped table-hover">
								 <tr>
								  <td>Total Items</td>
								  <td class="total_items"></td>
								  <th>Subtotal</th>
								  <td>
									<?= $this->Form->input('total', ['label'=>false,'type'=>'text', 'required'=>true,'class'=>'grantotal','style'=>'text-align:right;border:0; background:transparent; width:100%','for'=>'inputSuccess','readonly'=>true]); ?>
								  </td>
								 </tr>
								 <tr>
								  <td>Descuento</td>
								  <td>
									<?= $this->Form->input('descuento', ['label'=>false,'type'=>'text', 'readonly'=>true,'style'=>'text-align:right;border:0; background:transparent; width:100%','for'=>'inputSuccess']); ?>
								  </td>
								  <th>Impuesto</th>
								  <td>
									<?= $this->Form->input('impuesto', ['label'=>false,'type'=>'text', 'required'=>true,'style'=>'text-align:right;border:0; background:transparent; width:100%','class'=>'impuesto_total','for'=>'inputSuccess','readonly'=>true]); ?>
								  </td>
								 </tr>
								 <tr>
								  <td colspan="2"></td>
								  <th class="label-default">Total</th>
								  <td class="label-default">
									<?= $this->Form->input('grantotal', ['label'=>false,'type'=>'text', 'required'=>true,'style'=>'text-align:right;border:0; background:transparent; width:100%','for'=>'inputSuccess','readonly'=>true,'class'=>'grantotal_total']); ?>
								  </td>
								 </tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="panel panel-primary" style="padding:3px;">
                    <ul class="bs-glyphicons">
					<!-- foreach -->
					 <?php foreach($productos as $producto) { ?>
					  <!-- if pdv is one -->
					  <?php //if($producto->articulo->pdv) {?>
						<li title="<?= $producto->articulo->nombre ?>" onClick="AgregarProductosPOS('<?= $producto->articulo->id ?>','<?= $producto->articulo->nombre ?>','<?= $producto->articulo_precio->precio_estandar ?>','<?= $producto->lista_precio->incluir_impuesto ?>','<?= $producto->articulo_precio->impuesto->tasa ?>')">
						<span class="glyphicon-class"><?php echo substr($producto->articulo->nombre,0,20); ?></span>
						<?php if($producto->articulo->imagen){ ?>
							<?= $this->Html->image('../files/Articulos/imagen/'.$producto->articulo->id.'/'.$producto->articulo->imagen,['width'=>'70','heigth'=>'70']) ?>
						<?php } else{ ?>
							<?= $this->Html->image('../files/Articulos/imagen/images.jpg',['width'=>'70','heigth'=>'70']) ?>
						<?php } ?>
					  <?php //} ?><!-- end if pdv is one -->
						</li>
					 <?php } ?>
					</ul>
			</div>
			<div class="row">
			<div class="col-lg-8">
				<div class="panel panel-success">
					<div class="panel-heading">
						Registrar Pago
					</div>
					<div class="dataTable_wrapper">
					<table class="table table-striped text-success">
					 <tr>
					  <th>Medio de Pago</th>
					  <td class="form-control">
						<?= $this->Form->input('forma_pago_id', ['label'=>false,'options'=>$formaPagos, 'style'=>'text-align:left;border:0; background:transparent; width:100%','for'=>'inputSuccess']); ?>
					  </td>
					 </tr>
					 <tr>
					  <th class="chg_txt_1">Pago con</th>
					  <td class="chg_txt_paga_con form-control">
						<?= $this->Form->input('paga_con', ['label'=>false,'type'=>'text', 'class'=>'text-success', 'style'=>'text-align:right;border:0; background:transparent; width:100%','for'=>'inputSuccess']); ?>
					  </td>
					  <td class="chg_txt_tipo_tarjeta form-control" style="display:none">
						<?= $this->Form->input('tipo_tarjeta', ['label'=>false,'options'=>[0=>'Visa',1=>'Mastercard',2=>'American Express'], 'style'=>'text-align:left;border:0; background:transparent; width:100%','for'=>'inputSuccess']); ?>
					  </td>
					  <td class="chg_txt_nro_cheque form-control" style="display:none">
						<?= $this->Form->input('nro_cheque', ['label'=>false,'type'=>'text', 'style'=>'text-align:center;border:0; background:transparent; width:100%','for'=>'inputSuccess']); ?>
					  </td>
					 </tr>
					 <tr>
					  <th class="chg_txt_2">Cambio</th>
					  <td class="chg_txt_cambio form-control">
						<?= $this->Form->input('cambio', ['label'=>false,'type'=>'text', 'class'=>'text-success', 'style'=>'text-align:right;border:0; width:100%','for'=>'inputSuccess']); ?>
					  </td>
					  <td class="chg_txt_cuenta_abono form-control" style="display:none">
						<?= $this->Form->input('ctacorriente_id', ['label'=>false,'options'=>'', 'style'=>'text-align:left;border:0; background:transparent; width:100%','for'=>'inputSuccess']); ?>
					  </td>
					 </tr>
					</table>
					<div class="box-footer">
						<?= $this->Form->button(__('<i class="fa fa-usd"></i> Finalizar Venta'),array('class'=>'btn btn-success pull-right','escape'=>false)) ?>
					</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						Acciones
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<script>
var taddPOS = '';
$('document').ready(function(){
	/*medio de pago*/
	combo = document.getElementById('ctacorriente-id');
	<?php foreach($ctacorrientes as $cc){ ?>
		combo.options[combo.length] = new Option("<?php echo $cc->nro_cuenta.' - '.$cc->descripcion; ?>", "<?= $cc->id; ?>");
	<?php } ?>
	$('select#forma-pago-id').on('change', function(){
		if($(this).val()==2){
			$('th.chg_txt_1').html('Tipo Tarjeta');
			$('th.chg_txt_2').html('Cuenta de abono');
			$('td.chg_txt_tipo_tarjeta').css('display','block');
			$('td.chg_txt_cuenta_abono').css('display','block');
			$('td.chg_txt_paga_con').css('display','none');
			$('td.chg_txt_cambio').css('display','none');
			$('td.chg_txt_nro_cheque').css('display','none');
		}
		else if($(this).val()==3){
			$('th.chg_txt_1').html('Nro de cheque');
			$('th.chg_txt_2').html('Cuenta de abono');
			$('td.chg_txt_nro_cheque').css('display','block');
			$('td.chg_txt_cuenta_abono').css('display','block');
			$('td.chg_txt_tipo_tarjeta').css('display','none');
			$('td.chg_txt_paga_con').css('display','none');
			$('td.chg_txt_cambio').css('display','none');
		} else{
			$('th.chg_txt_1').html('Paga con');
			$('th.chg_txt_2').html('Cambio');
			$('td.chg_txt_tipo_tarjeta').css('display','none');
			$('td.chg_txt_cuenta_abono').css('display','none');
			$('td.chg_txt_paga_con').css('display','block');
			$('td.chg_txt_cambio').css('display','block');
			$('td.chg_txt_nro_cheque').css('display','none');
		}
	})
	/*items table*/
	var alto_ventana = parseInt($(window).height()) - 360;
	$("input.addText").val("<?= $posSetting->socio->nombre ?>");
	$("input[name='socio_id']").val("<?= $posSetting->socio_id ?>");
	taddPOS = $('#dataTables-pos').DataTable({
		responsive: true,
		lengthChange: false, 
		paging: false, 
		searching: false, 
		info:false,
		language:{"emptyTable":"Sin registros"},
		"order": [[ 1, "asc" ]],
		"columnDefs": [{
			"searchable": false,
            "orderable": false,
            "targets": 0
        }],
		"columns": [
			{"orderable": false, "width": "5%"},
			{"width": "70%"},
			{"orderable": false, "width": "10%" },
			{"orderable": false, "width": "10%" },
			{"orderable": false, "width": "5%"}
		],
        scrollY:alto_ventana + 'px',
        scrollCollapse: false
	});
	
	taddPOS.on( 'order.dt search.dt', function () {
        taddPOS.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    }).draw();
	
	$('#articulo').on('keypress', function(e){
		if(e.keyCode == 13){
			e.preventDefault();
		}
		<?php foreach($productos as $producto) { ?>
			if($(this).val()=="<?= $producto->articulo->codigo ?>"){
				$(this).val('');
				AgregarProductosPOS('<?= $producto->articulo->id ?>','<?= $producto->articulo->nombre ?>','<?= $producto->articulo_precio->precio_estandar ?>','<?= $producto->lista_precio->incluir_impuesto ?>','<?= $producto->articulo_precio->impuesto->tasa ?>');
			}
		<?php } ?>
	});
	
	$('input#paga-con').on('keyup', function(){
		var cambio = parseFloat($(this).val()) - parseFloat($('input.grantotal_total').val());
		if(cambio){
			$('input#cambio').val(cambio.toFixed(2));
		}
	});
	
});
	function AgregarProductosPOS(id,nombre, precio, incluir_impuesto, tasa_impuesto){
		var c = 0;
		if(taddPOS.rows().count()>0){
			$('input.articuloID').each(function(){
					if($(this).val()==id){
						fila = $(this).parents('tr');
						cantidad = parseFloat(fila.find('input.cantidad').val()) + 1;
						importe = parseFloat(precio) * parseFloat(cantidad);
						fila.find('input.cantidad').val(cantidad);
						fila.find('input.importe').val(importe.toFixed(2));
						c += 1;
					}
			});
		}
		if(c==0){
			counter = taddPOS.rows().count();
			taddPOS.row.add( [
				counter + 1,
				nombre,
				'<input type="hidden" class="incluir_impuesto" value="'+incluir_impuesto+'" name="orden_ventas_detalle['+counter+'][incluir_impuesto]">\
				<input type="hidden" class="tasa_impuesto" value="'+tasa_impuesto+'" name="orden_ventas_detalle['+counter+'][tasa_impuesto]">\
				<input type="hidden" class="articuloID" value="'+id+'" name="orden_ventas_detalle['+counter+'][articulo_id]">\
				<input type="text" value="1" class="cantidad" name="orden_ventas_detalle['+counter+'][cantidad]">',
				'<input type="hidden" value="'+precio+'" class="precio" name="orden_ventas_detalle['+counter+'][precio]">\
				<input type="text" value="'+precio+'" class="importe" disabled="true">', //cantidad * precio
				'<a href="#" class="fa fa-trash del-productPOS"></a>'
			] ).draw( false );
		}
		delLineProductPOS();
		cambiarImportePOS();
		calculaTotalPOS();
	}
	
	function delLineProductPOS(){
		$('#dataTables-pos').on('click', 'a.del-productPOS', function () {
			taddPOS.row( $(this).parents('tr') ).remove().draw(false);
				taddPOS.on( 'order.dt', function () {
					taddPOS.column(0, {order:'applied'}).nodes().each( function (cell, i) {
						cell.innerHTML = i+1;
					});
				}).draw();
			cambiarImportePOS();
			calculaTotalPOS();
		});

	}
	function cambiarImportePOS(){
		$('input.cantidad').each(function(){
			$(this).on('keyup',function(){
				fila = $(this).parents('tr');
				cantidad = $(this).val();
				precio = fila.find('input.precio').val();
				importe = cantidad * precio;
				fila.find('input.importe').val(importe.toFixed(2));
				calculaTotalPOS();
			});
		});
		$('select.precio').each(function(){
			$(this).on('change',function(){
				fila = $(this).parents('tr');
				cantidad = fila.find('input.cantidad').val();
				precio = $(this).val();
				importe = cantidad * precio;
				fila.find('input.importe').val(importe.toFixed(2));
				calculaTotalPOS();
			});
		});
	}
	function calculaTotalPOS(){
		total = 0;
		grantotal = 0;
		impuesto = 0;
		$('input.importe').each(function(){
			incluir_impuesto = $(this).parents('tr').find('input.incluir_impuesto').val();
			if(incluir_impuesto==1){
				tasa_impuesto = '1.'+$(this).parents('tr').find('input.tasa_impuesto').val();
				impuesto_producto = (parseFloat($(this).val()) / parseFloat(tasa_impuesto));
				grantotal += parseFloat($(this).val());
				impuesto = grantotal - impuesto_producto;
				total += grantotal - impuesto;
			} else {
				tasa_impuesto = '1.'+$(this).parents('tr').find('input.tasa_impuesto').val();
				impuesto_producto = (parseFloat($(this).val()) * parseFloat(tasa_impuesto));
				grantotal += parseFloat(impuesto_producto);
				total += parseFloat($(this).val());
				impuesto = grantotal - total;
			}
		})
		$('input.grantotal').val(total.toFixed(2));
		$('input.impuesto_total').val(impuesto.toFixed(2));
		$('input.grantotal_total').val(grantotal.toFixed(2));
		
		$('td.total_items').html(taddPOS.rows().count());
	}
</script>
