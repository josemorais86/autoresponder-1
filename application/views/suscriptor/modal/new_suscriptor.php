<div style="display: none;" id="dialog_add_suscriptor" title="Crear Nuevo Suscriptor">
		<form action="" class="full validate">
			<div class="row">
				<label for="lista">
					<strong>E-Mail:</strong>
				</label>
				<div>
					<input class="required" type=text name="email_suscriptor" id="email_suscriptor" />
				</div>
				<label for="p1_firstname">
					<strong>Nombre:</strong>
				</label>
				<div>
					<input type="text" name="nombre_suscriptor" id="nombre_suscriptor" />
				</div>
				<label for="settings-interval">
					<strong>Lista:</strong> 
				</label>
				<div>	
					<select id="lista_select" style="display:run-in" placeholder="Elige una Lista">
					<?php 
						foreach ($listas_select as $lista_select)
							echo "<option value='".$lista_select->id_lista."'>".$lista_select->nombre."</option>\n";
					?>						
					</select>
				</div>
			</div>
		<br>
		</form>
		<div class="actions">
			<div class="left">
				<button class="grey cancel">Cancel</button>
			</div>
			<div class="right">
				<button id="save_suscriptor" >Crear Suscriptor</button>
			</div>
		</div>
	</div>
