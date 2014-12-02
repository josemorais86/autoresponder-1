<!-- The lock screen -->
	<div id="lock-screen" title="Screen Locked">
		
	<a href="login.html" class="header right button grey flat">Logout</a>
		

		<p>Debido a inactividad en esta sesión, tu cuenta ha sido temporalmente cerrada.</p>
		<p>Para desbloquear tu cuenta simplemente desplaza el botón e ingresa tu contraseña.</p>
		
		<div class="actions">
			<div id="slide_to_unlock">
				<img src="<?php echo base_url();?>img/elements/slide-unlock/lock-slider.png" alt="slide me">
				<span>Desplaza para Desbloquear</span>
			</div>
			<form action="#" method="GET">
				<input type="password" name="pwd" id="pwd" placeholder="Ingresa tu contraseña aquí..." autocorrect="off" autocapitalize="off"> <input type="submit" name=send value="Unlock" disabled> <input type="reset" value="X">
			</form>
		</div><!-- End of .actions -->
		
	</div><!-- End of lock screen -->