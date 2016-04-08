<div class="panel panel-primary">
	<div class="panel-heading">
		Distritos
	</div>
	<div class="box-body">
		<?= $this->Form->create($distrito) ?>
		<div class="form-group">
			<?php 
				echo $this->Form->input('departamento_id', ['options' => $departamentos,'class'=>'form-control select2','required'=>true]);
				echo $this->Form->input('provincia_id', ['options' => $provincia,'empty'=>true,'class'=>'form-control','required'=>true]);
				echo $this->Form->input('nombre',array('class'=>'form-control','required'=>true));
			?>
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
	$('select#departamento-id').on('change',function(){
		combo = document.getElementById('provincia-id');
		$('select#provincia-id').empty();	
		if($(this).val()){
			<?php foreach($provincias as $rs){ ?>
				if($(this).val() == '<?= $rs->departamento_id;?>'){
					combo.options[combo.length] = new Option("<?= $rs->nombre ?>", "<?= $rs->id; ?>");
				}
			 <?php } ?>
		}
	});
 });
</script>