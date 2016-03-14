$(function () {
	$('select#socio-id').combobox();
	$('select.anyCombo').combobox();
	$('div.date').datetimepicker({
		locale: 'es',
		format: 'YYYY-MM-DD',
		defaultDate: new Date()
	});
	$(".message").fadeIn(300).delay(3000).fadeOut(500);
	
	$('#dataTables-example').DataTable({
        responsive: true,
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
		}
    });
});

function cambiarImporte(){
	$('input.cantidad').each(function(){
		$(this).on('keyup',function(){
			fila = $(this).parents('tr');
			cantidad = $(this).val();
			precio = fila.find('select.precio').val();
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

function calculaTotal(){
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
			impuesto += grantotal - total;
		}
	})
	$('input.impuesto_total').val(impuesto.toFixed(2));
	$('input.grantotal_total').val(grantotal.toFixed(2));
	$('input.grantotal').val(total.toFixed(2));

}