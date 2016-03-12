var taddIG = '';
$(function () {
	taddIG = $('.dataTables-addIG').DataTable({ //Ingreso de articulos y Guia de remision
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
			{"orderable": false, "width": "10%"},
			{"width": "60%"},
			null,
			{"orderable": false, "width": "15%"}
		]
	});
	taddIG.on( 'order.dt search.dt', function () {
        taddIG.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    }).draw();
});

	function delLineProductIG(){
		$('.dataTables-addIG tbody').on('click', 'a.del-product', function () {
			taddIG.row( $(this).parents('tr') ).remove().draw(false);

				taddIG.on( 'order.dt', function () {
					taddIG.column(0, {order:'applied'}).nodes().each( function (cell, i) {
						cell.innerHTML = i+1;
					});
				}).draw();
			
		});

	}