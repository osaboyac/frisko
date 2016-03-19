<div class="panel panel-primary">
	<div class="panel-heading">
		Menus
	</div>
	<div class="panel-body">
        <?= $this->Html->link(__('Nuevo'), ['action' => 'add'],array('class'=>'btn btn-success')) ?>
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
									<th>Titulo</th>
									<th>Alias</th>
									<th>No. Enlaces</th>
									<th>Estado</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($menus as $menu):?>
								<tr>
									<td><?= $this->Number->format($menu->id) ?></td>
									<td><?= $this->Html->link(__(h($menu->title)), ['controller'=>'links', $menu->id],array()) ?></td>
									<td><?= h($menu->alias) ?></td>
									<td><?= h($menu->link_count) ?></td>
									<td><?php if(h($menu->status)){echo 'Activo';} else { echo 'Inactivo';} ?></td>
									<td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $menu->id],['class'=>'fa fa-edit btn btn-warning btn-default btn-xs']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $menu->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $menu->id),'class'=>'fa fa-times btn btn-danger btn-default btn-xs']) ?>
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