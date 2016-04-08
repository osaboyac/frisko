<div class="panel panel-primary">
	<div class="panel-heading">
		Cargos
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
									<th>Socio Negocio</th>
									<th>Costo</th>
									<th>Impuesto</th>
									<th>Inc. Impuesto</th>
									<th>Estado</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($cargos as $cargo): ?>
								<tr>
									<td><?= $this->Number->format($cargo->id) ?></td>
									<td><?= h($cargo->nombre) ?></td>
									<td><?php if($cargo->socio){ echo $cargo->socio->nombre;} ?></td>
									<td><?= $this->Number->precision($cargo->total,2) ?></td>
									<td><?php if($cargo->impuesto){ echo $cargo->impuesto->nombre;} ?></td>
									<td><?php if($cargo->incluir_impuesto==1) {echo 'No';} else if($cargo->incluir_impuesto==2){echo 'Si';}else{ echo '';} ?></td>
									<td><?php if($cargo->estado==1) {echo 'Activo';} else{ echo 'Inactivo';} ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $cargo->id],['class'=>'fa fa-edit btn btn-warning btn-xs']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $cargo->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $cargo->id),'class'=>'fa fa-times btn btn-danger btn-xs']) ?>
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