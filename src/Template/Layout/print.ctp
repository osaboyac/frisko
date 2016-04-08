<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $this->fetch('title') ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <?= $this->Html->css('../template/bower_components/bootstrap/dist/css/bootstrap.min') ?>
    <!-- Font Awesome -->
    <?= $this->Html->css('../template/bower_components/font-awesome/css/font-awesome.min') ?>
    <!-- Theme style -->
    <?= $this->Html->css('../dist/css/AdminLTE.min') ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<?= $this->Html->script('html5shiv') ?>
		<?= $this->Html->script('respond.min') ?>
    <![endif]-->
  </head>
  <body onload="window.print();">
    <div class="wrapper">
		<?= $this->fetch('content') ?>
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
   <?= $this->Html->script('../dist/js/app.min') ?>
  </body>
</html>
