<div class="panel panel-primary">
	<div class="panel-heading">
		Precio de Articulos 
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
									<th>Lista Precio</th>
									<th>Articulo</th>
									<th>Impuesto</th>
									<th>P. Mín</th>
									<th>P. Est</th>
									<th>P. Máx</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($articuloPrecios as $articuloPrecio):?>
								<tr>
									<td><?= $this->Number->format($articuloPrecio->id) ?></td>
									<td><?= h($articuloPrecio->deposito->nombre) ?></td>
									<td><?= h($articuloPrecio->lista_precio->nombre) ?></td>
									<td><?= h($articuloPrecio->articulo->nombre) ?></td>
									<td><?= h($articuloPrecio->impuesto->nombre) ?></td>
									<td><?= $this->Number->precision($articuloPrecio->precio_minimo, 2) ?></td>
									<td><?= $this->Number->precision($articuloPrecio->precio_estandar, 2) ?></td>
									<td><?= $this->Number->precision($articuloPrecio->precio_maximo, 2) ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $articuloPrecio->id],['class'=>'fa fa-edit btn btn-warning btn-default btn-xs']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $articuloPrecio->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $articuloPrecio->id),'class'=>'fa fa-times btn btn-danger btn-default btn-xs']) ?>
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