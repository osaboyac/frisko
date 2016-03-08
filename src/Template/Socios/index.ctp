<div class="panel panel-primary">
	<div class="panel-heading">
		Socios de Negocio
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
							<th>Telefono</th>
							<th>Movil</th>
							<th>Email</th>
							<th>Estado</th>
							<th>Opciones</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($socios as $socio): ?>
						<tr>
							<td><?= $this->Number->format($socio->id) ?></td>
							<td><?= h($socio->nombre) ?></td>
							<td><?= h($socio->descripcion) ?></td>
							<td><?= h($socio->telefono) ?></td>
							<td><?= h($socio->movil) ?></td>
							<td><?= h($socio->email) ?></td>
							<td><?php if(h($socio->estado)==1): echo 'Activo'; else: echo 'Inactivo'; endif; ?></td>
							<td class="actions">
								<?= $this->Html->link(__(''),['action'=>'edit', $socio->id],['class'=>'fa fa-edit btn btn-warning btn-circle']) ?>
								<?= $this->Form->postLink(__(''),['action' => 'delete', $socio->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $socio->id),'class'=>'fa fa-times btn btn-danger btn-circle']) ?>
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
