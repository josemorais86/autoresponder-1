<?php 
  include "home_partial/header.php";  
  include "home_partial/menu.php";
?>  
  <div class="jumbotron">
    <h2><?php echo $nombre_lista; ?> > Mis Macros</h2>
    
    <table class="table table-bordered table-striped">
  <tr>
      <th><a id="titulo" href="#">ID</a></th>
      <th><a id="titulo" href="#">Nombre Macro</a></th>
      <th><a id="titulo" href="#">Acción</a></th>
      <th><a id="titulo" href="#">Target</a></th>
      <th><a id="titulo" href="#">Acciones</a></th>
  </tr>
  <tbody id="contenido"></tbody>

  <tr>
    <td colspan="5">Número de Registros: <?php echo $sum_macros; ?></td>
  </tr>

  <tr>
    <td colspan="5">
    <a class="new_macro btn btn-primary btn-small" data-fancybox-type='iframe' href='<?php echo base_url()."index.php/macros/new_macro_view/$id_lista/$id";?>' ><i class='icon-plus icon-white'></i> Nuevo Macro</a>  

    <a href="<?php echo base_url()."index.php/home";?>" id="volver" class="btn">
        <span class="glyphicon glyphicon-home"></span> Volver a mis Listas
      </a>
    </td>
  </tr>
</table>
  </div> <!-- /jumbotron -->

</div> <!-- /container -->
<?php include "home_partial/footer_js.php";?>
  <script type="text/javascript">
    $(document).ready(function(){
    
    $("#contenido").load("<?php echo base_url()."index.php/macros/data/$id_lista"; ?>");
    
    $('.new_macro_').on('click', function () {
      $.fancybox({
          type: 'iframe',
          href: 'view/r_macro/modal/crear_macro.php?id_lista=<?php echo $id_lista; ?>',
          maxWidth  : 800,
          maxHeight : 600,
          fitToView : false,
          width   : '30%',
          height    : '10%',
          autoSize  : false,
          closeClick  : false,
          openEffect  : 'none',
          closeEffect : 'none',
      });
    });    

    $(".eliminar").fancybox({
           maxHeight : 210,
           padding: 1
        });

    $('.new_macro').fancybox({
          fitToView : false,
          width   : '60%',
          height    : '46%',
          autoSize  : false,
          closeClick  : false,
          openEffect  : 'none',
          closeEffect : 'none'

      }); 
  });
</script>
  </body>
</html>
