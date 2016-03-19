<div class="panel panel-primary">
	<div class="panel-heading">
		Monedas
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
									<th>Nombre</th>
									<th>Simbolo</th>
									<th>ISO</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($monedas as $moneda):?>
								<tr>
									<td><?= $this->Number->format($moneda->id) ?></td>
									<td><?= h($moneda->nombre) ?></td>
									<td><?= h($moneda->simbolo) ?></td>
									<td><?= h($moneda->iso) ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $moneda->id],['class'=>'fa fa-edit btn btn-warning btn-default btn-xs']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $moneda->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $moneda->id),'class'=>'fa fa-times btn btn-danger btn-default btn-xs']) ?>
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