
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap_.min.css">
<!--<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.min.css">-->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {

 $('#enviar').click(function(){
     
	//var renombrar = $('#accion').val();
	var nombre_lista = $('#nombre_lista').val();
	
	$.get("<?php echo base_url() ?>index.php/listas/new_lista" , {id_user:<?php echo $id_user; ?>,nombre_lista:nombre_lista}, 
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
});
</script>
  <div class="modal-header">
    <h3>Nombre lista: </h3>
  </div>
  <div class="modal-body">

	<form class="form-horizontal">
	  <div id="ctrl-nombre" class="control-group">
	    <label class="control-label" for="inputEmail">Ingrese nuevo nombre</label>
	    <div class="controls">
	      <input name="nombre_lista" id="nombre_lista" type="text" />
	      <span id="help-nombre" class="help-inline"></span>
	    </div>
	  </div>
		<input type="hidden" id="accion" name="accion" value="crear">
	</form>	

  </div>
  <div class="modal-footer">
  	<a id="cerrar" href="#" class="btn">Cerrar</a>
    <a id="enviar" href="#" class="btn btn-primary">Guardar</a>
  </div>
