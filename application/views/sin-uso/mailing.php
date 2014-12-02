<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->

<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Dashboard - Mailing Pehuén: Correo directo, campañas y suscriptores</title>
	<meta name="description" content="Mailing Pehuén: Correo directo, campañas y suscriptores">
	<meta name="author" content="Manuel Pizarro">
		<!-- Mobile viewport optimized: h5bp.com/viewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1">
		<!-- iPhone: Don't render numbers as call links -->
	<meta name="format-detection" content="telephone=no">
	<link rel="shortcut icon" href="favicon.ico" />

	<?php include "home_partial/header_css.php";?>	
	<style type="text/css">
.xdialog
{
	background: #003660;
	top:2px!important;

}
</style>
</head>

<body>

	<!-- The loading box -->
	<div id="loading-overlay"></div>
	<div id="loading">
		<span>Loading...</span>
	</div>
	<!-- End of loading box -->

<!-- ==================================MODALS=========================================-->	
	<!-- Lock Screen -->
	<?php include "modal/lock_screen.php";?>
	<!-- End Lock Screen -->
	
	<!-- Settings -->
	<?php include "modal/settings.php";?>
	<!-- End Settings -->

	<!-- New Boletín -->
	<?php include "mail/modal/new_boletin.php";?>
	<!-- End Source Code -->

	<!-- Edit Boletin -->
	<?php include "mail/modal/edit_boletin.php";?>
	<!-- End Source Code -->
	
<!-- ================================END MODALS=======================================-->	

	<!-- Toolbar -->
	<?php include "home_partial/toolbar.php";?>
	<!-- Header -->
	<?php include "home_partial/header.php";?>
	
	<!-- Blue Toolbar, Content,  Sidebar -->
	<div role="main" id="main" class="container_12 clearfix">
	
	<?php include "home_partial/blue_toolbar.php";?>
		
	<!-- Sidebar -->
	<?php include "home_partial/sidebar.php";?>
	

		<!--CONTENT -->
	<section id="content" class="container_12 clearfix" data-sort=true>
	
		<!-- Information -->
		<?php include "home_partial/information.php";?>	

		<!-- ===============================TABLAS============================== -->		
			<div class="grid_12">
				<div class="box">
					<div class="header">
						<h2><img class="icon" src="<?php echo base_url();?>img/icons/packs/fugue/16x16/table.png">Mis <?php echo $titulo; ?></h2>
					</div>
					
					<div class="content">
						<div class="tabletools">
							<div class="left">
								<a class="open-add-new_boletin-dialog"
								   data-fancybox-type="iframe" 
								   href="javascript:void(0);"
								   > 
									<i class="icon-plus"></i>Nuevo <?php echo $boton; ?>
								</a>
							</div>
							<div class="right">								
							</div>
						</div>
						<table class="dynamic styled" data-table-tools='{"display":true}'> <!-- OPTIONAL: with-prev-next -->
							<thead>
								<tr>
						          <th><center><a id="titulo" href="#">ID</a></center></th>
						          <th><center><a id="titulo" href="#">Remitente</a></center></th>
						          <th><center><a id="titulo" href="#">Nombre</a></center></th>
						          <th><center><a id="titulo" href="#"><?php echo $dia; ?></a></center></th>
						          <th><center><a id="titulo" href="#">Activo/Inactivo</a></center></th>
						          <th><center><a id="titulo" href="#">Opciones</a></center></th>
      							</tr>
							</thead>
							<tbody id="contenido"></tbody>
						</table>
					</div><!-- End of .content -->
					
				</div><!-- End of .box -->
			</div><!-- ==========================FIN TABLAS================================ -->
		</section><!-- FIN CONTENT -->
	
	</div>
	
	<!-- The footer -->
	<footer class="container_12">
		<ul class="grid_6">
			<li><a href="#">About</a></li>
			<li><a href="#">Jobs</a></li>
			<li><a href="#">@StammTec.de</a></li>
		</ul>
		
		<span class="grid_6">
			Copyright &copy; 2012 YourCompany
		</span>
	</footer><!-- End of footer -->

<!-- The Scripts -->
		<!-- Header js -->
		<?php include "home_partial/header_js.php";?>		
		<script type='text/javascript' src='<?php echo base_url();?>js/ckeditor/ckeditor.js'></script>
		<script src="<?php echo base_url();?>js/ckeditor/adapters/jquery.js"></script>
	 <!-- Spawn $$.loaded -->
	<script>
		$$.loaded();
	</script>

    <script type="text/javascript">
    	$( 'textarea#editor' ).ckeditor();

    	$( ".open-add-new_boletin-dialog" ).click(function() {
			$( "#dialog_new_boletin" ).dialog( "open" );
			return false;
		});

    	setTimeout(function()
		{

    	$( ".open-edit-new_boletin-dialog" ).click(function() {
    		var id_mail = $(this).attr('id-mail');
			$("#dialog_edit_boletin").load("<?php echo base_url()."index.php/mailing/dialog_edit_boletin/"; ?>"+id_mail);
			$( "#dialog_edit_boletin" ).dialog( "open" );
			return false;
		});
    	},800);
    	
      	setTimeout(function()
		{
      		$("#contenido").load("<?php echo base_url()."index.php/mailing/data/$id_lista/$tipo" ?>");

    	},200);
		
		$( "#dialog_new_boletin" ).dialog({
			autoOpen: false,
			modal: true,
			width: 700,
			height:500,
			dialogClass: 'xdialog',
			open: function()
				{ 
					$(this).parent().css('overflow', 'visible'); 
					$$.utils.forms.resize() 
				}
		}).find('button.submit').click(function(){
			var $el = $(this).parents('.ui-dialog-content');
			if ($el.validate().form()) {
				$el.find('form')[0].reset();
				$el.dialog('close');
			}
		}).end().find('button.cancel').click(function(){
			var $el = $(this).parents('.ui-dialog-content');
			$el.find('form')[0].reset();
			$el.dialog('close');;
		});

		$( "#dialog_edit_boletin" ).dialog({
			autoOpen: false,
			modal: true,
			width: 700,
			height:500,
			dialogClass: 'xdialog',
			open: function()
				{ 
					$(this).parent().css('overflow', 'visible'); 
					$$.utils.forms.resize() 
				}
		}).find('button.submit').click(function(){
			var $el = $(this).parents('.ui-dialog-content');
			if ($el.validate().form()) {
				$el.find('form')[0].reset();
				$el.dialog('close');
			}
		}).end().find('button.cancel').click(function(){
			var $el = $(this).parents('.ui-dialog-content');
			$el.find('form')[0].reset();
			$el.dialog('close');;
		});

		setTimeout(function()
		{
					
  		$('.estado').click(function(){
        $(this).toggleClass("active");
        var act = $(this).attr('data-active');
        if(act == 'activate'){
          $(this).attr('data-active', 'deactivate');
          $(this).html('<i class="icon-thumbs-down icon-white"></i> Inactivo');
        } 
        else{
          $(this).attr('data-active', 'activate');
          $(this).html('<i class="icon-thumbs-up icon-white"></i> Activo');
        }
        
        var ref = $(this).attr('data-href');
        $.get(ref , 
          function(data){

          var success = data.success;
          if( success == 'success'){

          }else{
            alert("No se actualizo");
          }
        }, 'json');
        return false;
      });

  		},1000);

					/*FUNCION BOLETIN SEGUIMIENTO*/
			
			$("#fecha").datepicker({ dateFormat: "dd-mm-yy" });
					
			$('#enviar').click(function() {
  			  var validator = true;
			  var nombre = $('#nombre').val();
			  var rte = $('#rte').val();
			  var asunto = $('#asunto').val();
			  var editor = $('#editor').val();
			  var dia = $('#dia').val();
			  var id_lista = $('#id_lista').val();
			  var hora = $('#hora').val();
			  var fecha = $('#fecha').val();
			  var tipo = 0;
			 
			 if( nombre == '')
			      	{
			      		$( "#nombre" ).focus();
			      		alert("Ingrese nombre");
			      		validator = false;
			      		return false;
			    	}
			      	if(asunto == '')
			        {
			        	alert("Ingrese Asunto");
			        	$( "#asunto" ).focus();
			      		validator = false;
			      		return false;
			      	}
			       	if(dia == '')
			        {
			        	alert("Ingrese número de días");
			        	$( "#dia" ).focus();
			        	validator = false;
			        	return false;
			      	}

					if(validator == true)
					{
					  $.post('<?php echo base_url() ?>index.php/mailing/new_mail' , {nombre:nombre, rte:rte, asunto:asunto, editor:editor, dia:dia, fecha:fecha, hora:hora, id_lista:id_lista, tipo:tipo}, 
					        function(data){
					          //alert(JSON.stringify(data));
					            var success = data.success;
					            if( success == 'success'){
					               parent.document.location.reload();
					                
					            }else{
					              alert("No se actualizo");
					            }
					        }, 'json');
							$(this).attr("disabled", "disabled");
					}
				});
				
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
	
</script>
</body>
</html>