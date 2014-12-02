<?php 
  $this->load->helper('html');
  include "home_partial/header.php";
  include "home_partial/menu.php";
?>
  <div class="jumbotron">
    <h2><?php echo $nombre_lista; ?> > Mis <?php echo $titulo; ?></h2>
    
    <table class="table table-bordered table-striped">
  <tr>
      <th><center><a id="titulo" href="#">N°</a></center></th>
      <th><center><a id="titulo" href="#">Remitente</a></center></th>
      <th><center><a id="titulo" href="#">Nombre</a></center></th>
      <th><center><a id="titulo" href="#"><?php echo $dia; ?></a></center></th>
      <th><center><a id="titulo" href="#">Activo/Inactivo</a></center></th>
      <th><center><a id="titulo" href="#">Opciones</a></center></th>
  </tr>
  <tbody id="contenido"></tbody>

  <tr>
    <td colspan="6">Número de Registros: <?php echo $cantidad_lista;?></td>
  </tr>

  <tr>
    <td colspan="6">
      <a class="btn btn-primary btn-small" href="<?php echo base_url()."index.php/mailing/".$controller."/$id_lista";?>" >
        <span class="glyphicon glyphicon-plus"></span> Nuevo <?php echo $boton; ?>
      </a>&nbsp;
      <a href="<?php echo base_url()."index.php/home";?>" id="volver" class="btn">
        <span class="glyphicon glyphicon-home"></span> Volver a mis Listas
      </a>
    </td>
  </tr>
</table>
  </div> <!-- /jumbotron -->

    </div> <!-- /container -->
<?php include "home_partial/footer_js.php";?>    <script type="text/javascript">
  $(document).ready(function(){
  
  $("#contenido").load("<?php echo base_url()."index.php/mailing/data/$id_lista/$tipo" ?>");

  $('.new_mail').on('click', function () {
    $.fancybox({
        
        type: 'iframe',
        href: '<?php echo base_url()."index.php/mailing/$controller/$id_lista"; ?>',
        width   : '72%',
        height    : '99%',
    
    });
    return false;
});
  setTimeout(function()
    {
            
      $('.estado').click(function(){
        $(this).toggleClass("active");
        var act = $(this).attr('data-active');
        if(act == 'activate'){
          $(this).attr('data-active', 'deactivate');
          $(this).html('<span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> Inactivo');
        } 
        else{
          $(this).attr('data-active', 'activate');
          $(this).html('<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Activo');
        }
        
        var ref = $(this).attr('data-href');
        $.get(ref , 
          function(data){

          var success = data.success;
          if( success == 'success'){

          }else{
            alert("No se actualizo");
          }
        }, 'json');
        return false;
      });
    },200);
});
</script>
  </body>
</html>
