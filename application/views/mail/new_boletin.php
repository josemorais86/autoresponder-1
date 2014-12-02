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

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>   

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
            <a class="navbar-brand" href="#">Wasanga Autoresponder </a>
          </div>
          <div class="navbar-collapse collapse">
          
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-envelope"></span>&nbsp;123</a></li>
              
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


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Nuevo Boletín</h3>
 
  </div>

<div class="panel-body">
  <?php 
    if(validation_errors())
      echo "<div class='alert alert-danger' role='alert'>".validation_errors()."</div>";
  ?>
        
        <?php 
          $hidden = array('id_lista' => $id_lista, 'tipo' => 1);
          echo form_open('mailing/new_mailing_view/'.$id_lista, '', $hidden);
        ?>  
    
        <table class="table table-bordered table-hover">
          <tbody>
            <tr>
              <th style="font-weight: bold; font-style: italic; font-size: 13px;">
                Nombre:
              </th>
              <td>
                <?php 
                  $data = array(
                    'name'        => 'nombre',
                    'id'          => 'nombre',
                    'maxlength'   => '210',
                    'size'        => '80',
                    'style'       => 'height: 30',
                    'value'       => set_value('nombre')
                    );

                  echo form_input($data);
                ?>
                
              </td>
            </tr>
            <tr>
              <th style="font-weight: bold; font-style: italic; font-size: 13px;">
                Remitente:
              </th>
              <td>
                <?php 
                  $data = array(
                    'name'        => 'rte',
                    'id'          => 'rte',
                    'maxlength'   => '210',
                    'size'        => '80',
                    'style'       => 'height: 30',
                    'value'       => set_value('rte')
                    );

                  echo form_input($data);
                ?>
                
              </td>
            </tr>
            <tr>  
              <th style="font-weight: bold; font-style: italic; font-size: 13px;">
                Asunto:
              </th>
              <td> 
              <?php 
                  $data = array(
                    'name'        => 'asunto',
                    'id'          => 'asunto',
                    'maxlength'   => '210',
                    'size'        => '80',
                    'style'       => 'height: 30',
                    'value'       => set_value('asunto')
                    );

                  echo form_input($data);
                ?> 
                
              </td> 
            </tr>
            
            <tr>
              <td colspan="2">
                <?php 
                  $data = array(
                    'name'        => 'editor',
                    'id'          => 'editor',
                    'cols'        => '80',
                    'rows'        => '10',
                    'value'       => set_value('editor')                    
                    );

                  echo form_textarea($data);
                ?>
                              
              </td>
            </tr>
            <tr>
              <th style="font-weight: bold; font-style: italic; font-size: 13px;">
                Fecha y hora:
              </th>
              <td>
                <div style="margin-top:10px;margin-bottom:15px">
                  <div style="margin-left:10px;float:left">
                    <input id="fecha" name="fecha" size="10" type="text" style="width: 100px" readonly="readonly" />
                </div>
                <div style="margin-left:20px;float:left">
                  <select id="hora" name="hora" style="width: 80px">
                    <?php 
                      for($i=0;$i<24;$i++){
                        if($i <= 9)
                          echo "<option value='".$i."'>0".$i.":00</option>";
                        else
                          echo "<option value='".$i."'>".$i.":00</option>";
                      }
                    ?>
                  </select>
                  
                  </div>
                  <div style="margin-left:20px;float:left">Hrs.</div>
                </div>
              </td>
           </tr>
              
          </tbody>
        </table>  

     </div><!--END PANEL BODY-->
    
    <div class="panel-footer">
      <?php 
        $data = array(
          'id' => 'enviar',
          'class' => 'btn btn-primary',
          'type' => 'submit',
          'content' => 'Programar'
        );

        echo form_button($data);

        echo form_close();
      ?>
      <a href="<?php echo base_url()."index.php/home";?>" id="volver" class="btn">
        <span class="glyphicon glyphicon-home"></span> Volver a mis Listas
      </a> 
    </div>

    </div>
            
  </table>
      

    </div> <!-- /container -->
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <!-- fancybox -->
    <script type="text/javascript" src="<?php echo base_url();?>js/fancybox/jquery.fancybox.js"></script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type='text/javascript' src='<?php echo base_url();?>js/ckeditor/ckeditor.js'></script>
    <script src="<?php echo base_url();?>js/ckeditor/adapters/jquery.js"></script>
    <!-- DatePicker -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  

    <script type='text/javascript'>
      $(document).ready(function()
      {
      /*FUNCION BOLETIN SEGUIMIENTO*/
      
      //$("#fecha").datepicker({ dateFormat: "dd-mm-yy" });
              /*DATEPICKER ESPAÑOL*/
      $.datepicker.regional['es'] = {
       closeText: 'Cerrar',
       prevText: '<Ant',
       nextText: 'Sig>',
       currentText: 'Hoy',
       minDate:0,
       monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
       monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
       dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
       dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
       dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
       weekHeader: 'Sm',
       dateFormat: 'dd-mm-yy',
       firstDay: 1,
       isRTL: false,
       showMonthAfterYear: false,
       yearSuffix: ''
       };
       $.datepicker.setDefaults($.datepicker.regional['es']);
      $(function () {
      $("#fecha").datepicker();
      });        
      /*********************************/

      $( 'textarea#editor' ).ckeditor();

        // validar solo números
        $("#dia").keydown(function(event) {
        if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 ||
          (event.keyCode == 65 && event.ctrlKey === true) || (event.keyCode >= 35 && event.keyCode <= 39) || (event.keyCode == 110 || event.keyCode == 190) ) {
            return;
          }
          else {
          
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) ) {
              event.preventDefault();
            }
          }
        });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $(window).load(function () {
        // Una vez se cargue al completo la página desaparecerá el div "cargando"
        $('#cargando').fadeOut( "slow", function() {
          // Animation complete.
            });
        });            
  });
</script>
  </body>
</html>
