<div class="panel panel-primary">
	<div class="panel-heading">
		Distritos
	</div>
	<div class="box-body">
		<p>
			<?= $this->Html->link(__('Nuevo'), ['action' => 'add'],array('class'=>'btn btn-success')) ?>
			<?= $this->Html->link(__('Provincia'), ['controller'=>'provincias','action' => 'index'],array('class'=>'btn btn-default')) ?>
			<?= $this->Html->link(__('Departamento'), ['controller'=>'departamentos','action' => 'index'],array('class'=>'btn btn-default')) ?>
		</p>
	</div>
	<div class="box-body">
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!-- /.panel-heading -->
					<div class="box-body">
						<div class="dataTable_wrapper">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
								<tr>	
									<th>ID</th>
									<th>Distrito</th>
									<th>Provincia</th>
									<th>Departamento</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($distritos as $distrito): ?>
								<tr>
									<td><?= $this->Number->format($distrito->id) ?></td>
									<td><?= h($distrito->nombre) ?></td>
									<td><?= h($distrito->provincia->nombre) ?></td>
									<td><?= h($distrito->provincia->departamento->nombre) ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $distrito->id],['class'=>'fa fa-edit btn-warning btn-xs']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $distrito->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $distrito->id),'class'=>'fa fa-times btn-danger btn-xs']) ?>
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
