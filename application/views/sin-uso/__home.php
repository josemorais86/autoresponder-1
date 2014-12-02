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
	
	<title>Dashboard - Mailing Pehuén: Correo directo, campañas y suscriptores</title>
	<meta name="description" content="Mailing Pehuén: Correo directo, campañas y suscriptores">
	<meta name="author" content="Manuel Pizarro">

	<!-- Mobile viewport optimized: h5bp.com/viewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<!-- iPhone: Don't render numbers as call links -->
	<meta name="format-detection" content="telephone=no">
	
	<link rel="shortcut icon" href="favicon.ico" />
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
	<!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->
	
	
	
	
	
	
	
	<!-- The Styles -->
	<!-- ---------- -->
	
	<!-- Layout Styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/grid.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/layout.css">
	
	<!-- Icon Styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/icons.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/fonts/font-awesome.css">
	<!--[if IE 8]><link rel="stylesheet" href="css/fonts/font-awesome-ie7.css"><![endif]-->
	
	<!-- External Styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/external/jquery-ui-1.8.21.custom.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/external/jquery.chosen.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/external/jquery.cleditor.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/external/jquery.colorpicker.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/external/jquery.elfinder.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/external/jquery.fancybox.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/external/jquery.jgrowl.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/external/jquery.plupload.queue.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/external/syntaxhighlighter/shCore.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/external/syntaxhighlighter/shThemeDefault.css" />
	
	<!-- Elements -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/elements.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/forms.css">
	
	<!-- OPTIONAL: Print Stylesheet for Invoice -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/print-invoice.css">
	
	<!-- Typographics -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/typographics.css">
	
	<!-- Responsive Design -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/media-queries.css">
	
	<!-- Bad IE Styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/mango/css/ie-fixes.css">
	
	
	
</head>

<body>

	<!----------------------->
	<!-- Some dialogs etc. -->

	<!-- The loading box -->
	<div id="loading-overlay"></div>
	<div id="loading">
		<span>Loading...</span>
	</div>
	<!-- End of loading box -->
	
	<!-- The lock screen -->
	<div id="lock-screen" title="Screen Locked">
		
		<a href="login.html" class="header right button grey flat">Logout</a>
		
		<p>Due to the inactivity of this session, your account was temporarily locked.</p>
		<p>To unlock your account, simply slide the button and enter your password.</p>
		
		<div class="actions">
			<div id="slide_to_unlock">
				<img src="<?php echo base_url();?>img/elements/slide-unlock/lock-slider.png" alt="slide me">
				<span>slide to unlock</span>
			</div>
			<form action="#" method="GET">
				<input type="password" name="pwd" id="pwd" placeholder="Enter your password here..." autocorrect="off" autocapitalize="off"> <input type="submit" name=send value="Unlock" disabled> <input type="reset" value="X">
			</form>
		</div><!-- End of .actions -->
		
	</div><!-- End of lock screen -->
	
	<!-- The settings dialog -->
	<div id="settings" class="settings-content" data-width=450>
	
		<ul class="tabs center-elements">
			<li><a href="#settings-1"><img src="<?php echo base_url();?>img/icons/packs/fugue/24x24/user-business.png" alt="" /><span>Account Settings</span></a></li>
			<li><a href="#settings-2"><img src="<?php echo base_url();?>img/icons/packs/fugue/24x24/balloon.png" alt="" /><span>Notifications</span></a></li>
			<li><a href="#settings-3"><img src="<?php echo base_url();?>img/icons/packs/fugue/24x24/credit-card.png" alt="" /><span>Invoicing</span></a></li>
		</ul>
		
		<div class="change_password">
			<form action="#" method="GET" class="validate" id="settings_password">
				<p>
					<label for="settings-password">New Password:</label> <input type="password" id="settings-password" class="required strongpw small password meter" />
				</p>
			</form>
			<div class="actions">
				<div class="right">
					<input form="settings_password" type="reset" value="Cancel" class="grey" />
					<input form="settings_password" type="submit" value="OK" />
				</div>
			</div>
		</div><!-- End of .change_password -->
		
		<div class="content">
		
			<div id="settings-1">
				<form action="#" method="GET">
					<p>
						<label for="settings-name">Name:</label> <input type="text" id="settings-name" class="medium" />
					</p>
					<p>
						<label for="settings-descr">Descripton:</label> <input type="text" id="settings-descr" class="medium" />
					</p>
					<p class="divider"></p>
					<p>
						<label for="settings-pw">Password: </label> <input class="grey change_password_button" type="button" id="settings-pw" value="Change Password..." data-lang-changed="Password changed" />
					</p>
				</form>
			</div><!-- End of #settings-1 -->
			
			<div id="settings-2">
				Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
				<form action="#" method="GET">
					<div class="spacer"></div>
					<p class="divider"></p>
					<div class="spacer"></div>
					<p>
						<label for="settings-email">Email Address:</label> <input type="text" id="settings-email" class="medium" />
					</p>
					<p>
						<label for="settings-interval">Interval: </label>
						<select name="settings-interval" id="settings-interval" data-placeholder="Choose an Interval">
							<option value=""></option>
							<option value="Never">Never</option>
							<option value="Daily">Daily</option>
							<option value="Weekly">Weekly</option>
							<option value="Monthly">Monthly</option>
							<option value="Yearly">Yearly</option>
						</select>
					</p>
				</form>
			</div><!-- End of #settings-2 -->
			
			<div id="settings-3">
				<form action="#" method="GET">
					<p>
						<label for="settings-card-number">Card number:</label> <input type="text" id="settings-card-number" class="medium" />
					</p>
					<p>
						<label for="settings-cvv">CVV:</label> <input type="text" id="settings-cvv" class="medium" />
					</p>
					<p>
						<label for="settings-expiration">Expiration: </label>
						<select sname="settings-expiration" id="settings-expiration" data-placeholder="Choose an Expiration">
							<option value=""></option>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
						</select>
					</p>
				</form>
			</div><!-- End of #settings-3 -->
			
		</div><!-- End of .content -->
		
		<div class="actions">
			<div class="left">
				<button class="grey cancel">Cancel</button>
			</div>
			<div class="right">
				<button class="save">Save</button>
				<button class="hide saving" disabled >Saving...</button>
			</div>
		</div><!-- End of .actions -->
		
	</div><!-- End of settings dialog -->
	
	<!-- Add Client Example Dialog -->
	<div style="display: none;" id="dialog_add_client" title="Add Client Example Dialog">
		<form action="" class="full validate">
			<div class="row">
				<label for="d2_username">
					<strong>Username</strong>
				</label>
				<div>
					<input class="required" type=text name=d2_username id=d2_username />
				</div>
			</div>
			<div class="row">
				<label for="d2_email">
					<strong>Email Address</strong>
				</label>
				<div>
					<input class="required" type=text name=d2_email id=d2_email />
				</div>
			</div>
			<div class="row">
				<label for="d2_role">
					<strong>Role</strong>
				</label>
				<div>
					<select style="padding-bottom: 10px" name=d2_role id=d2_role class="search required" data-placeholder="Choose a Role">
						<option value=""></option>
						<option value="Applicant">Applicant</option> 
						<option value="Member">Member</option> 
						<option value="Moderator">Moderator</option> 
						<option value="Administrator">Bienvenido <?php echo $username; ?></option> 
					</select>
				</div>
			</div>
		</form>
		<div class="actions">
			<div class="left">
				<button class="grey cancel">Cancel</button>
			</div>
			<div class="right">
				<button class="submit">Add User</button>
			</div>
		</div>
	</div><!-- End if #dialog_add_client -->
	

	<!--  End of Add Client Example Dialog -->
	
	<!-- Message Dialog -->
	<div style="display: none;" id="dialog_message" title="Conversation: John Doe">
		<div class="spacer"></div>
		<div class="messages full chat">
			
			<div class="msg reply">
				<img src="<?php echo base_url();?>img/icons/packs/iconsweets2/25x25/user-2.png"/>
				<div class="content">
					<h3><a href="pages_profile.html">John Doe</a> <span>says:</span><small>3 hours ago</small></h3>
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
					et dolore magna aliquyam erat, sed diam voluptua.</p>
				</div>
			</div>
			
			<div class="msg">
				<img src="<?php echo base_url();?>img/icons/packs/iconsweets2/25x25/user-2.png"/>
				<div class="content">
					<h3><a href="pages_profile.html">Peter Doe</a> <span>says:</span><small>5 hours ago</small></h3>
					<p>At vero eos et accusam et justo duo dolores et ea rebum.
					Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
				</div>
			</div>
		
		</div><!-- End of .messages -->
		
		<div class="actions">
			<div class="left">
				<input style="width: 330px;" type="text" name=d3_message id=d3_message placeholder="Type your message..."/>
			</div>
			<div class="right">
				<button>Send</button>
				<button class="grey">Cancel</button>
			</div>
		</div><!-- End of .actions -->
		
	</div><!-- End of #dialog_message -->
	

	
	<!--------------------------------->
	<!-- Now, the page itself begins -->
	<!--------------------------------->
	
	<!-- The toolbar at the top -->
	<section id="toolbar">
		<div class="container_12">
		
			<!-- Left side -->
			<div class="left">
				<ul class="breadcrumb">
				
					<li><a href="dashboard.html">Mailing Pehuén</a></li>
					<li><a href="javascript:void(0);">Dashboard</a></li>

				</ul>
			</div>
			<!-- End of .left -->
			
			<!-- Right side -->
			<div class="right">
				<ul>
				
					<li><a href="pages_profile.html"><span class="icon i14_admin-user"></span>Profile</a></li>
					
					<li>
						<a href="#"><span>3</span>Messages</a>
						
						<!-- Mail popup -->
						<div class="popup">
							<h3>New Messages</h3>
							
							<!-- Button bar -->
							<a class="button flat left grey" onclick="$(this).parent().fadeToggle($$.config.fxSpeed)">Close</a>
							<a class="button flat right" href="tables_dynamic.html">Inbox</a>
							
							<!-- The mail content -->
							<div class="content mail">
								<ul>
								
									<li>
										<div class="avatar">
											<img src="<?php echo base_url();?>img/elements/mail/avatar.png" height=40 width=40/>
										</div>
										<div class="info">
											<strong>John Doe</strong>
											<span>Thanks for your theme!</span>
											<small>09:32 am</small>
										</div>
										<div class="text">
											<p>Hey Admin!</p>
											<p>I've purchased your admin template and it's great :)</p>
											<p>A happy customer</p>
											<div class="actions">
												<a href="javascript:void(0);" class="left open-message-dialog">Reply</a>
												<a onclick="$(this).parent().parent().parent().slideToggle($$.config.fxSpeed)" class="red right" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</li>
									
									<li>
										<div class="avatar">
											<img src="<?php echo base_url();?>img/elements/mail/mail.png" height=40 width=40/>
										</div>
										<div class="info">
											<strong>System</strong>
											<span>New comment</span>
											<small>08:47 am</small>
										</div>
										<div class="text">
											<p>Hello,</p>
											<p>There is one new comment on your theme.</p>
											<p>Go to Comments page to see it.</p>
											<div class="actions">
												<a href="javascript:void(0);" class="left open-message-dialog">Reply</a>
												<a onclick="$(this).parent().parent().parent().slideToggle($$.config.fxSpeed)" class="red right" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</li>
									
									<li>
										<div class="avatar">
											<img src="<?php echo base_url();?>img/elements/mail/mail.png" height=40 width=40/>
										</div>
										<div class="info">
											<strong>Stranger</strong>
											<span>[SPAM] ---</span>
											<small>Yesterday</small>
										</div>
										<div class="text">
											<p>[...]</p>
											<div class="actions">
												<a href="javascript:void(0);" class="left open-message-dialog">Read</a>
												<a onclick="$(this).parent().parent().parent().slideToggle($$.config.fxSpeed)" class="red right" href="javascript:void(0);">Delete</a>
											</div>                            
										</div>
									</li>
									
								</ul>
							</div><!-- End of .contents -->
							
						</div><!-- End of .popup -->
					</li><!-- End of li -->
					
					<li class="space"></li>
					
					<li><a href="javascript:void(0);" id="btn-lock"><span>--:--</span>Lock screen</a></li>
					
					<li class="red"><a href="login.html">Logout</a></li>
					
				</ul>
			</div><!-- End of .right -->
			
			<!-- Phone only items -->
			<div class="phone">
				
				<!-- User Link -->
				<li><a href="pages_profile.html"><span class="icon icon-user"></span></a></li>
				<!-- Navigation -->
				<li><a class="navigation" href="#"><span class="icon icon-list"></span></a></li>
			
			</div><!-- End of phone items -->
			
		</div><!-- End of .container_12 -->
	</section><!-- End of #toolbar -->
	
	<!-- The header containing the logo -->
	<header class="container_12">
	
		<!-- Your logos -->
		<a href="dashboard.html"><img src="<?php echo base_url();?>img/logo.png" alt="Mango" width="191" height="60"></a>
		<a class="phone-title" href="dashboard.html"><img src="<?php echo base_url();?>img/logo-mobile.png" alt="Mango" height="22" width="70" /></a>
		
		<div class="buttons">
			<a href="statistics.html">
				<span class="icon icon-sitemap"></span>
				Statistics
			</a>
			<a href="forms.html">
				<span class="icon icon-list-alt"></span>
				Forms
			</a>
			<a href="tables_dynamic.html">
				<span class="icon icon-table"></span>
				Tables
			</a>
		</div><!-- End of .buttons -->
	</header><!-- End of header -->
	
	<!-- The container of the sidebar and content box -->
	<div role="main" id="main" class="container_12 clearfix">
	
		<!-- The blue toolbar stripe -->
		<section class="toolbar">
			<div class="user">
				<div class="avatar">
					<img src="<?php echo base_url();?>img/layout/content/toolbar/user/avatar.png">
					<span>3</span>
				</div>
				<span>Bienvenido <?php echo $username; ?></span>
				<ul>
					<li><a href="javascript:$$.settings();">Settings</a></li>
					<li><a href="pages_profile.html">Profile</a></li>
					<li class="line"></li>
					<li><a href="login.html">Logout</a></li>
				</ul>
			</div>
			<ul class="shortcuts">
			
				<li>
					<a href="javascript:void(0);"><span class="icon i24_user-business"></span></a>
					<!-- Possible sizes: small/medium/large -->
					<div class="small">
						<h3>Create a User</h3>
						
						<!-- Button bar -->
						<button class="button flat left grey" onclick="$(this).parent().fadeToggle($$.config.fxSpeed).parent().removeClass('active')">Close</button>
						<button class="button flat right" onclick="$(this).parent().fadeToggle($$.config.fxSpeed).parent().removeClass('active')">Create</button>
						
						<div class="content">
							<form class="full grid">
								<div class="row no-bg">
									<p class="_100 small">
										<label for="p1_username">Username</label>
										<input type="text" name=p1_username id=p1_username />
									</p>
								</div>
								<div class="row no-bg">
									<p class="_50 small">
										<label for="p1_firstname">Firstname</label>
										<input type="text" name=p1_firstname id=p1_firstname />
									</p>
									<p class="_50 small">
										<label for="p1_lastname">Lastname</label>
										<input type="text" name=p1_lastname id=p1_lastname />
									</p>
								</div>
							</form>
						</div>
					</div><!-- End of popup -->
				</li>
				
				<li>
					<a href="javascript:void(0);"><span class="icon i24_inbox-document"></span></a>
					<!-- Possible sizes: small/medium/large -->
					<div class="small">
						<h3>Write a Message</h3>
						
						<!-- Button bar -->
						<button class="button flat left grey" onclick="$(this).parent().fadeToggle($$.config.fxSpeed).parent().removeClass('active')">Close</button>
						<button class="button flat right" onclick="$(this).parent().fadeToggle($$.config.fxSpeed).parent().removeClass('active')">Send</button>
						
						<div class="content">
							<form class="full grid">
								<div class="row no-bg">
									<p class="_100 small">
										<input type="text" name=p2_recipient id=p2_recipient placeholder="Recipient" />
									</p>
									<p class="_100 small">
										<input type="text" name=p2_subject id=p2_subject placeholder="Subject" />
									</p>
									<p class="_100 small">
										<textarea rows=5 style="overflow: hidden; height: 45px; width: 100%; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;" name="p2_message" id="p2_message" placeholder="Message"></textarea>
									</p>
								</div>
							</form>
						</div>
					</div><!-- End of popup -->
				</li>
				
				<li>
					<a href="javascript:void(0);"><span class="icon i24_application-blue"></span></a>
					<!-- Possible sizes: small/medium/large -->
					<div class="small">
						<h3>Information</h3>
						
						<!-- Button bar -->
						<button class="button flat left grey" onclick="$(this).parent().fadeToggle($$.config.fxSpeed).parent().removeClass('active')">Close</button>
						
						<div class="content">
							<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
						</div>
					</div><!-- End of popup -->
				</li>
				
			</ul><!-- End of .shortcuts -->
			
			<input type="search" data-source="extras/search.php" placeholder="Search..." autocomplete="off" class="tooltip" title="e.g. Peach" data-gravity=s>
		</section><!-- End of .toolbar-->
		
		<!-- ========================The sidebar========================= -->
		<aside>
			<div class="top">
			
				<!-- Navigation -->
				<nav><ul class="collapsible accordion">
				
					<li class="current"><a href="dashboard.html"><img src="<?php echo base_url();?>img/icons/packs/fugue/16x16/dashboard.png" alt="" height=16 width=16>Dashboard</a></li>
					
					<li>
						<a href="javascript:void(0);"><img src="<?php echo base_url();?>img/icons/packs/fugue/16x16/ui-layered-pane.png" alt="" height=16 width=16>Listas<span class="badge">4</span></a>
						<ul>
							<li><a href="ui_general.html"><span class="icon icon-list"></span>Ver</a></li>
							<li><a href="ui_extras.html"><span class="icon icon-cog"></span>Crear Nueva</a></li>
							<li><a href="ui_icons.html"><span class="icon icon-picture"></span>Nueva lista Basada en visitas por click</a></li>
							<li><a href="ui_grid.html"><span class="icon icon-th"></span>Lista de Suspención</a></li>
						</ul>
					</li>
					
					<li>
						<a href="javascript:void(0);"><img src="<?php echo base_url();?>img/icons/packs/fugue/16x16/application-form.png" alt="" height=16 width=16>Suscriptores</a>
						<ul>
							<li>
								<a href="forms.html">
									<span class="icon icon-list-alt"></span>Ver Todos
								</a>
							</li>
							<li>
								<a href="forms_validation.html">
									<span class="icon icon-warning-sign"></span>Buscar
								</a>
							</li>
							<li>
								<a href="forms_extras.html">
									<span class="icon icon-magic"></span>Añadir/Importar
								</a>
							</li>
							<li>
								<a href="forms_extras.html">
									<span class="icon icon-magic"></span>Exportar a CSV
								</a>
							</li>
							<li>
								<a href="forms_extras.html">
									<span class="icon icon-magic"></span>Formularios
								</a>
							</li>
							<li>
								<a href="forms_extras.html">
									<span class="icon icon-magic"></span>Borrar
								</a>
							</li>
							<li>
								<a href="forms_extras.html">
									<span class="icon icon-magic"></span>Utilidades
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="javascript:void(0);"><img src="<?php echo base_url();?>img/icons/packs/fugue/16x16/chart.png" alt="" height=16 width=16>Boletines<span class="badge">2</span></a>
						<ul>
							<li>
								<a href="statistics.html">
									<span class="icon icon-sitemap"></span>Boletines Texto
								</a>
							</li>
							<li>
								<a href="charts.html">
									<span class="icon icon-bar-chart"></span>Boletines Html
								</a>
							</li>
							<li>
								<a href="charts.html">
									<span class="icon icon-bar-chart"></span>Mensajes Personalizados
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="javascript:void(0);"><img src="<?php echo base_url();?>img/icons/packs/fugue/16x16/table.png" alt="" height=16 width=16>Campañas</a>
						<ul>
							<li>
								<a href="tables_static.html">
									<span class="icon icon-check-empty"></span>Nueva Campaña
								</a>
							</li>
							<li>
								<a href="tables_dynamic.html">
									<span class="icon icon-table"></span>Ver y comenzar campaña
								</a>
							</li>
							<li>
								<a href="tables_full.html">
									<span class="icon icon-fullscreen"></span>Ver Campañas completadas
								</a>
							</li>
							<li>
								<a href="tables_full.html">
									<span class="icon icon-fullscreen"></span>Ver Campañas no completadas
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="javascript:void(0);"><img src="<?php echo base_url();?>img/icons/packs/fugue/16x16/document-horizontal.png" alt="" height=16 width=16>Informes</a>
						<ul>
							<li><a href="login.html">Informe Resumen</a></li>
							<li><a href="pages_profile.html">Enlaces Clickeados</a></li>
							<li><a href="pages_invoice.html">Geomaps<span class="badge grey">1 open</span></a></li>
							<li><a href="pages_faq.html">Mostrar el informe de tráfico</a></li>
							<li><a href="pages_search.html">Desuscripciones y Motivos</a></li>
							<li><a href="pages_error_404.html">Enlaces de Newsletter</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);"><img src="<?php echo base_url();?>img/icons/packs/fugue/16x16/document-horizontal.png" alt="" height=16 width=16>Herramientas</a>
						<ul>
							<li><a href="login.html">Informe Resumen</a></li>
							<li><a href="pages_profile.html">Enlaces Clickeados</a></li>
							<li><a href="pages_invoice.html">Geomaps<span class="badge grey">1 open</span></a></li>
							<li><a href="pages_faq.html">Mostrar el informe de tráfico</a></li>
							<li><a href="pages_search.html">Desuscripciones y Motivos</a></li>
							<li><a href="pages_error_404.html">Enlaces de Newsletter</a></li>
						</ul>
					</li>
				</ul></nav><!-- End of nav -->				
			</div><!-- End of .top -->
			
			<div class="bottom sticky">
				<div class="divider"></div>
				<div class="progress">
					<div class="bar" data-title="Space" data-value="1285" data-max="5120" data-format="0,0 MB"></div>
					<div class="bar" data-title="Traffic" data-value="8.61" data-max="14" data-format="0.00 GB"></div>
					<div class="bar" data-title="Budget" data-value="20000" data-max="20000" data-format="$0,0"></div>
				</div>
				<div class="divider"></div>
				<div class="buttons">
					<a href="javascript:void(0);" class="button grey open-add-client-dialog">Add New Client</a>
					<a href="javascript:void(0);" class="button grey open-add-client-dialog">Open a Ticket</a>
				</div>
			</div><!-- End of .bottom -->
			
		</aside><!-- End of sidebar -->

		<!-- Here goes the content. -->
		<section id="content" class="container_12 clearfix" data-sort=true>
			<ul class="stats not-on-phone">
				<li>
					<strong>61263</strong>
					<small>Total Visits</small>
					<span class=green>+26%</span>
				</li>
				<li>
					<strong>23</strong>
					<small>Orders</small>
					<span class=green>+16%</span>
				</li>
				<li>
					<strong>$2165.57</strong>
					<small>Total Volume</small>
					<span class=red>-8%</span>
				</li>
				<li>
					<strong>0</strong>
					<small>Overdue Tickets</small>
					<span>0%</span>
				</li>
				<li>
					<strong>7</strong>
					<small>Reported Bugs</small>
					<span class=red>+17%</span>
				</li>
			</ul><!-- End of ul.stats -->
			
			
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
							<tbody>
								<tr class="gradeX">
									<td>Trident</td>
									<td>52</td>
									<td class="center">
										<a href="#" class="button small grey tooltip" data-gravity=s title="Edit"><i class="icon-pencil"></i></a>
										<a href="#" class="button small grey tooltip" data-gravity=s title="Remove"><i class="icon-remove"></i></a>
										<a href="#" class="button small grey tooltip" data-gravity=s title="Suscriptores"><i class="icon-group"></i></a>
										<a href="#" class="button small grey tooltip" data-gravity=s title="Seguimientos"><i class="icon-comments-alt"></i></a>
										<a href="#" class="button small grey tooltip" data-gravity=s title="Boletines"><i class="icon-envelope-alt"></i></a>
										<a href="#" class="button small grey tooltip" data-gravity=s title="Macros"><i class="icon-bolt"></i></a>
										<a href="#" class="button small grey tooltip" data-gravity=s title="Duplicar"><i class="icon-retweet"></i></a>
									</td>
									
								</tr>
								<tr class="gradeX">
									<td>Trident</td>
									<td>52</td>
									<td class="center">
										<a href="#" class="button small grey tooltip" data-gravity=s title="Edit"><i class="icon-pencil"></i></a>
										<a href="#" class="button small grey tooltip" data-gravity=s title="Remove"><i class="icon-remove"></i></a>
									</td>
									
								</tr>
								<tr class="gradeX">
									<td>Trident</td>
									<td>52</td>
									<td class="center">
										<a href="#" class="button small grey tooltip" data-gravity=s title="Edit"><i class="icon-pencil"></i></a>
										<a href="#" class="button small grey tooltip" data-gravity=s title="Remove"><i class="icon-remove"></i></a>
									</td>
									
								</tr>
								<tr class="gradeX">
									<td>Trident</td>
									<td>52</td>
									<td class="center">
										<a href="#" class="button small grey tooltip" data-gravity=s title="Edit"><i class="icon-pencil"></i></a>
										<a href="#" class="button small grey tooltip" data-gravity=s title="Remove"><i class="icon-remove"></i></a>
									</td>
									
								</tr>
							<tr class="gradeX">
									<td>Trident</td>
									<td>52</td>
									<td class="center">
										<a href="#" class="button small grey tooltip" data-gravity=s title="Edit"><i class="icon-pencil"></i></a>
										<a href="#" class="button small grey tooltip" data-gravity=s title="Remove"><i class="icon-remove"></i></a>
									</td>
									
								</tr>
								<tr class="gradeX">
									<td>Trident</td>
									<td>52</td>
									<td class="center">
										<a href="#" class="button small grey tooltip" data-gravity=s title="Edit"><i class="icon-pencil"></i></a>
										<a href="#" class="button small grey tooltip" data-gravity=s title="Remove"><i class="icon-remove"></i></a>
									</td>
									
								</tr>
												
							</tbody>
						</table>
					</div><!-- End of .content -->
					
				</div><!-- End of .box -->
			</div><!-- End of .grid_12 -->
			
			
		</section><!-- End of #content -->
		
	</div><!-- End of #main -->
	
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

	
	<!-- Grab frameworks from CDNs -->
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.js"><\/script>')</script>
	
		<!-- Do the same with jQuery UI -->
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.js"></script>
	<script>window.jQuery.ui || document.write('<script src="js/libs/jquery-ui-1.8.21.js"><\/script>')</script>
	
		<!-- Do the same with Lo-Dash.js -->
	<!--[if gt IE 8]><!-->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/lodash.js/0.4.2/lodash.js"></script>
	<script>window._ || document.write('<script src="js/libs/lo-dash.js"><\/script>')</script>
	<!--<![endif]-->
	<!-- IE8 doesn't like lodash -->
	<!--[if lt IE 9]><script src="http://documentcloud.github.com/underscore/underscore.js"></script><![endif]-->
	
	
	
	<!-- scripts concatenated and minified via build script -->
	
	<!-- General Scripts -->
	<script src="<?php echo base_url();?>js/mango/js/mylibs/jquery.hashchange.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/jquery.idle-timer.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/jquery.plusplus.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/jquery.jgrowl.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/jquery.scrollTo.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/jquery.ui.touch-punch.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/jquery.ui.multiaccordion.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/number-functions.js"></script>
	
	<!-- Forms -->
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.autosize.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.checkbox.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.chosen.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.cleditor.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.colorpicker.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.ellipsis.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.fileinput.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.fullcalendar.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.maskedinput.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.mousewheel.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.placeholder.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.pwdmeter.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.ui.datetimepicker.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.ui.spinner.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/jquery.validate.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/uploader/plupload.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/uploader/plupload.html5.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/uploader/plupload.html4.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/uploader/plupload.flash.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/forms/uploader/jquery.plupload.queue/jquery.plupload.queue.js"></script>
		
	<!-- Charts -->
	<script src="<?php echo base_url();?>js/mango/js/mylibs/charts/jquery.flot.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/charts/jquery.flot.orderBars.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/charts/jquery.flot.pie.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/charts/jquery.flot.resize.js"></script>
	
	<!-- Explorer -->
	<script src="<?php echo base_url();?>js/mango/js/mylibs/explorer/jquery.elfinder.js"></script>
	
	<!-- Fullstats -->
	<script src="<?php echo base_url();?>js/mango/js/mylibs/fullstats/jquery.css-transform.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/fullstats/jquery.animate-css-rotate-scale.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/fullstats/jquery.sparkline.js"></script>
	
	<!-- Syntax Highlighter -->
	<script src="<?php echo base_url();?>js/mango/js/mylibs/syntaxhighlighter/shCore.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/syntaxhighlighter/shAutoloader.js"></script>
	
	<!-- Dynamic Tables -->
	<script src="<?php echo base_url();?>js/mango/js/mylibs/dynamic-tables/jquery.dataTables.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/dynamic-tables/jquery.dataTables.tableTools.zeroClipboard.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/dynamic-tables/jquery.dataTables.tableTools.js"></script>
	
	<!-- Gallery -->
	<script src="<?php echo base_url();?>js/mango/js/mylibs/gallery/jquery.fancybox.js"></script>
	
	<!-- Tooltips -->
	<script src="<?php echo base_url();?>js/mango/js/mylibs/tooltips/jquery.tipsy.js"></script>
	
	<!-- Your custom JS goes here -->
	<script src="<?php echo base_url();?>js/mango/js/app.js"></script>
	
	<script defer async src="https://ajax.googleapis.com/ajax/libs/webfont/1.0.28/webfont.js"></script>
	
	<!-- Essential polyfills -->
	<script src="<?php echo base_url();?>js/mango/js/mylibs/polyfills/modernizr-2.6.1.min.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/polyfills/respond.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/mylibs/polyfills/matchmedia.js"></script>
	<!--[if lt IE 9]><script src="js/mylibs/polyfills/selectivizr.js"></script><![endif]-->
	<!--[if lt IE 10]><script src="js/mylibs/polyfills/excanvas.js"></script><![endif]-->
	<!--[if lt IE 10]><script src="js/mylibs/polyfills/classlist.js"></script><![endif]-->
	
	<!-- Do not touch! -->
	<script src="<?php echo base_url();?>js/mango/js/mango.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/plugins.js"></script>
	<script src="<?php echo base_url();?>js/mango/js/script.js"></script>
	
	<!-- Spawn $$.loaded -->
	<script>
		$$.loaded();
	</script>
	
	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	   chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7 ]>
	<script defer src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

<!-- The Scripts -->
	<!-- ----------- -->
	
	
	<!-- JavaScript at the top (will be cached by browser) -->
	
	<!-- Load Webfont loader -->
	<script type="text/javascript">
		window.WebFontConfig = {
			google: { families: [ 'PT Sans:400,700' ] },
			active: function(){ $(window).trigger('fontsloaded') }
		};
	</script>
		<script>
	$$.ready(function() {
		$( "#dialog_message" ).dialog({
			autoOpen: false,
			width: 500,
			modal: true
		}).find('button').click(function(){
			$(this).parents('.ui-dialog-content').dialog('close');
		});
		
		$( ".open-message-dialog" ).click(function() {
			$( "#dialog_message" ).dialog( "open" );
			return false;
		});
	});
	</script>
		<script>
	$$.ready(function() {
		$( "#dialog_add_client" ).dialog({
			autoOpen: false,
			modal: true,
			width: 400,
			open: function(){ $(this).parent().css('overflow', 'visible'); $$.utils.forms.resize() }
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
	});
	</script>
	<!-- End of Message Dialog -->
	<!-- end scripts -->
</body>
</html>