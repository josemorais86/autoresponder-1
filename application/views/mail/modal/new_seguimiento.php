<HTML>
	<HEADER>
		<!-- Bootstrap core CSS -->
    	<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

		<script type='text/javascript' src='<?php echo base_url();?>js/ckeditor/ckeditor.js'></script>
	
	</HEADER>
	<BODY>
		<div class="modal-header">
		    <h3>Nuevo Seguimiento:</h3>
		</div>
			<div>
				
				<input type="hidden" id="accion" name="accion" value="crear">
  				<input type="hidden" id="id_lista" name="id_lista" value="<?php echo $id_lista; ?>">
  				
				<table class="table table-bordered table-hover new_seguimiento">
					<tbody>
						<tr>
							<th style="font-weight: bold; font-style: italic; font-size: 13px;">
								Nombre:
							</th>
							<td>
								<input id="nombre"  maxlength="210" size="80" type="texto" name="nombre" style="height: 30">
							</td>
						</tr>
						<tr>
							<th style="font-weight: bold; font-style: italic; font-size: 13px;">
								Remitente:
							</th>
							<td>
								<input id="rte"  maxlength="210" size="80" type="texto" name="rte" style="height: 30" >
							</td>
						</tr>
						<tr>	
							<th style="font-weight: bold; font-style: italic; font-size: 13px;">
								Asunto:
							</th>
							<td>	
								<input id="asunto" maxlength="210"  size="80" type="text" name="asunto" style="height: 30"/>
							</td>	
						</tr>
						
						<tr>
							<td colspan="2">
								<textarea cols='80' id='editor' name='editor' rows='10'></textarea>
							</td>
						</tr>
					    <tr>
					    	<th style="font-weight: bold; font-style: italic; font-size: 13px;">
					    		N° días desde Suscripción:
					    	</th>
					    	<td>
					    		<input id="dia" name="dia" type="text" style="width: 65" />
					    	</td>
					    </tr>		
					</tbody>
				</table>	
				

			</div>
				
		<div class="modal-footer">
		  	<a id="cerrar" href="#" class="btn">Cerrar</a>
		    <a id="enviar" href="#" class="btn btn-primary enviar">Programar</a>
		</div>

		</div>
	
		<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/ckeditor/adapters/jquery.js"></script>
	

		<script type='text/javascript'>
			$(document).ready(function()
			{
			
			$( 'textarea#editor' ).ckeditor();
					
			$('#enviar').click(function() {
  			  var validator = true;
			  var nombre = $('#nombre').val();
			  var rte = $('#rte').val();
			  var asunto = $('#asunto').val();
			  var editor = $('#editor').val();
			  var dia = $('#dia').val();
			  var id_lista = $('#id_lista').val();
			  var automatico = $('#automatico').val();
			  var accion = $('#accion').val();
			  var hora = -1;
			  var tipo = 1;
			 
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
					  $.get('<?php echo base_url() ?>index.php/mailing/new_mail' , {accion:accion, nombre:nombre, rte:rte, asunto:asunto, editor:editor, dia:dia, id_lista:id_lista, tipo:tipo}, 
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

				$('#cerrar').click(function(){
					parent.$.fancybox.close();
					return false;
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
			});
		</script>
	</BODY>
</HTML>