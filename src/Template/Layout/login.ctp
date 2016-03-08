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
    <?= $this->Html->css('../template/dist/css/sb-admin-2') ?>
    <?= $this->Html->css('../template/bower_components/font-awesome/css/font-awesome.min') ?>
    <?= $this->Html->css('login') ?>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<?= $this->Html->script('html5shiv') ?>
		<?= $this->Html->script('respond.min') ?>
    <![endif]-->

   <?= $this->Html->script('../template/bower_components/jquery/dist/jquery.min') ?>
   <?= $this->Html->script('../template/bower_components/bootstrap/dist/js/bootstrap.min') ?>   
   <?= $this->Html->script('../template/bower_components/metisMenu/dist/metisMenu.min') ?>
	<?= $this->Html->script('../template/dist/js/sb-admin-2') ?>	
   
</head>
<body>
	<div class="container">
		<?= $this->Flash->render() ?>
		<?= $this->fetch('content') ?>
	</div>
</body>
</html>

