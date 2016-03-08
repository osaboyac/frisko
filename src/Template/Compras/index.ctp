<div class="panel panel-primary">
	<div class="panel-heading">
		Compras
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
							<th>Serie</th>
							<th>Número</th>
							<th>Estado</th>
							<th>Opciones</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($compras as $compra):?>
						<tr>
							<td><?= $this->Number->format($compra->id) ?></td>
							<td><?= h($compra->socio->nombre) ?></td>
							<td><?= h($compra->fecha->format('Y-m-d')) ?></td>
							<td><?= h($compra->serie) ?></td>
							<td><?= h($compra->numero) ?></td>
							<td><?php if(h($compra->estado)): echo 'Procesado'; else: echo'Grabado'; endif; ?></td>
							<td class="actions">
								<?= $this->Html->link(__(''),['action'=>'edit', $compra->id],['class'=>'fa fa-edit btn btn-warning btn-circle']) ?>
								<?= $this->Form->postLink(__(''),['action' => 'delete', $compra->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $compra->id),'class'=>'fa fa-times btn btn-danger btn-circle']) ?>														
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
