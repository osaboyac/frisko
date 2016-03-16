<div class="panel panel-primary">
	<div class="panel-heading">
		Caja Diario
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
									<th>Sucursal</th>
									<th>Libro</th>
									<th>Nombre</th>
									<th>Fecha</th>
									<th>Fecha Cierre</th>
									<th>Estado</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($cajas as $caja): ?>
								<tr>
									<td><?= $this->Number->format($caja->id) ?></td>
									<td><?= h($caja->deposito->nombre) ?></td>
									<td><?= h($caja->libro_caja->nombre) ?></td>
									<td><?= h($caja->nombre) ?></td>
									<td><?= h($caja->fecha->format('Y-m-d')) ?></td>
									<td><?php if($caja->fecha_cierre) { echo $caja->fecha_cierre->format('Y-m-d'); } ?></td>
									<td><?php if($caja->estado==1) {echo 'Activo';} else if($caja->estado==2){ echo 'Procesado';} ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $caja->id],['class'=>'fa fa-edit btn btn-warning btn-circle']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $caja->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $caja->id),'class'=>'fa fa-times btn btn-danger btn-circle']) ?>
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
