
      <!-- Main content -->
	  <section class="invoice">
		<?= $this->fetch('content') ?>
		<!-- title row -->
		<div class="row">
		  <div class="col-xs-12">
			<h2 class="page-header">
			  <i class="fa fa-desktop"></i> Frisko Market.
			  <small class="pull-right">Fecha: <?= $ordenCompra->fecha->format('Y-m-d')?></small>
			</h2>
		  </div><!-- /.col -->
		</div>
		<!-- info row -->
		<div class="row invoice-info">
		  <div class="col-sm-4 invoice-col">
			De
			<address>
			  <strong>Frisko Market EIRL</strong><br>
			  Calle Misti 485<br>
			  Punchana - Iquitos<br>
			  Phone: (065) 253313<br>
			  Email: info@friskomarket.com
			</address>
		  </div><!-- /.col -->
		  <div class="col-sm-4 invoice-col">
			A
			<address>
			  <strong><?= $ordenCompra->socio->nombre?></strong><br>
			  Av. Tomas Valle 525<br>
			  San Martin de Porres - Lima<br>
			  Phone: (01) 539-1037<br>
			  Email: info@example.com
			</address>
		  </div><!-- /.col -->
		  <div class="col-sm-4 invoice-col">
			<br>
			<b>Usuario </b><?= $ordenCompra->user->username?><br>
			<b>Orden ID:</b> <?= $ordenCompra->id?><br>
			<b>Fecha:</b> <?= $ordenCompra->fecha->format('Y-m-d')?><br>
			
		  </div><!-- /.col -->
		</div><!-- /.row -->

		<!-- Table row -->
		<div class="row">
		  <div class="col-xs-12 table-responsive">
			<table class="table table-striped">
			  <thead>
				<tr>
					<th>Item</th>
					<th>Articulo</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Importe</th>
				</tr>
			  </thead>
			  <tbody>
				<?php $counter=0; foreach($ordenCompra->orden_compras_detalle as $ocd){ ?>
				<tr>
				 <td><?php echo ($counter + 1);?></td>
				 <td><?= $ocd->articulo->nombre;?></td>
				 <td><?php echo $this->Number->format($ocd->cantidad);?></td>
				 <td><?php echo $this->Number->precision($ocd->precio,2)?></td>
				 <td>
				 <?php $importe =  $this->Number->format($ocd->cantidad) * $this->Number->format($ocd->precio);?>										 
				 <?php echo $this->Number->precision($importe,2);?>
				 </td>
				</tr>
				<?php $counter++;} ?>
			  </tbody>
			</table>
		  </div><!-- /.col -->
		</div><!-- /.row -->

		<div class="row">
		  <!-- accepted payments column -->
		  <div class="col-xs-6">
		  </div><!-- /.col -->
		  <div class="col-xs-6">
			<div class="table-responsive">
			  <table class="table">
				<tr>
				  <th style="width:50%">Subtotal</th>
				  <td><?= $this->Number->precision($ordenCompra->total,2)?></td>
				</tr>
				<tr>
				  <th>Impuesto</th>
				  <td><?= $this->Number->precision($ordenCompra->impuesto,2)?></td>
				</tr>
				<tr>
				  <th>Total S/.</th>
				  <td><?= $this->Number->precision($ordenCompra->grantotal,2)?></td>
				</tr>
			  </table>
			</div>
		  </div><!-- /.col -->
		</div><!-- /.row -->
          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
			  <?= $this->Html->link(__('<i class="fa fa-times"></i> Cerrar'),['action' => 'index'],array('class'=>'btn btn-default','escape'=>false)) ?>
			  <?= $this->Html->link(__('<i class="fa fa-print"></i> Imprimir'),['action' => 'printer',$ordenCompra->id,true],array('class'=>'btn btn-success pull-right','escape'=>false)) ?>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-file-pdf-o"></i> Ver PDF</button>
            </div>
          </div>
	  </section><!-- /.content -->
