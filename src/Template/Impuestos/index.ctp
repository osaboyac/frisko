<div class="panel panel-primary">
	<div class="panel-heading">
		Impuestos
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
							<th>Descripción</th>
							<th>Tasa</th>
							<th>Opciones</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($impuestos as $impuesto): ?>
						<tr>
							<td><?= $this->Number->format($impuesto->id) ?></td>
							<td><?= h($impuesto->nombre) ?></td>
							<td><?= h($impuesto->descripcion) ?></td>
							<td><?= $this->Number->toPercentage($impuesto->tasa) ?></td>
							<td class="actions">
							<?= $this->Html->link(__(''), ['action' => 'edit', $impuesto->id],array('class'=>'fa fa-edit fa-fw')) ?>
							<?= $this->Form->postLink(__(''),['action' => 'delete', $impuesto->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $impuesto->id),'class'=>'fa fa-times']) ?>
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