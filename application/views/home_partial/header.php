<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Autoresponder</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <!-- fancybox -->
    <link rel="stylesheet" href="<?php echo base_url();?>js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">
</head>
  
  <!-- LOADER-->
  <div id="cargando" style="position: absolute;z-index: 100;text-align: center;height:100%;width:100%">
    <img src="<?php echo base_url();?>img/logo.png" style="margin-top: 240px">
    <br><br>
    <p class="cargando">Cargando...</p>
    <br>
    <img src="<?php echo base_url();?>img/loading.gif">
  </div>
  <div id="loading_layer" style="DISPLAY: none">
    <img src="<?php echo base_url();?>img/ajax_loader.gif" alt="">
  </div>
  <!-- **LOADER-->
<STYLE TYPE="text/css">
  /* Eliminar*/
  .invisible{
    visibility:hidden;
  }
  .table-hover > tbody > tr:hover > td .invisible {
    visibility:visible;
  }
</STYLE>