<div class="panel panel-primary">
	<div class="panel-heading">
		Articulos, Servicios y Tipo de Gasto
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
									<th>Codigo</th>
									<th>Nombre</th>
									<th>U. Medida</th>
									<th>Tipo</th>
									<th>Estado</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($articulos as $articulo):?>
								<?php
									$tipo = 'Articulo';
									if(h($articulo->tipo)==1){
										$tipo = 'Servicio';
									} else if(h($articulo->tipo)==2){
										$tipo = 'Tipo Gasto';
									} else if(h($articulo->tipo)==3){
										$tipo = 'Patrimonio';
									}
								?>
								<tr>
									<td><?= $this->Number->format($articulo->id) ?></td>
									<td><?= h($articulo->codigo) ?></td>
									<td><?= h($articulo->nombre) ?></td>
									<td><?= h($articulo->umedida->simbolo) ?></td>
									<td><?= h($tipo) ?></td>
									<td><?php if(h($articulo->estado)){ echo 'Activo';} else { echo 'Inactivo';} ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $articulo->id],['class'=>'fa fa-edit btn btn-warning btn-circle']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $articulo->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $articulo->id),'class'=>'fa fa-times btn btn-danger btn-circle']) ?>
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