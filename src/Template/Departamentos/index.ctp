<div class="panel panel-primary">
	<div class="panel-heading">
		Departamentos
	</div>
	<div class="panel-body">
		<p>
			<?= $this->Html->link(__('Nuevo'), ['action' => 'add'],array('class'=>'btn btn-info')) ?>
			<?= $this->Html->link(__('Provincia'), ['controller'=>'provincias','action' => 'index'],array('class'=>'btn btn-default')) ?>
			<?= $this->Html->link(__('Distritos'), ['controller'=>'distritos','action' => 'index'],array('class'=>'btn btn-default')) ?>
		</p>
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
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($departamentos as $departamento): ?>
								<tr>
									<td><?= $this->Number->format($departamento->id) ?></td>
									<td><?= h($departamento->nombre) ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $departamento->id],['class'=>'fa fa-edit btn btn-warning btn-default btn-xs']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $departamento->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $departamento->id),'class'=>'fa fa-times btn btn-danger btn-default btn-xs']) ?>
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