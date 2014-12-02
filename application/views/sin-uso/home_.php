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

	<!-- Add List -->
	<?php include "listas/modal/new_lista.php";?>
	<!-- End List -->
	
	<!-- Add Suscriptor -->
	<?php include "suscriptor/modal/new_suscriptor.php";?>
	<!-- End Suscriptor -->

	<!-- Add Client -->
	<?php include "modal/add_client.php";?>
	<!-- End Add Client -->
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
						<h2><img class="icon" src="<?php echo base_url();?>img/icons/packs/fugue/16x16/table.png">Mis Listas</h2>
					</div>
					
					<div class="content">
						<div class="tabletools">
							<div class="left">
								<a class="open-add-client-dialog" href="javascript:void(0);"><i class="icon-plus"></i>Nueva Lista</a>
							</div>
							<div class="right">								
							</div>
						</div>
						<table class="dynamic styled" data-table-tools='{"display":true}'> <!-- OPTIONAL: with-prev-next -->
							<thead>
								<tr>
									<th>Nombre Lista</th>
									<th>Suscriptores</th>
									<th>Acciones</th>
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

    <script>
	$$.ready(function() {

		$( "#dialog_add_client" ).dialog({
			autoOpen: false,
			modal: true,
			width: 400,
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
		
		$( ".open-add-client-dialog" ).click(function() {
			$( "#dialog_add_client" ).dialog( "open" );
			return false;
		});

		/*ADD SUSCRIPTOR*/
		$( "#dialog_add_suscriptor" ).dialog({
			autoOpen: false,
			modal: true,
			width: 400,
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
		
		$( ".open-add-suscriptor-dialog" ).click(function() {
			$( "#dialog_add_suscriptor" ).dialog( "open" );
			return false;
		});
	});
	</script>
    
    <!-- Spawn $$.loaded -->
	<script>
		$$.loaded();
	</script>

    <script type="text/javascript">
      $(document).ready(function(){
      	
      	$('#enviar').click(function(){
    		var nombre_lista = $('#nombre_lista').val();
			$.get("<?php echo base_url() ?>index.php/listas/new_lista" , {id_user:<?php echo $id; ?>,nombre_lista:nombre_lista}, 
	        function(data){
	        	//alert(JSON.stringify(data));
	            var success = data.success;
	            if( success == 'success'){
	               parent.document.location.reload();
	                
	            }else{
	              alert("No se creo lista");
	            }
	        }, 'json');
		});

		$('#save_suscriptor').click(function(){
    		
    		var id_lista = $('#lista_select').val();
    		var email = $('#email_suscriptor').val();
    		var nombre = $('#nombre_suscriptor').val();
			
			$.get("<?php echo base_url() ?>index.php/suscriptores/new_suscriptor" , {id_user:<?php echo $id; ?>,id_lista:id_lista, nombre_suscriptor:nombre, email_suscriptor:email}, 
	        function(data){
	        	//alert(JSON.stringify(data));
	            var success = data.success;
	            if( success == 'success'){
	               parent.document.location.reload();
	                
	            }else{
	              alert("No se creo lista");
	            }
	        }, 'json');
	        
		});
      
    $("#contenido").load("<?php echo base_url()."index.php/listas/data/$id"; ?>");
 
 });
</script>
</body>
</html>