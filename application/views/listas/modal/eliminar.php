
<link href="<?php echo base_url();?>css/bootstrap_.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {

	 $('#enviar').click(function(){
	    		
		$.get("<?php echo base_url() ?>index.php/listas/delete_lista" , $("form").serialize(), 
	        function(data){
	            var success = data.success;
	            //alert(success);
	            if( success == 'success'){
	            	parent.location.reload();
	            }else{
	              alert("No se actualizo");
	            }
	        }, 'json');
		
	    return false;
	});

	$('#cerrar').click(function(){
		parent.$.fancybox.close();
		return false;
	})
});

</script>
  <div class="modal-header">
    <h3>Eliminar Lista:</h3>
  </div>
  <div class="modal-body">

	<form class="form-horizontal">
	  <p> Está a punto de eliminar la lista: '<strong><?php echo $nombre_lista; ?></strong>'</p>
	  <p> ¿Está seguro que desea Continuar?</p>
		<input type="hidden" id="accion" name="accion" value="eliminar">
		<input type="hidden" id="id_lista" name="id_lista" value="<?php echo $id_lista;?>">
	</form>	

  </div>
  <div class="modal-footer">
  	<a id="cerrar" href="#" class="btn">Cerrar</a>
    <a id="enviar" href="#" class="btn btn-danger">Continuar</a>
  </div>
