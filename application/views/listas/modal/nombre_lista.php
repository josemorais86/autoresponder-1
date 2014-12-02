<link href="<?php echo base_url();?>css/bootstrap_.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {

	 $('#enviar').click(function(){
	     
		$.get("<?php echo base_url() ?>index.php/listas/name_lista" , $("form").serialize(), 
	        function(data){
	            var success = data.success;
	            if( success == 'success'){
	               parent.document.location.reload();
	            }else if(success == 'error'){
	            	$('.control-group').removeClass('error, success, warning');
	            	$('#ctrl-nombre').addClass('error');
	            	$('#help-nombre').html(data.text);
	            }else{
	              alert("No se actualizo");
	            }
	        }, 'json');
		//parent.document.location.reload();
	    //parent.jQuery.fancybox.close();
	    return false;
	});

	$('#cerrar').click(function(){
		parent.$.fancybox.close();
		return false;
	})
});

</script>
  <div class="modal-header">
    <h3>Cambiar nombre:</h3>
  </div>
  <div class="modal-body">

	<form class="form-horizontal">
		<!-- Nombre -->
		<div id="ctrl-nombre" class="control-group">
			<label class="control-label" for="inputEmail">Nombre de la lista</label>
			<div class="controls">
				<input name="nombre_lista" id="nombre_lista" value="<?php echo $lista[0]->nombre; ?>" type="text" />
				<span id="help-nombre" class="help-inline"></span>
			</div>
		</div>
		<!-- nombre creador -->
		<div id="ctrl-nombre" class="control-group">
			<label class="control-label" for="inputEmail">Nombre del creador</label>
			<div class="controls">
				<input name="nombre_creador" id="nombre_creador" value="<?php echo $lista[0]->nombre_creador; ?>" type="text" />
				<span id="help-nombre" class="help-inline"></span>
			</div>
		</div>
		<!-- email creador -->
		<div id="ctrl-nombre" class="control-group">
			<label class="control-label" for="inputEmail">Email del creador</label>
			<div class="controls">
				<input name="email_creador" id="email_creador" value="<?php echo $lista[0]->email_creador; ?>" type="text" />
				<span id="help-nombre" class="help-inline"></span>
			</div>
		</div>
		<!-- reply-to -->
		<div id="ctrl-nombre" class="control-group">
			<label class="control-label" for="inputEmail">Reply To</label>
			<div class="controls">
				<input name="reply_to" id="reply_to" value="<?php echo $lista[0]->reply_to; ?>" type="text" />
				<span id="help-nombre" class="help-inline"></span>
			</div>
		</div>
		<input type="hidden" id="id_lista" name="id_lista" value="<?php echo $lista[0]->id_lista;?>">
	</form>	

  </div>
  <div class="modal-footer">
  	<a id="cerrar" href="#" class="btn">Cerrar</a>
    <a id="enviar" href="#" class="btn btn-primary">Guardar</a>
  </div>
