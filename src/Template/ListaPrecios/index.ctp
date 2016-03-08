<div class="panel panel-primary">
	<div class="panel-heading">
		Listas de Precios
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
							<th>Socio de Negocio</th>
							<th>Moneda</th>
							<th>Tipo de Lista</th>
							<th>Incluir Impuesto</th>
							<th>Estado</th>
							<th>Opciones</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($listaPrecios as $listaPrecio):?>
						<?php
							$socio = '';
							if(h($listaPrecio->socio_id)){
								$socio = h($listaPrecio->socio->nombre);
							}
						?>
						<tr>
							<td><?= $this->Number->format($listaPrecio->id) ?></td>
							<td><?= h($listaPrecio->nombre) ?></td>
							<td><?= h($socio) ?></td>
							<td><?= h($listaPrecio->moneda->nombre) ?></td>
							<td><?php if(h($listaPrecio->tipo_lista)==1){echo 'Venta';} else { echo 'Compra';} ?></td>
							<td><?php if(h($listaPrecio->incluir_impuesto)==1){echo 'Si';} else { echo 'No';} ?></td>
							<td><?php if(h($listaPrecio->estado)==1){echo 'Activo';} else { echo 'Inactivo';} ?></td>
							<td class="actions">
							<?= $this->Html->link(__(''), ['action' => 'edit', $listaPrecio->id],array('class'=>'fa fa-edit fa-fw')) ?>
							<?= $this->Form->postLink(__(''),['action' => 'delete', $listaPrecio->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $listaPrecio->id),'class'=>'fa fa-times']) ?>
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
