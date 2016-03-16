<div class="panel panel-primary">
	<div class="panel-heading">
		Libro Caja
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
									<th>Moneda</th>
									<th>Estado</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($libroCajas as $libroCaja): ?>
								<tr>
									<td><?= $this->Number->format($libroCaja->id) ?></td>
									<td><?= h($libroCaja->nombre) ?></td>
									<td><?= h($libroCaja->descripcion) ?></td>
									<td><?= h($libroCaja->moneda->nombre) ?></td>
									<td><?php if($libroCaja->estado==1) {echo 'Activo';} else if($libroCaja->estado==2){ echo 'Procesado';} ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $libroCaja->id],['class'=>'fa fa-edit btn btn-warning btn-circle']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $libroCaja->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $libroCaja->id),'class'=>'fa fa-times btn btn-danger btn-circle']) ?>
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