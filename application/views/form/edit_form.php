<?php
  
   $campos_array = array();
   
   foreach ($campos as $campo) 
   {
      $campos_array[] = "<li id='".$campo->id_campo."' class='ui-state-highlight ui-sort'><p class='p-label'>".$campo->nombre.":</p><input type='text' class='input-r' readonly='readonly'</li>";
   }  
       
    unset($campos_array[0]);//-->Sacamos nombre
    unset($campos_array[1]);//-->Sacamos Email  
  
?>
<!doctype html>
 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Autoresponder</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>css/form/form.css" />
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
<!--
  <script type="text/javascript" src="../../../js/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  
  <link rel="stylesheet" href="../../../css/validation.css" />
-->  
  <style>
#exito {
padding:5px; /*Espaciado interno*/
width:180px; /*Ancho del contenedor*/
text-align:center; /*Alineación del texto*/
background-color:#FFEE88; /*Color de fondo*/
position:fixed; /*Permite que se mantenga estático*/
display:none; /*Oculta el contenedor*/
left:200px; /*Separación del borde izquierdo*/
bottom:80px; /*Separación inferior del borde*/
box-shadow:0 0 5px #555; /*Sombras CSS3*/
}
  </style>
<!-- Validar Campos -->

</head>
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
<!--<div class="jumbotron">-->
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Crear Formulario</h3>
 
  </div>
  <div class="panel-body">
    <p> Si quieres añadir campos a tu formulario debes arrastrar los elementos de la caja <strong>"campos"</strong>a la caja <strong>"formulario"</strong>.</p>
              <div class="contenedor" style="height: 400px;">
          <div id="sortables" style="float:left">
          <div class="formulario well" >
            <div>
              <span style="font-size: 22px; color: #2B99D3;font-family: Arial,Helvetica,sans-serif" <strong><div id="titulo_form"><?php echo $campos_form[0]->titulo;?></div></strong></span> </div>
                <ul id="sortable1" class="sortable1">
       
                 <?php           
                  foreach ($campos_formulario as $fila)
                  {
                    if($fila->id_campo == 2)
                      echo "<li id='".$fila->id_campo."' class='ui-state-default ui-state-disabled' style='width: 173px; border: none; background: none; cursor: move;'>
                    <p class='label-r'>".$fila->nombre.":</p>
                    <input type='text' class='input-r'>
                    </li>";

                    else
                      echo "<li id='".$fila->id_campo."' class='ui-state-default' style='width: 173px; border: none; background: none; cursor: move;'>
                    <p class='label-r'>".$fila->nombre.":</p>
                    <input type='text' class='input-r'>
                    </li>";
                            
                    $lista[] = $fila->id_campo;//{1,2,..}
                  }
                ?>

                </ul>  
          <button disabled class="btn btn-primary"  name="Button_Update" data-fancybox-type='iframe' style="color: rgb(255,255,255);padding: 6px 13px; opacity:1;"><span style="font-size:20px"><div id="boton_form"><?php echo $campos_form[0]->boton;?></div></span></button>    
        </div>

        <div class="campos" >
       <div><span style="font-size: 32px; color: #2B99D3;font-family: Arial,Helvetica,sans-serif">Campos</span></div>
        <ul id="sortable2" class="sortable2">
        <?
          
          foreach ($campos_array as $key) 
          {
            echo $key;    
          }

        ?>
         </ul>
        </div>

        <div style="float:left;margin-left:49px">
        <table class="table table-bordered" style="width:440px">
          <tbody>
              <?php 
                $hidden = array('campos' => '1,2');
                echo form_open('forms/crear_form', '', $hidden);
              ?> 
              <tr>
                <td><span>Nombre:  </span></td>
                <td>
                  <?php 
                  $data = array(
                    'name'        => 'nombre',
                    'id'          => 'nombre',
                    'style'       => 'width: 170',
                    'value'       => $campos_form[0]->nombre
                    );

                  echo form_input($data);
                ?>
                </td>
              
              </tr>
              <tr>
                <td><span>Ref:  </span></td>
                <td>
                  <?php 
                  $data = array(
                    'name'        => 'ref',
                    'id'          => 'ref',
                    'value'       => $campos_form[0]->ref
                    );

                  echo form_input($data);
                ?>
                  <br>
                </td>
              </tr>
              <tr>
                <td><span>Título:  </span></td>
                <td>
                  <?php 
                  $data = array(
                    'name'        => 'titulo',
                    'id'          => 'titulo',
                    'style'       => 'width: 170',
                    'value'       => $campos_form[0]->titulo
                    );

                  echo form_input($data);
                ?>
                </td>
              </tr>
              <tr>
                <td><span>Botón:   </span></td>
                <td>
                  <?php 
                  $data = array(
                    'name'        => 'boton',
                    'id'          => 'boton',
                    'style'       => 'width: 170',
                    'value'       => $campos_form[0]->boton
                    );

                  echo form_input($data);
                ?>
                <br>
              </td>
              </tr>
              <tr>
                <td><span>Url Retorno:  </span></td>
                <td>
                  <?php 
                  $data = array(
                    'name'        => 'url_return',
                    'id'          => 'url_return',
                    'style'       => 'width: 170',
                    'value'       => $campos_form[0]->url_return
                    );

                  echo form_input($data);
                ?>
                </td>
              </tr>
          </tbody>
        </table> 
      </div>

      </div>
</div>
  </div>
  <div class="panel-footer">
    <div class="botones_form">
      <?php 
        $data = array(
          'id' => 'enviar',
          'class' => 'btn btn-primary btn-small',
          'type' => 'submit',
          'style'=> 'color: rgb(255,255,255)',
          'content' => 'Guardar Formulario'
        );

        echo form_button($data);

        echo form_close();
      ?> 
      <a href="<?php echo base_url()."index.php/home";?>" id="volver" class="btn">
        <span class="glyphicon glyphicon-home"></span> Volver a mis Listas
      </a>
    </div>
  </div>
</div>

  </div>
</div>

      <!--</div> -->

      <!-- /jumbotron -->

    </div> <!-- /container -->
<!--<script charset="utf-8" type="text/javascript" src="../../../js/validar_campos.js" language="JavaScript"></script>-->
<!--
<script type="text/javascript">
  $(function(){
    $('#nombre').validarCampos('abcdefghijklmnñopqrstuvwxyzáéiou0123456789');
    $('#ref').validarCampos('abcdefghijklmnñopqrstuvwxyzáéiou0123456789'); 
  });
</script>
-->
<script>
$(document).ready(function() {
  
  $("#titulo").blur(function(){
    var string = $('#titulo').val();
  $( "#titulo_form" ).text(string);
  });

  $("#boton").blur(function(){
    var string = $('#boton').val();
  $( "#boton_form" ).text(string);
  });

  $("#enviar").click(function() {

    var campos = $('#campos').val();
    alert(campos);
});
/*
  $("#enviar").click(function() {

    var campos = $('#campos').val();
    var nombre = $('#nombre').val();
    var titulo = $('#titulo').val();
    var boton = $('#boton').val();
    var url_return = $('#url_return').val();
    var ref = $('#ref').val();
    var id_lista = $('#id_lista').val();

    if(url_return == '')
    {
      url_return = "http://www.wasanga.com";
      return false;
    }

    if( nombre == '')
    {
      alert("Debe ingresar Nombre");
      $( "#nombre" ).focus();
      return false;
    }
    if(ref == '')
      {
        alert("Debe ingresar una referencia");
        $( "#ref" ).focus();
        return false;
      }

    if(url_return != '' && nombre != '' && ref != '')
    {
      
  var url = "<?php echo base_url() ?>index.php/forms/crear_form";
  $.getJSON( url, {
   campos:campos, 
   nombre:nombre, 
   titulo:titulo, 
   boton:boton, 
   url_return:url_return, 
   ref:ref, 
   id_lista:id_lista
  })
    .done(function( data ) {
      var success = data.success;
              alert(success);
          return false;
        });

     } 

    });
*/

  });

  $(function() {
    $("#sortable1").sortable({
      connectWith: ".sortable2",
      update: function(event, ui){
            
            var newOrder = $(this).sortable('toArray').toString();
            
            $("#campos").val(newOrder);

        }
    }).disableSelection();

    $( "#sortable1" ).sortable({
      cancel: ".ui-state-disabled"
    });
    
    $("#sortable2").sortable({
      connectWith: ".sortable1"
    }).disableSelection();
    
    $('#cerrar').click(function(){
        parent.$.fancybox.close();
        return false;
  })

});
  </script>
</body>
</html>