<link href="<?php echo base_url();?>css/bootstrap_.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

  <div class="modal-header">
    <h3>Codigo Fuente:</h3>
  </div>
  <div class="modal-body">
  		<code id="fuente"></code>
	</div>
  <div class="modal-footer">
  	<a id="copiar" href="#" class="btn">Copiar</a>
    <a id="cerrar" href="#" class="btn btn-danger">Cerrar</a>
  </div>
<script type="text/javascript">  
$("#fuente").load("<?php echo base_url()."index.php/forms/genera_form/$id_form/$id_user"; ?>");
$('#cerrar').click(function(){
    parent.$.fancybox.close();
    return false;
  })
</script>