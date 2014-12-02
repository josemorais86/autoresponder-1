<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Mailing Pehuén</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <!-- fancybox -->
    <link rel="stylesheet" href="<?php echo base_url();?>js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<STYLE TYPE="text/css">
/* Eliminar*/
.invisible{
  visibility:hidden;
}
.table-hover > tbody > tr:hover > td .invisible {
  visibility:visible;
}
</STYLE>
  <body>

    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Mailing Pehuén </a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-envelope"></span>&nbsp;69</a></li>
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Bienvenido <?php echo $username; ?><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><span class="glyphicon glyphicon-cog"></span> My Profile</a></li>
                  <li class="divider"></li>
                  <li><a href="home/logout"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                </ul>
              </li>
            
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2><?php echo $nombre_lista; ?> > Mis Formularios</h2>
        
        <table class="table table-bordered table-striped table-hover">
      <tr>
          <th><a id="titulo" href="#">N°</a></th>
          <th><a id="titulo" href="#">Asunto</a></th>
          <th><CENTER><a id="titulo" href="#">Acciones</a></CENTER></th>
      </tr>
      <tbody id="contenido"></tbody>
  
      <tr>
        <td colspan="3">Número de Registros: <?php echo $sum_forms; ?></td>
      </tr>
 
      <tr>
        <td colspan="3">
          
        <a class="btn btn-primary btn-small" href="<?php echo base_url()."index.php/forms/new_form_view/$id_lista";?>" style="color: rgb(255,255,255)">
        <span class="glyphicon glyphicon-plus"></span>Nuevo Formulario
        </a>
        <a href="<?php echo base_url()."index.php/home";?>" id="volver" class="btn">
            <span class="glyphicon glyphicon-home"></span> Volver a mis Listas
          </a>
        </td>
      </tr>
  </table>
      </div> <!-- /jumbotron -->

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
    
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    
    <!-- fancybox -->
    <script type="text/javascript" src="<?php echo base_url();?>js/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      
      $("#contenido").load("<?php echo base_url()."index.php/forms/data/$id_lista"; ?>");
      
      $(".show_code").fancybox({
        fitToView : false,
        width   : '80%',
        height    : '70%',
        autoSize  : false,
        closeClick  : false,
        openEffect  : 'none',
        closeEffect : 'none'
      });

      $(".eliminar").fancybox({
         maxHeight : 210,
         padding: 1
      });
  });
</script>
  </body>
</html>
