<div class="panel panel-primary">
	<div class="panel-heading">
		Cuentas por Pagar
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
									<th>Serie</th>
									<th>Número</th>
									<th>Total</th>
									<th>Estado</th>
									<th>Agregar</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($compras as $compra):?>
								<tr>
									<td><?= $this->Number->format($compra->id) ?></td>
									<td>
									<?= $this->Html->link(__(h($compra->socio->nombre)),['action'=>'view', $compra->id],['title'=>'Ver Factura']) ?></td>
									<td><?= h($compra->fecha->format('Y-m-d')) ?></td>
									<td><?= h($compra->serie) ?></td>
									<td><?= h($compra->numero) ?></td>
									<td>S/. <?= $this->Number->precision($compra->grantotal,2) ?></td>
									<td><?php if($compra->pagado==0){ echo 'Por pagar'; } ?></td>
									<td class="actions">
										<button type="button" class="btn btn-info btn-circle" onClick="AgregarFactura('<?= $compra->socio->id ?>','<?= $compra->socio->nombre ?>','<?= $compra->id ?>','<?= $compra->serie.'-'.$compra->numero ?>','<?= $compra->grantotal ?>','<?= $compra->fecha->format('Y-m-d') ?>');"><i class="fa fa-check"></i></button>
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
	function AgregarFactura(socio_id, socio_nombre, compra_id, serie_numero, grantotal, fecha){
		$("input[name='socio_id']").val(socio_id);
		$("input.addText").val(socio_nombre);
		$("input#compra-id").val(compra_id);
		$("input#compra-text").val(compra_id+'_'+fecha+'_'+grantotal);
		$("input#concepto").val('Pago de Factura: '+serie_numero);
		$("input#total").val(parseFloat(grantotal).toFixed(2));
		$("select#cargo-id").attr('disabled','true');
	}
</script>