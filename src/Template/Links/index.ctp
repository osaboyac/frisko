<div class="panel panel-primary">
	<div class="panel-heading">
		Links
	</div>
	<div class="panel-body">
        <?= $this->Html->link(__('Nuevo Enlance'), ['action' => 'add',$menu_id],array('class'=>'btn btn-info')) ?>
        <?= $this->Html->link(__('Menus'), ['controller'=>'menus','action' => 'index'],array('class'=>'btn btn-warning')) ?>
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
									<th>Estado</th>
									<th>Opciones</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($links as $link):?>
								<tr>
									<td><?= $this->Number->format($link->id) ?></td>
									<td><?= h($link->title) ?></td>
									<td><?php if(h($link->status)){echo 'Activo';} else{ echo 'Inactivo';} ?></td>
									<td class="actions">
									<?= $this->Html->link(__(''), ['action' => 'edit', $link->id],array('class'=>'fa fa-edit fa-fw')) ?>
									<?= $this->Form->postLink(__(''),['action' => 'delete', $link->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $link->id),'class'=>'fa fa-times']) ?>
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