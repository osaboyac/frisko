<div class="panel panel-primary">
	<div class="panel-heading">
		Serie de Documentos
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
									<th>Documento</th>
									<th>Sucursal</th>
									<th>Serie</th>
									<th>Número</th>
									<th>Tipo</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($docseries as $docseries):?>
								<?php
									$tipo = 'Venta';
									if(h($docseries->tipo)==1){
										$tipo = 'Caja';
									} else if(h($docseries->tipo)==2){
										$tipo = 'Almacen';
									} else if(h($docseries->tipo)==3){
										$tipo = 'Manufactura';
									}
								?>
								<tr>
									<td><?= $this->Number->format($docseries->id) ?></td>
									<td><?= h($docseries->documento->nombre) ?></td>
									<td><?= h($docseries->deposito->nombre) ?></td>
									<td><?= h($docseries->serie) ?></td>
									<td><?= h($docseries->numero) ?></td>
									<td><?= h($tipo) ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $docseries->id],['class'=>'fa fa-edit btn btn-warning btn-default btn-xs']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $docseries->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $docseries->id),'class'=>'fa fa-times btn btn-danger btn-default btn-xs']) ?>
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