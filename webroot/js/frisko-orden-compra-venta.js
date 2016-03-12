var tadd = '';
$(function () {
	tadd = $('.dataTables-add').DataTable({
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
			{"orderable": false, "width": "8%"},
			{"width": "50%"},
			{"orderable": false },
			null,
			{"orderable": false },
			{"orderable": false, "width": "5%"}
		]
	});
	tadd.on( 'order.dt search.dt', function () {
        tadd.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    }).draw();
});


	function delLineProduct(){
		$('.dataTables-add tbody').on('click', 'a.del-product', function () {
			tadd.row( $(this).parents('tr') ).remove().draw(false);
				tadd.on( 'order.dt', function () {
					tadd.column(0, {order:'applied'}).nodes().each( function (cell, i) {
						cell.innerHTML = i+1;
					});
				}).draw();
			
		});

	}
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
		$('input.importe').each(function(){
			total += parseFloat($(this).val());
		})
		$('input.grantotal').val(total.toFixed(2));

	}