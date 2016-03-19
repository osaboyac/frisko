<div class="panel panel-primary">
	<div class="panel-heading">
		Recibo de Caja
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
									<th>Caja</th>
									<th>Fecha</th>
									<th>Concepto</th>
									<th>Moneda</th>
									<th>M. Pago</th>
									<th>Entrada</th>
									<th>Salida</th>
									<!--th>Opciones</th-->
								</tr>
								</thead>
								<tbody>
								<?php foreach ($cajasMovimientos as $cm):?>
								<tr>
									<td><?= $this->Number->format($cm->id) ?></td>
									<td><?= h($cm->caja->nombre) ?></td>
									<td><?= $cm->created->format('Y-m-d h:i A') ?></td>
									<td><?= h($cm->concepto) ?></td>
									<td><?= h($cm->moneda->nombre) ?></td>
									<td>
									<?php 
										$metodo_pago = ['0'=>'Efectivo','1'=>'Tarjeta Crédito/Débito','2'=>'Deposito/Transferencia','3'=>'Cheque'];
										echo $metodo_pago[$cm->metodo_pago_id];
									?>
									</td>
									<td><?= $this->Number->precision($cm->entrada,2) ?></td>
									<?php $color = ''; if($cm->salida) {$color = 'color:red';}?>
									<td style="<?= $color?>"><?= $this->Number->precision($cm->salida,2) ?></td>
									<!--td class="actions">
										<?= $this->Html->link(__(''),['action'=>'edit', $cm->id],['class'=>'fa fa-edit btn btn-warning btn-circle']) ?>
										<?= $this->Form->postLink(__(''),['action' => 'delete', $cm->id], ['confirm' => __('Está seguro de eliminar el registro # {0}?', $cm->id),'class'=>'fa fa-times btn btn-danger btn-circle']) ?>
									</td-->
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