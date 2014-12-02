<?php 
  include "home_partial/header.php";  
  include "home_partial/menu.php";
?>  

  <div class="jumbotron">
    <h2>Mis Listas</h2>
    
    <table class="table table-bordered table-striped">
    <tr>
        <th><a id="titulo" href="#">Nombre Lista</a></th>
        <th><a id="titulo" href="#">Generado</a></th>
        <th><a id="titulo" href="#">Suscriptores</a></th>
        <th><a id="titulo" href="#">Acciones</a></th>
    </tr>
    <tbody id="contenido"></tbody>
    <tr>
      <td colspan="4">Número de Registros: <?php echo $sum_listas; ?></td>
    </tr>
    <tr>
      <td colspan="4">
        
      <button class="new_lista btn btn-primary" name="Button_Update" data-fancybox-type="iframe" style="color: rgb(255,255,255)">Nueva Lista</button>
      </td>
    </tr>
  </table>
  </div> <!-- /jumbotron -->

</div> <!-- /container desde menu.php-->
    
<?php include "home_partial/footer_js.php";?>

<script type="text/javascript">
  $(document).ready(function(){
  
    $("#contenido").load("<?php echo base_url()."index.php/listas/data/$id"; ?>");
    
    $(".eliminar").fancybox({
           maxHeight : 210,
           padding: 1
        });
    
    $('.new_lista').on('click', function () {
      $.fancybox({
          type: 'iframe',
          href: '<?php echo base_url()."index.php/listas/new_lista_view/$id"; ?>',
          maxHeight : 190,
          padding: 1
      });
      return false;
    });
    $(".edit_nombre").fancybox({
      maxHeight : 370,
      padding: 1
    });
  });

</script>
  </body>
</html>
