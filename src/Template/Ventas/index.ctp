<div class="panel panel-primary">
	<div class="panel-heading">
		Ventas
	</div>
	<div class="panel-body">
        <?= $this->Html->link(__('Nuevo'), ['action' => 'add'],array('class'=>'btn btn-info')) ?>
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
									<th>Orden Venta</th>
									<th>Opciones</th>
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
									<td>
									<?= $this->Html->link(h($venta->orden_venta_id),['controller'=>'orden-ventas','action'=>'view', $venta->orden_venta_id]) ?>
									</td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $venta->id],['class'=>'fa fa-edit btn btn-warning btn-default btn-xs']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $venta->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $venta->id),'class'=>'fa fa-times btn btn-danger btn-default btn-xs']) ?>
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