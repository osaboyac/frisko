<div class="panel panel-primary">
	<div class="panel-heading">
		Bancos
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
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($bancos as $banco):?>
								<tr>
									<td><?= $this->Number->format($banco->id) ?></td>
									<td><?= h($banco->nombre) ?></td>
									<td><?= h($banco->descripcion) ?></td>
									<td class="actions">
									<?= $this->Html->link(__(''), ['action' => 'edit', $banco->id],array('class'=>'fa fa-edit fa-fw')) ?>
									<?= $this->Form->postLink(__(''),['action' => 'delete', $banco->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $banco->id),'class'=>'fa fa-times']) ?>
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