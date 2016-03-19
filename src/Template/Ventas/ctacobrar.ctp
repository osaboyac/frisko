<div class="panel panel-primary">
	<div class="panel-heading">
		Cuentas por Cobrar
	</div>
	<div class="panel-body">
<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="dataTable_wrapper">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
								<tr>
									<th>ID</th>
									<th>Socio Negocio</th>
									<th>Fecha</th>
									<th>Documento</th>
									<th>Serie</th>
									<th>Numero</th>
									<th>Total</th>
									<th>Saldo</th>
									<th>Estado</th>
									<th>Agregar</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($ventas as $venta):?>
								<tr>
									<td><?= h($venta->id) ?></td>
									<td><?= h($venta->socio->nombre) ?></td>
									<td><?= h($venta->fecha->format('Y-m-d')) ?></td>
									<td><?= h($venta->documento->nombre) ?></td>
									<td><?= h($venta->serie) ?></td>
									<td><?= h($venta->numero) ?></td>
									<td>S/. <?= $this->Number->precision($venta->grantotal,2) ?></td>
									<td>S/. <?= $this->Number->precision($venta->saldo,2) ?></td>
									<td><?php if($venta->cobrado==0){ echo 'Por cobrar'; } ?></td>
									<td class="actions">
										<button type="button" class="btn btn-success btn-default btn-xs" onClick="AgregarFactura('<?= $venta->socio->id ?>','<?= $venta->socio->nombre ?>','<?= $venta->id ?>','<?= $venta->serie.'-'.$venta->numero ?>','<?= $venta->grantotal ?>','<?= $venta->saldo ?>','<?= $venta->fecha->format('Y-m-d') ?>');"><i class="fa fa-check"></i></button>
									</td>
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
<script>
	function AgregarFactura(socio_id, socio_nombre, venta_id, serie_numero, grantotal, saldo, fecha){
		$("input[name='socio_id']").val(socio_id);
		$("input.addText").val(socio_nombre);
		$("input#venta-id").val(venta_id);
		$("input#venta-text").val(venta_id+'_'+fecha+'_'+grantotal);
		$("input#concepto").val('Cobro de Factura: '+serie_numero);
		if(saldo>0){
			$("input#total").val(parseFloat(saldo).toFixed(2));			
		} else{
			$("input#total").val(parseFloat(grantotal).toFixed(2));			
		}
		$("select#cargo-id").attr('disabled','true');
	}
</script>