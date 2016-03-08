$(function () {
	$('select#socio-id').combobox();
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
