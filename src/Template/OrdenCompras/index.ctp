<div class="panel panel-primary">
	<div class="panel-heading">
		Orden de Compra
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
							<th>Socio de Negocio</th>
							<th>Fecha</th>
							<th>Estado</th>
							<th>Factura</th>
							<th>Opciones</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($ordenCompras as $ordenCompra): ?>
						<tr>
							<td><?= $this->Number->format($ordenCompra->id) ?></td>
							<td><?= h($ordenCompra->socio->nombre) ?></td>
							<td><?= h($ordenCompra->fecha->format('Y-m-d')) ?></td>
							<td><?php if(h($ordenCompra->estado)==1){ echo 'Procesado'; } else if(h($ordenCompra->estado)==2) { echo 'Facturado'; } else if(h($ordenCompra->estado)==3){ echo 'Anulado';} else { echo 'Grabado'; }; ?></td>
							<td><?php if($ordenCompra->compra_id){ echo h($ordenCompra->compra->serie).'-'.h($ordenCompra->compra->numero);} else { echo '';} ?></td>
							<td class="actions">
								<?= $this->Html->link(__(''),['action'=>'edit', $ordenCompra->id],['class'=>'fa fa-edit btn btn-warning btn-circle']) ?>
								<?= $this->Form->postLink(__(''),['action' => 'delete', $ordenCompra->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $ordenCompra->id),'class'=>'fa fa-times btn btn-danger btn-circle']) ?>
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