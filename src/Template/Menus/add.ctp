<div class="panel panel-primary">
	<div class="panel-heading">
		Menus
	</div>
	<div class="panel-body">
		<?= $this->Form->create($menu) ?>
		<div class="form-group has-success">
			<?php 
				echo $this->Form->input('title',array('label'=>'Titulo','class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('alias',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('description',array('label'=>'Descripción','class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('params',array('label'=>'Parametros','class'=>'form-control','for'=>'inputSuccess'));
			?>
			<div class="form-group">
                <div class="radio-inline">
                    <label>
        				<?= $this->Form->input('status',array('type'=>'radio','label'=>false,'legend'=> false,'required'=>true,'class'=>'form-control','for'=>'inputSuccess','options'=>[0 => ' No Publicar', 1 => ' Publicar', 2 => ' Previsualizar'])); ?>
                    </label>
                </div>
            </div>
		</div>
		<?= $this->Form->button(__('Guardar'),array('class'=>'btn btn-primary')) ?>
		<?= $this->Html->link(__('Cancelar'),['action' => 'index'],array('class'=>'btn btn-danger','action'=>'index')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>