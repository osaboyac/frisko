<div class="panel panel-primary">
	<div class="panel-heading">
		Guías de Remisión
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
							<th>Socio Negocio</th>
							<th>Fecha</th>
							<th>Documento</th>
							<th>Serie</th>
							<th>Número</th>
							<th>Opciones</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($guias as $guia):?>
						<tr>
							<td><?= $this->Number->format($guia->id) ?></td>
							<td><?= h($guia->socio->nombre) ?></td>
							<td><?= h($guia->fecha->format('Y-m-d')) ?></td>
							<td><?= h($guia->documento->nombre) ?></td>
							<td><?= h($guia->serie) ?></td>
							<td><?= h($guia->numero) ?></td>
							<td class="actions">
								<?= $this->Html->link(__(''),['action'=>'edit', $guia->id],['class'=>'fa fa-edit btn btn-warning btn-xs']) ?>
								<?= $this->Form->postLink(__(''),['action' => 'delete', $guia->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $guia->id),'class'=>'fa fa-times btn btn-danger btn-xs']) ?>
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