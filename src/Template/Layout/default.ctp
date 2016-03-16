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
    <?= $this->Html->css('../template/dist/css/sb-admin-2') ?>
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
   <?= $this->Html->script('../template/bower_components/raphael/raphael-min') ?>
   <?= $this->Html->script('../template/bower_components/datetimepicker/moment-with-locales') ?>
   <?= $this->Html->script('../template/bower_components/datetimepicker/bootstrap-datetimepicker') ?>
   <?= $this->Html->script('../template/bower_components/combobox/bootstrap-combobox') ?>
   <?= $this->Html->script('frisko') ?>
   <?= $this->Html->script('frisko-ingreso-guia') ?>
   <?= $this->Html->script('frisko-orden-compra-venta') ?>
</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">FRISKO market</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
						<?= $this->Html->link(__('<i class="fa fa-sign-out fa-fw"></i> Salir'),['controller'=>'users','action' => 'logout'],array('escape'=>false)) ?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <?= $this->Html->link(__('<i class="fa fa-home fa-fw"></i> inicio'), ['controller'=>'pages','action' => 'index'],['escape' => false]) ?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('<i class="fa fa-group fa-fw"></i> Socios'), ['controller'=>'socios','action' => 'index'],['escape' => false]) ?>
                        </li>
                        <li>
                            <a href="javascript:;"><i class="fa fa-gift fa-fw"></i> Compras<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?= $this->Html->link(__('Orden de Compra'), ['controller'=>'orden-compras','action' => 'index']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(__('Facturas de Compra'), ['controller'=>'compras','action' => 'index']) ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="javascript:;"><i class="fa fa-shopping-cart fa-fw"></i> Ventas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?= $this->Html->link(__('Orden de Ventas'), ['controller'=>'orden-ventas','action' => 'index']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(__('Facturas de venta'), ['controller'=>'ventas','action' => 'index']) ?>
                                </li>
                            </ul>
						</li>
                        <li>
                            <a href="javascript:;"><i class="fa fa-truck fa-fw"></i> Logística<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li><a href="javascript:;"><i class="fa fa-database fa-fw"></i> Almacén<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
                                        <li>
                                            <?= $this->Html->link(__('Depositos'), ['controller'=>'depositos','action' => 'index']) ?>
                                        </li>
										<li>
											<?= $this->Html->link(__('Ingresar Articulos'), ['controller'=>'ingresos','action' => 'index']) ?>
										</li>
										<li>
											<?= $this->Html->link(__('Guías de Remisión'), ['controller'=>'guias','action' => 'index']) ?>
										</li>
									</ul>
								</li>
								<li><a href="javascript:;"><i class="fa fa-dropbox fa-fw"></i> Productos<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li>
											<?= $this->Html->link(__('Articulos'), ['controller'=>'articulos','action' => 'index']) ?>
										</li>
										<li>
											<?= $this->Html->link(__('Familias'), ['controller'=>'artfamilias','action' => 'index']) ?>
										</li>
										<li>
											<?= $this->Html->link(__('Marcas'), ['controller'=>'artmarcas','action' => 'index']) ?>
										</li>
										<li>
											<?= $this->Html->link(__('Unidades de Medida'), ['controller'=>'umedidas','action' => 'index']) ?>
										</li>
										<li>
											<?= $this->Html->link(__('Información de Stock'), ['controller'=>'articulos-info','action' => 'index']) ?>
										</li>
									</ul>
								</li>
								<li><a href="javascript:;"><i class="fa fa-list-alt fa-fw"></i> Precios<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li>
											<?= $this->Html->link(__('Lista de Precios'), ['controller'=>'lista-precios','action' => 'index']) ?>
										</li>
										<li>
											<?= $this->Html->link(__('Precio de Articulos'), ['controller'=>'articulo-precios','action' => 'index']) ?>
										</li>
									</ul>
								</li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="javascript:;"><i class="fa fa-money fa-fw"></i> Finanzas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
								<a href="javascript:;"><i class="fa fa-briefcase fa-fw"></i> Caja<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
                                        <li>
                                            <?= $this->Html->link(__('Libro de Caja'), ['controller'=>'libro-cajas','action' => 'index']) ?>
                                        </li>
                                        <li>
                                            <?= $this->Html->link(__('Caja Menor'), ['controller'=>'cajas','action' => 'index']) ?>
                                        </li>
                                        <li>
                                            <?= $this->Html->link(__('Cargos'), ['controller'=>'cargos','action' => 'index']) ?>
                                        </li>
                                        <li>
                                            <?= $this->Html->link(__('Recibos de Caja'), ['controller'=>'cajas-movimientos','action' => 'add']) ?>
                                        </li>
                                        <li>
                                            <?= $this->Html->link(__('Cuentas por Cobrar'), ['controller'=>'ventas','action' => 'ctacobrar']) ?>
                                        </li>
                                        <li>
                                            <?= $this->Html->link(__('Cuentas por Pagar'), ['controller'=>'compras','action' => 'ctapagar']) ?>
                                        </li>
									</ul>
								</li>
                                <li>
                                    <?= $this->Html->link(__('Bancos'), ['controller'=>'bancos','action' => 'index']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(__('Monedas'), ['controller'=>'bancos','action' => 'index']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(__('Impuestos'), ['controller'=>'bancos','action' => 'index']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(__('Documentos'), ['controller'=>'documentos','action' => 'index']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(__('Serie de Documentos'), ['controller'=>'docseries','action' => 'index']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(__('Formas de Pago'), ['controller'=>'forma-pagos','action' => 'index']) ?>
                                </li>
                            </ul>
						</li>
                        <li>
                            <a href="javascript:;"><i class="fa fa-gear fa-fw"></i> Configuración<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li><a href="javascript:;"><i class="fa fa-list-alt fa-fw"></i> Localidades<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
                                        <li>
                                            <?= $this->Html->link(__('Departamentos'), ['controller'=>'departamentos','action' => 'index']) ?>
                                        </li>
                                        <li>
                                            <?= $this->Html->link(__('Provincias'), ['controller'=>'provincias','action' => 'index']) ?>
                                        </li>
                                        <li>
                                            <?= $this->Html->link(__('Distritos'), ['controller'=>'distritos','action' => 'index']) ?>
                                        </li>
									</ul>
								</li>
                                <li>
                                    <?= $this->Html->link(__('Menus'), ['controller'=>'menus','action' => 'index']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(__('Roles'), ['controller'=>'roles','action' => 'index']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(__('Usuarios'), ['controller'=>'users','action' => 'index']) ?>
                                </li>
                            </ul>
						</li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
				<?= $this->Flash->render() ?>
                <div class="row">
                    <div class="col-lg-12">
						<div class="panel-body"></div>
						<?= $this->fetch('content') ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->  
   <?= $this->Html->script('../template/bower_components/datatables/media/js/jquery.dataTables') ?>
   <?= $this->Html->script('../template/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min') ?>
	<?= $this->Html->script('../template/dist/js/sb-admin-2') ?>	
</body>
</html>

