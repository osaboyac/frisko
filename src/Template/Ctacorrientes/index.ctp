<div class="panel panel-primary">
	<div class="panel-heading">
		Cuentas Corrientes
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
									<th>Banco</th>
									<th>Sucursal</th>
									<th>Socio Negocio</th>
									<th>Moneda</th>
									<th>Nro Cuenta</th>
									<th>Tipo</th>
									<th>Estado</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($ctacorrientes as $cc):?>
								<tr title="<?= $cc->descripcion ?>">
									<td><?= $this->Number->format($cc->id) ?></td>
									<td><?= h($cc->banco->nombre) ?></td>
									<td><?php if($cc->deposito){ echo $cc->deposito->nombre;} ?></td>
									<td><?php if($cc->socio){ echo $cc->socio->nombre;} ?></td>
									<td><?= h($cc->moneda->nombre) ?></td>
									<td><?= h($cc->nro_cuenta) ?></td>
									<td><?php if($cc->tipo){ echo 'Cta Corriente';} else { echo 'Cta Ahorro';} ?></td>
									<td><?php if($cc->estado){ echo 'Activo';} else { echo 'Inactivo';} ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $cc->id],['class'=>'fa fa-edit btn btn-warning btn-xs']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $cc->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $cc->id),'class'=>'fa fa-times btn btn-danger btn-xs']) ?>
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