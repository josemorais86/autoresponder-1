<html>
<head>
	<link href="<?php echo base_url();?>css/bootstrap_.min.css" rel="stylesheet">
	<script src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">
$(document).ready(function() {

 $('#enviar').click(function(){
   	
	$.get("<?php echo base_url() ?>index.php/suscriptores/mover_copiar" , $("form").serialize(), 
        function(data){
        	//alert(JSON.stringify(data));
            var success = data.success;
            if( success == 'success'){
               parent.document.location.reload();
                
            }else{
              alert("No se actualizo");
            }
        }, 'json');
});
 	$('#cerrar').click(function(){
		parent.$.fancybox.close();
		return false;
	})
});
</script>
	<body>
		<div class="modal-header">
    		<center>	
    			<h3><?php echo $accion; ?> A LISTA</h3>
  			</center>
  		</div>
		<div class="modal-body">
		<form class="form-horizontal">
			<input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>">
			<input type="hidden" id="suscriptor" name="suscriptor" value="<?php echo $id_suscriptor;?>">
			<input type="hidden" id="id_user" name="id_user" value="<?php echo $id_user;?>">
			<center>	
				<select name="lista" id="lista">
					<?php 
						foreach ($listas as $lista) {
							echo "<option value='".$lista->id_lista."'>".$lista->nombre."</option>";	
						}
					?>
								
				</select>
			</center>
		</form>
	</div>
	<div class="modal-footer">
	  	<center>
		  	<a id="cerrar" href="#" class="btn">Cerrar</a>
		    <a id="enviar" href="#" class="btn btn-danger">Continuar</a>
	    </center>
	</div>
	</body>
</html>