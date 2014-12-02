<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->

<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<link rel="dns-prefetch" href="http://fonts.googleapis.com" />
	<link rel="dns-prefetch" href="http://themes.googleusercontent.com" />
	
	<link rel="dns-prefetch" href="http://ajax.googleapis.com" />
	<link rel="dns-prefetch" href="http://cdnjs.cloudflare.com" />
	<link rel="dns-prefetch" href="http://agorbatchev.typepad.com" />
	
	<!-- Use the .htaccess and remove these lines to avoid edge case issues.
	   More info: h5bp.com/b/378 -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Mailing Pehuén - Correo Directo y Listas de Suscriptores</title>
	<meta name="description" content="Mango is a slick and responsive Admin Template build with modern techniques like HTML5 and CSS3 to be used for backend solutions of any size.">
	<meta name="author" content="Manuel Pizarro Mendoza">

	<!-- Mobile viewport optimized: h5bp.com/viewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<!-- iPhone: Don't render numbers as call links -->
	<meta name="format-detection" content="telephone=no">
	
	<link rel="shortcut icon" href="favicon.ico" />
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
	<!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->
	
	<!-- The Styles -->
	<?php include "home_partial/header_css.php";?>		
	
	<!-- The Scripts -->
		
	<!-- Load Webfont loader -->
	<script type="text/javascript">
		window.WebFontConfig = {
			google: { families: [ 'PT Sans:400,700' ] },
			active: function(){ $(window).trigger('fontsloaded') }
		};
	</script>
	<script defer async src="https://ajax.googleapis.com/ajax/libs/webfont/1.0.28/webfont.js"></script>
	
	<!-- Essential polyfills -->
	<script src="js/mylibs/polyfills/modernizr-2.6.1.min.js"></script>
	<script src="js/mylibs/polyfills/respond.js"></script>
	<script src="js/mylibs/polyfills/matchmedia.js"></script>
	<!--[if lt IE 9]><script src="js/mylibs/polyfills/selectivizr-min.js"></script><![endif]-->
	<!--[if lt IE 10]><script src="js/mylibs/charts/excanvas.js"></script><![endif]-->
	<!--[if lt IE 10]><script src="js/mylibs/polyfills/classlist.js"></script><![endif]-->
	
	<!-- Grab frameworks from CDNs -->
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
	
		<!-- Do the same with jQuery UI -->
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
	<script>window.jQuery.ui || document.write('<script src="js/libs/jquery-ui-1.8.21.min.js"><\/script>')</script>
	
		<!-- Do the same with Lo-Dash.js -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/lodash.js/0.4.2/lodash.min.js"></script>
	<script>window._ || document.write('<script src="js/libs/lodash.min.js"><\/script>')</script>
	
	<?php include "home_partial/header_js.php";?>
	
	<!-- end scripts -->
	
</head>

<body class=login>

	<!-- Some dialogs etc. -->

	<!-- The loading box -->
	<div id="loading-overlay"></div>
	<div id="loading">
		<span>Loading...</span>
	</div>
	<!-- End of loading box -->
		
	<!-- Now, the page itself begins -->
		
	<!-- The toolbar at the top -->
	<section id="toolbar">
		<div class="container_12">
		
			<!-- Left side -->
			<div class="left">
				<ul class="breadcrumb">
				
					<li><a href="javascript:void(0);">Mailing Pehuén</a></li>
					<li><a href="javascript:void(0);">Login</a></li>
					
				</ul>
			</div>
			<!-- End of .left -->
			
			<!-- Right side -->
			<div class="right">
				<ul>
				
					<li><a href="dashboard.html"><span class="icon i14_bended-arrow-left"></span>Volver al Dashboard</a></li>
					
					<li class="red"><a href="#">Comprar</a></li>
					
				</ul>
			</div><!-- End of .right -->
			
			<!-- Phone only items -->
			<div class="phone">
				
				<!-- User Link -->
				<li><a href="#"><span class="icon icon-home"></span></a></li>
				<!-- Navigation -->
				<li><a href="#"><span class="icon icon-heart"></span></a></li>
			
			</div><!-- End of .phone -->
			
		</div><!-- End of .container_12 -->
	</section><!-- End of #toolbar -->
	
	<!-- The header containing the logo -->
	<header class="container_12">
		
		<div class="container">
		
			<!-- Your logos -->
			<a href="/tf-mango/"><img src="<?php echo base_url();?>img/logo.png" alt="Mango" width="210" height="67"></a>
			<a class="phone-title" href="login.html"><img src="img/logo-mobile.png" alt="Mango" height="22" width="70" /></a>
			
			<!-- Right link -->
			<div class="right">
				<span>¿Tienes una cuenta?</span>
				<a href="javascript:void(0);">Registrar</a>
			</div>
			
		</div><!-- End of .container -->
	
	</header><!-- End of header -->
	
	<!-- The container of the sidebar and content box -->
	<section id="login" class="container_12 clearfix">
	
	<?php 
   		$attributes = array('class' => 'box validate', 'role' => 'form');
   		echo form_open('verifylogin', $attributes); 
   ?>
		<!--<form action="dashboard.html" method="post" class="box validate">-->
		
			<div class="header">
				<h2><span class="icon icon-lock"></span>Login</h2>
			</div>
			
			<div class="content">
				
				<!-- Login messages -->
				<div class="login-messages">
					<div class="message welcome">Bienvenido!</div>
					<div class="message failure">Credenciales Inválidas.</div>
				</div>
	
   <?php echo validation_errors(); ?>
       
    <div class="row">
		<label for="login_name">
			<strong>Usuario</strong>
			<small>O dirección email</small>
		</label>
		<div>
    		<?php 
	      		echo form_input(array(
			        'tabindex'=>'1' ,
			        'class'=>'form-control',
			        'name'=>'username', 
			        'value'=>set_value('username'),
			        'size'=>'20',
			        'placeholder'=>$this->lang->line('login_username')
			        )); 
			?>
        </div>
	</div>
	<div class="row">
		<label for="login_pw">
			<strong>Password</strong>
			<small><a href="javascript:void(0);" id="">Recordar?</a></small>
		</label>
		<div>
		 <?php 
      		echo form_password(array(
	        'tabindex'=>'2' ,
	        'class'=>'form-control',
	        'name'=>'password', 
	        'value'=>set_value('password'),
	        'size'=>'20',
	        'placeholder'=>$this->lang->line('login_password')
	        )); 
      	?>
		</div>
	</div>
</div><!-- End of .form-box -->
<div class="actions">
				<div class="left">
					<div class="rememberme">
						<input tabindex=4 type="checkbox" name="login_remember" id="login_remember" checked /><label for="login_remember">Recordarme?</label>
					</div>
				</div>
				<div class="right">
					<?php echo form_submit('loginButton','Login', "class='btn btn-lg btn-primary btn-block'"); ?>
				</div>
			</div><!-- End of .actions -->
	</div><!-- End of .content -->
			
			<!--
			<div class="actions">
				<div class="left">
					<div class="rememberme">
						<input tabindex=4 type="checkbox" name="login_remember" id="login_remember" checked /><label for="login_remember">Remember me?</label>
					</div>
				</div>
				<div class="right">
					<input tabindex=3 type="submit" value="Sign In" name="login_btn" />
				</div>
			</div> End of .actions -->
			
		<?php echo form_close(); ?>

	</section>
	
	<!-- Spawn $$.loaded -->
	<script>
		$$.loaded();
	</script>
	
</body>
</html>