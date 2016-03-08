<div class="panel panel-primary">
	<div class="panel-heading">
		Distritos
	</div>
	<div class="panel-body">
		<?= $this->Form->create($distrito) ?>
		<div class="form-group has-success">
			<?php 
				echo $this->Form->input('departamento_id', ['options' => $departamentos,'empty'=>true,'class'=>'form-control','required'=>true]);
				echo $this->Form->input('provincia_id', ['options' => '','class'=>'form-control','required'=>true]);
				echo $this->Form->input('nombre',array('class'=>'form-control','for'=>'inputSuccess','required'=>true));
			?>
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
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