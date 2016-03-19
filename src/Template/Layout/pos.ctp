<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?= $this->fetch('title') ?>
	</title>
	
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
	
    <?= $this->Html->css('../template/bower_components/bootstrap/dist/css/bootstrap.min') ?>
    <?= $this->Html->css('../template/bower_components/metisMenu/dist/metisMenu.min') ?>
    <?= $this->Html->css('../template/dist/css/timeline') ?>
    <?= $this->Html->css('../template/bower_components/morrisjs/morris') ?>
    <?= $this->Html->css('../template/bower_components/font-awesome/css/font-awesome.min') ?>
    <?= $this->Html->css('../template/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap') ?>
    <?= $this->Html->css('../template/dist/css/pos') ?>
    <?= $this->Html->css('../template/bower_components/datetimepicker/bootstrap-datetimepicker') ?>
    <?= $this->Html->css('../template/bower_components/combobox	/bootstrap-combobox') ?>
    <?= $this->Html->css('frisko') ?>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<?= $this->Html->script('html5shiv') ?>
		<?= $this->Html->script('respond.min') ?>
    <![endif]-->
   <?= $this->Html->script('../template/bower_components/jquery/dist/jquery.min') ?>
   <?= $this->Html->script('../template/bower_components/bootstrap/dist/js/bootstrap') ?>
   <?= $this->Html->script('../template/bower_components/metisMenu/dist/metisMenu.min') ?>
   <?= $this->Html->script('../template/bower_components/datetimepicker/moment-with-locales') ?>
   <?= $this->Html->script('../template/bower_components/datetimepicker/bootstrap-datetimepicker') ?>
   <?= $this->Html->script('../template/bower_components/combobox/bootstrap-combobox') ?>
   <?= $this->Html->script('frisko') ?>
</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
				<?= $this->Html->link(__('FRISKO market'),['controller'=>'pages','action' => 'display','home'],array('class'=>'navbar-brand')) ?>
            </div>
            <!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li>
						<?= $this->Html->link(__('<i class="fa fa-sign-out fa-fw"></i> Salir'),['controller'=>'users','action' => 'logout'],array('escape'=>false)) ?>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
            <!-- /.navbar-top-links -->
        </nav>
        <div class="page-wrapper">
				<?= $this->Flash->render() ?>
				<?= $this->fetch('content') ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->  
   <?= $this->Html->script('../template/bower_components/datatables/media/js/jquery.dataTables') ?>
   <?= $this->Html->script('../template/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min') ?>
	<?= $this->Html->script('../template/dist/js/sb-admin-2') ?>	
</body>
</html>