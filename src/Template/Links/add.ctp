<div class="panel panel-primary">
	<div class="panel-heading">
		Links
	</div>
	<div class="panel-body">
		<?= $this->Form->create($link) ?>
		<div class="form-group has-success">
			<?php 
				echo $this->Form->input('menu_id',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('parent_id',array('label'=>'Enlace Padre','options'=>$parentLinks,'empty'=>true,'class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('title',array('label'=>'Titulo','class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('link',array('label'=>'Enlace','class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('class',array('label'=>'Clase','class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('description',array('label'=>'Descripción','class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('rel',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('target',array('class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('params',array('label'=>'Parametros','class'=>'form-control','for'=>'inputSuccess'));
				echo $this->Form->input('role_id',array('label'=>'Roles','options'=>$roles,'type'=>'select','multiple' => 'multiple','class'=>'form-control','for'=>'inputSuccess'));
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
		<?= $this->Html->link(__('Cancelar'),['action' => 'index',$menu_id],array('class'=>'btn btn-danger')) ?>
		<?= $this->Form->end() ?>
	</div>
</div>