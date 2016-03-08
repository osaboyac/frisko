<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<?= $this->Flash->render('auth') ?>
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Por favor regístrese</h3>
				</div>
				<div class="panel-body">
					<?= $this->Form->create() ?>
						<fieldset>
							<div class="form-group">
								<?= $this->Form->input('username',['class'=>'form-control','placeholder'=>'Usuario','type'=>'text','autofocus'=>true]) ?>
							</div>
							<div class="form-group">
								<?= $this->Form->input('password',['class'=>'form-control','placeholder'=>'Contraseña','type'=>'password','value'=>'']) ?>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Recordarme
								</label>
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<?= $this->Form->button(__('Ingresar'),array('class'=>'btn btn-lg btn-success btn-block')) ?>
						</fieldset>
					<?= $this->Form->end() ?>
				</div>
			</div>
		</div>
	</div>
</div>