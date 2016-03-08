<div class="panel panel-primary">
	<div class="panel-heading">
		Orden de Venta
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
							<th>Almacen</th>
							<th>Socio Negocio</th>
							<th>Tipo</th>
							<th>Usuario</th>
							<th>Fecha</th>
							<th>Estado</th>
							<th>Opciones</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($ordenVentas as $ordenVenta):?>
						<tr>
							<td><?= $this->Number->format($ordenVenta->id) ?></td>
							<td><?= h($ordenVenta->deposito->nombre) ?></td>
							<td><?= h($ordenVenta->socio->nombre) ?></td>
							<td><?php if(h($ordenVenta->estado)==1){ echo 'Orden de Venta';} else { echo 'Proforma';} ?></td>
							<td><?= h($ordenVenta->user->username) ?></td>
							<td><?= h($ordenVenta->fecha->format('Y-m-d')) ?></td>
							<td><?php if(h($ordenVenta->estado)==1) { echo 'Orden Estándar';} else if(h($ordenVenta->estado)==2){echo 'Orden POS';} else { echo 'Proforma';} ?></td>
							<td class="actions">
							<?= $this->Html->link(__(''),['action'=>'edit', $ordenVenta->id],['class'=>'fa fa-edit btn btn-warning btn-circle']) ?>
							<?= $this->Form->postLink(__(''),['action' => 'delete', $ordenVenta->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $ordenVenta->id),'class'=>'fa fa-times btn btn-danger btn-circle']) ?>
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