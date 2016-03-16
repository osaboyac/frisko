<div class="panel panel-primary">
	<div class="panel-heading">
		Provincias
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
							<th>Departamento</th>
							<th>Opciones</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($provincias as $provincia): ?>
						<tr>
							<td><?= $this->Number->format($provincia->id) ?></td>
							<td><?= h($provincia->nombre) ?></td>
							<td><?= h($provincia->departamento->nombre) ?></td>
							<td class="actions">
								<?= $this->Html->link(__(''),['action'=>'edit', $provincia->id],['class'=>'fa fa-edit btn btn-warning btn-circle']) ?>
								<?= $this->Form->postLink(__(''),['action' => 'delete', $provincia->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $provincia->id),'class'=>'fa fa-times btn btn-danger btn-circle']) ?>
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
