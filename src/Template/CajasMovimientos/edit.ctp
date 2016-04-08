<div class="panel panel-primary">
	<div class="panel-heading">
		Recibo de Caja
	</div>
	<div class="panel-body">
		<?= $this->Form->create($cajasMovimiento) ?>
		<div class="form-group has-success">
			<div class="row">
				<div class="col-lg-6">
					<div style="display:none">
					<?php echo $this->Form->input('user_id', ['options' => $users,'class'=>'form-control','readonly'=>true]); ?>
					</div>
					<?php echo $this->Form->input('caja_id', ['options' => $cajas,'class'=>'form-control','readonly'=>true]); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('id', ['label'=>'Nro. Recibo','readonly'=>true,'type' => 'text','class'=>'form-control']); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('tipo_movimiento', ['label'=>'Tipo Documento','options' => [0=>'Cobrar',1=>'Pagar'],'class'=>'form-control tipo_documento_pago','for'=>'inputSuccess']); ?>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('socio_id',array('label'=>'Socio de Negocio','options'=>$socios,'empty'=>true,'class'=>'form-control addText','for'=>'inputSuccess')); ?>
				</div>	
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php $style_venta='display:none'; $style_compra='display:none'; if($cajasMovimiento->tipo_movimiento){ $style_compra='display:block';} else{$style_venta='display:block';} ?>
					<div style="<?= $style_compra ?>" class="factura_pagar">
						<label>Factura</label>
						<div class="form-group input-group">
							<?php echo $this->Form->input('compra_id',array('type'=>'hidden','class'=>'form-control','for'=>'inputSuccess')); ?>
							<?php echo $this->Form->input('compra_text',array('div'=>false,'label'=>false,'type'=>'text','class'=>'form-control','for'=>'inputSuccess')); ?>
							<span class="input-group-btn">
								<?= $this->Html->link(__('<i class="fa fa-search"></i>'),['controller'=>'compras','action' => 'ctapagar'],['escape'=>false,'class'=>'btn btn-success','data-toggle'=>'modal','data-target'=>'#porPagar']) ?>
							</span>
						</div>
						<div class="modal fade" id="porPagar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
									<div class="modal-content"></div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									</div>
							</div>
							<!-- /.modal-dialog -->
						</div>
					</div>
					<div style="<?= $style_venta ?>" class="factura_cobrar">
						<label>Factura</label>
						<div class="form-group input-group">
							<?php echo $this->Form->input('venta_id',array('type'=>'hidden','class'=>'form-control','for'=>'inputSuccess')); ?>
							<?php echo $this->Form->input('venta_text',array('div'=>false,'label'=>false,'type'=>'text','class'=>'form-control','for'=>'inputSuccess')); ?>
							<span class="input-group-btn">
								<?= $this->Html->link(__('<i class="fa fa-search"></i>'),['controller'=>'ventas','action' => 'ctacobrar'],['escape'=>false,'class'=>'btn btn-success','data-toggle'=>'modal','data-target'=>'#porCobrar']) ?>
							</span>
						</div>
						<div class="modal fade" id="porCobrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
									<div class="modal-content"></div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									</div>
							</div>
							<!-- /.modal-dialog -->
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('cargo_id',array('options'=>$cargos,'empty'=>true,'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<?php echo $this->Form->input('concepto',array('type'=>'text','class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<?php echo $this->Form->input('metodo_pago_id',array('options'=>['0'=>'Efectivo','1'=>'Tarjeta Crédito/Débito','2'=>'Deposito','3'=>'Cheque'],'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-4">
					<?php echo $this->Form->input('moneda_id',array('options'=>$monedas,'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
				<div class="col-lg-4">
					<?php 
					$total = $this->Number->precision($cajasMovimiento->entrada,2);
					if($cajasMovimiento->salida){
						$total = $this->Number->precision($cajasMovimiento->salida,2);						
					}
					?>
					<?php echo $this->Form->input('total',array('type'=>'text','value'=>$total,'class'=>'form-control','for'=>'inputSuccess')); ?>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-default','action'=>'index')) ?>
			<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-success')) ?>
		</div>
		<?= $this->Form->end() ?>
	</div>
</div>
<script>
$('document').ready(function(){
	$('select.tipo_documento_pago').on('change',function(){
		if($(this).val()==1){
			$('div.factura_pagar').css('display','block');
			$('div.factura_cobrar').css('display','none');
		} else{
			$('div.factura_cobrar').css('display','block');
			$('div.factura_pagar').css('display','none');
		}
		$("input.addText").attr('readonly',false);
		$("select#cargo-id").attr('disabled',false);
		$('input#venta-text').attr('readonly',false);
		$('input#compra-text').attr('readonly',false);
		$("input.addText").val('');
		$('input#venta_id').val('');
		$('input#venta-text').val('');
		$('input#compra_id').val('');
		$('input#compra-text').val('');
	});
	$('select#cargo-id').on('change',function(){
		if($(this).val()!=''){
			$('input#venta-text').attr('readonly','true');
			$('input#compra-text').attr('readonly','true');
			$('input.addText').attr('readonly','true');
			$('input#concepto').val($(this).text()+' <?= date('d-m-Y') ?>');
		} else{
			$('input#venta-text').attr('readonly',false);
			$('input#compra-text').attr('readonly',false);			
			$("input.addText").attr('readonly',false);
			$("input.addText").val('');
			$('input#venta_id').val('');
			$('input#venta-text').val('');
			$('input#compra_id').val('');
			$('input#compra-text').val('');
			$('input#concepto').val('');
		}
	});
});
</script>