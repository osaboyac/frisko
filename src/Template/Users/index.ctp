<div class="panel panel-primary">
	<div class="panel-heading">
		Usuarios
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
							<th>Miembro de</th>
							<th>Usuario</th>
							<th>Empleado</th>
							<th>Estado</th>
							<th>Opciones</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($users as $user): ?>
						<tr>
							<td><?= $this->Number->format($user->id) ?></td>
							<td><?= h($user->role->nombre) ?></td>
							<td><?= h($user->username) ?></td>
							<td><?= h($user->socio->nombre) ?></td>
							<td><?php if(h($user->estado)==1){ echo 'Activo';} else { echo 'Inactivo';} ?></td>
							<td class="actions">
								<?= $this->Html->link(__(''),['action'=>'edit', $user->id],['class'=>'fa fa-edit btn btn-warning btn-circle']) ?>
								<?= $this->Form->postLink(__(''),['action' => 'delete', $user->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $user->id),'class'=>'fa fa-times btn btn-danger btn-circle']) ?>
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