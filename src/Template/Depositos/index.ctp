<div class="panel panel-primary">
	<div class="panel-heading">
		Sucursales
	</div>
	<div class="box-body">
        <?= $this->Html->link(__('Nuevo'), ['action' => 'add'],array('class'=>'btn btn-success')) ?>
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
									<th>Nombre</th>
									<th>Dirección</th>
									<th>Teléfono</th>
									<th>Email</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($depositos as $deposito):?>
								<tr>
									<td><?= $this->Number->format($deposito->id) ?></td>
									<td><?= h($deposito->nombre) ?></td>
									<td><?= h($deposito->direccion) ?></td>
									<td><?= h($deposito->telefono) ?></td>
									<td><?= h($deposito->email) ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $deposito->id],['class'=>'fa fa-edit btn btn-warning btn-xs']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $deposito->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $deposito->id),'class'=>'fa fa-times btn btn-danger btn-xs']) ?>
									</td>
								</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<!-- /.table-responsive -->
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
	</div>
</div>
