<div class="panel panel-primary">
	<div class="panel-heading">
		Formas de Pago
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
									<th>Vencimiento</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($formaPagos as $formaPago):?>
								<tr>
									<td><?= $this->Number->format($formaPago->id) ?></td>
									<td><?= h($formaPago->nombre) ?></td>
									<td><?= h($formaPago->cantidad) ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $formaPago->id],['class'=>'fa fa-edit btn btn-warning btn-xs']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $formaPago->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $formaPago->id),'class'=>'fa fa-times btn btn-danger btn-xs']) ?>
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
