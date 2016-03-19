<div class="page-pos">
	<?= $this->Form->create($ordenVenta) ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-primary" style="padding:5px">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group input-group has-default col-lg-12">
							<?php echo $this->Form->input('socio_id',array('div'=>false,'label'=>false,'empty'=>'Cliente','class'=>'form-control addText')); ?>
							<span class="input-group-btn">
								<?= $this->Html->link(__('<i class="fa fa-plus"></i>'),['controller'=>'compras','action' => 'ctapagar'],['escape'=>false,'class'=>'btn btn-success','data-toggle'=>'modal','data-target'=>'#NuevoCliente']) ?>
							</span>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<?php echo $this->Form->input('articulo', ['label'=>false,'class'=>'form-control','for'=>'inputSuccess','placeholder'=>'Buscar producto por código de barra']); ?>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<select name="docserie_id" id ="docserie-id" class="form-control" for="inputSuccess">
								<?php foreach($documentos as $ds){?>
									<option value="<?=$ds->id?>"><?=$ds->nombre?></option>
								<?php }?>
							</select>
						</div>
					</div>
				</div>				
				<div class="row">
					<div class="col-lg-12">
						<div class="dataTable_wrapper">
							<table class="table table-striped table-bordered table-hover" id="dataTables-pos">
								<thead class="btn-success">
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
						<div class="panel-body"></div>
						<div class="panel-primary" style="margin-top:-25px; padding-top:5px; font-size:12px">
							<div class="table-responsive table-bordered">
								<table class="table table-striped table-hover">
								 <tr>
								  <td>Total Items</td>
								  <td></td>
								  <th>Subtotal</th>
								  <td>
									<?= $this->Form->input('total', ['label'=>false,'type'=>'text', 'required'=>true,'class'=>'grantotal','style'=>'text-align:right;border:0; background:transparent; width:100%','for'=>'inputSuccess','readonly'=>true]); ?>
								  </td>
								 </tr>
								 <tr>
								  <td>Descuento</td>
								  <td>
									<?= $this->Form->input('descuento', ['label'=>false,'type'=>'text', 'required'=>true,'style'=>'text-align:right;border:0; background:transparent; width:100%','for'=>'inputSuccess']); ?>
								  </td>
								  <th>Impuesto</th>
								  <td>
									<?= $this->Form->input('impuesto', ['label'=>false,'type'=>'text', 'required'=>true,'style'=>'text-align:right;border:0; background:transparent; width:100%','class'=>'impuesto_total','for'=>'inputSuccess','readonly'=>true]); ?>
								  </td>
								 </tr>
								 <tr>
								  <td colspan="2"></td>
								  <th class="btn-success">Total</th>
								  <td class="btn-success">
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
			<div class="panel panel-primary" style="padding:5px">
				<div class="row">
					<div class="col-lg-12" style="font-size:10px">
					<!-- foreach -->
						 <?php foreach($productos as $producto) { ?>
							  <!-- if pdv is one -->
							  <?php if($producto->articulo->pdv) {?>
							  <div class="col-lg-3 panel-heading btn-default" title="<?= $producto->articulo->descripcion ?>" style="padding:5px; border:1px solid #f2f2f2; text-align:center;" onClick="AgregarProductosPOS('<?= $producto->articulo->id ?>','<?= $producto->articulo->nombre ?>','<?= $producto->articulo_precio->precio_estandar ?>','<?= $producto->lista_precio->incluir_impuesto ?>','<?= $producto->articulo_precio->impuesto->tasa ?>')">
								<div class="success"><?php echo substr($producto->articulo->nombre,0,20); ?></div>
								<div class="form-group" style="text-align:center">
								<?php if($producto->articulo->imagen){ ?>
									<?= $this->Html->image('../files/Articulos/imagen/'.$producto->articulo->id.'/'.$producto->articulo->imagen,['width'=>'80','heigth'=>'80']) ?>
								<?php } else{ ?>
									<?= $this->Html->image('../files/Articulos/imagen/images.jpg',['width'=>'80','heigth'=>'80']) ?>
								<?php } ?>
								</div>
							  </div>
							  <?php } ?>
							  <!-- end pdv if -->
						<?php } ?>
					<!-- end foreach -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
var taddPOS = '';
$('document').ready(function(){
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
        scrollY:'43vh',
        scrollCollapse: false
	});
	
	taddPOS.on( 'order.dt search.dt', function () {
        taddPOS.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    }).draw();
	
	$('#articulo').on('change', function(){
		<?php foreach($productos as $producto) { ?>
			if($(this).val()=="<?= $producto->articulo->codigo ?>"){
				$(this).val('');
				AgregarProductosPOS('<?= $producto->articulo->id ?>','<?= $producto->articulo->nombre ?>','<?= $producto->articulo_precio->precio_estandar ?>','<?= $producto->lista_precio->incluir_impuesto ?>','<?= $producto->articulo_precio->impuesto->tasa ?>');
			}
		<?php } ?>
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
				'<input type="hidden" value="'+precio+'" class="precio">\
				<input type="text" value="'+precio+'" class="importe" disabled="true">', //cantidad * precio
				'<a href="#" class="fa fa-trash del-productPOS"></a>	'
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
				calculaTotal();
			});
		});
		$('select.precio').each(function(){
			$(this).on('change',function(){
				fila = $(this).parents('tr');
				cantidad = fila.find('input.cantidad').val();
				precio = $(this).val();
				importe = cantidad * precio;
				fila.find('input.importe').val(importe.toFixed(2));
				calculaTotal();
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
		$('input.impuesto_total').val(impuesto.toFixed(2));
		$('input.grantotal_total').val(grantotal.toFixed(2));
		$('input.grantotal').val(total.toFixed(2));

	}
</script>
