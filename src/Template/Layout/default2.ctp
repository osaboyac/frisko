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
	<!-- Bootstrap core CSS -->
    <?= $this->Html->css('../bootstrap/css/bootstrap.min') ?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?= $this->Html->css('../bootstrap/css/ie10-viewport-bug-workaround') ?>

    <!-- Custom styles for this template -->
    <?= $this->Html->css('dashboard') ?>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
		<?= $this->Html->script('ie8-responsive-file-warning') ?>
	<![endif]-->
		<?= $this->Html->script('ie-emulation-modes-warning') ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<?= $this->Html->script('html5shiv') ?>
		<?= $this->Html->script('respond.min') ?>
    <![endif]-->
</head>
<body>
	<!--nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0"-->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">FRISKO market</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Configuración</a></li>
            <li><a href="#">Perfil</a></li>
            <li><a href="#">Ayuda</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Buscar...">
          </form>
        </div>
      </div>
    </nav>
	<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
		<!-- CONTENIDO -->
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
						<?= $this->fetch('content') ?>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<?= $this->Html->script('jquery.min') ?>
    <?= $this->Html->css('../bootstrap/js/bootstrap.min') ?>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<?= $this->Html->script('holder.min') ?>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<?= $this->Html->script('ie10-viewport-bug-workaround') ?>
</body>
</html>

