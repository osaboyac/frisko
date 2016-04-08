<div class="panel panel-primary">
	<div class="panel-heading">
		Configuración de Punto de Venta
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
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Doc. Almacén</th>
									<th>Cliente Pred.</th>
									<th>Caja Pred.</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($posSettings as $ps):?>
								<tr>
									<td><?= $this->Number->format($ps->id) ?></td>
									<td><?= h($ps->deposito->nombre) ?></td>
									<td><?= h($ps->user->username) ?></td>
									<td><?= h($ps->docseries->documento->nombre) ?></td>
									<td><?= h($ps->socio->nombre) ?></td>
									<td><?php if($ps->caja){echo $ps->caja->nombre;} ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $ps->id],['class'=>'fa fa-edit btn btn-warning btn-xs']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $ps->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $ps->id),'class'=>'fa fa-times btn btn-danger btn-xs']) ?>
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