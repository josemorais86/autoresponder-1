<html>
<head>

<link href="<?php echo base_url();?>css/bootstrap_.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

</head>
<script type="text/javascript">
$(document).ready(function() {

 $('#enviar').click(function(){
     
	var validator = true;
	var action = $('#action').val();
	var id_lista = $('#id_lista').val();
	var target = $('#target').val();
	var nombre = $('#nombre').val();
	
	if(nombre == '')
	    {
        	alert("Ingrese Nombre");
        	$( "#nombre" ).focus();
        	validator = false;
        	return false;
      	}

	if(validator == true)
	{

	$.get("<?php echo base_url() ?>index.php/macros/new_macro" , {nombre:nombre, id_lista:id_lista, target:target, action:action}, 
        function(data){
        	//alert(JSON.stringify(data));
            var success = data.success;
            if( success == 'success'){
               parent.document.location.reload();
                
            }else{
              alert("No se actualizo");
            }
        }, 'json');
	}
});
	 $('#cerrar').click(function(){
			parent.$.fancybox.close();
			return false;
		})
	});
</script>
	<body>
	  <div class="modal-header">
    	<h3>Crear Macro:</h3>
  	  </div>
  	   <div class="modal-body">

		<input type="hidden" id="id_lista" name="id_lista" value="<?php echo $id_lista;?>">
		<div align="center">
		Nombre Macro: <input id="nombre" name="nombre" type="text" />
		</br>Acción: 
		<select class="form-control" name="action" id="action">
			<option value='1'>AGREGAR</option>
			<option value='0'>ELIMINAR</option>
		</select>
		</br>Target: 
			
		<select class="form-control" name="target" id="target">
			<option value = "0">Prospectos</option>
			<?php 
				foreach ($listas as $lista) {
					
					echo "<option value='".$lista->id_lista."'>".$lista->nombre."</option>";		
				}
					
			?>
						
		</select>
	</br>
</div>
</div>  
  <div class="modal-footer">
  	<a id="cerrar" href="#" class="btn">Cerrar</a>
    <a id="enviar" href="#" class="btn btn-danger">Programar</a>
  </div>
	</body>
</html>