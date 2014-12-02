<?php 
  $this->load->helper('html');
  include "home_partial/header.php";
  include "home_partial/menu.php";
?>

<div class="jumbotron">

<h2><?php echo $nombre_lista; ?> > Mis Suscriptores</h2>

<table class="table table-bordered table-striped table-hover" >
<tr>
  <th><center><a id="titulo" href="#">N°</a></center></th>
  <th><center><a id="titulo" href="#">Nombre</a></center></th>
  <th><center><a id="titulo" href="#">Mail</a></center></th>
  <th><center><a id="titulo" href="#">Registered</a></center></th>
  <th><center><a id="titulo" href="#">Opciones</a></center></th>
</tr>
<tbody id="contenido">
<?php  
  $cont=1;
  foreach($results as $result) { 
        echo "<tr class='gradeX'>
  <td>".$cont."</td>
  <td>".$result->nombre."</td>
  <td>".$result->email."</td>
  <td>
    <center>
    <span class='badge badge-info'>".$result->registered."</span>
    </center>
  </td>
  <td>
    <center>
    <a 
      class='edit_seguimiento btn btn-primary btn-small' 
      data-fancybox-type='iframe' 
      href='#'>
      <i class='icon-edit icon-white'></i> Detalles 
    </a>
    <a 
      class='btn btn-primary btn-small mover_copiar' 
      data-fancybox-type='iframe' 
      href='".base_url()."index.php/suscriptores/mover_copiar_view/1/".$id."/".$result->id_suscriptor."' 
      >
      <i class='icon-retweet icon-white'></i> Copiar
    </a>
    <a 
      class='btn btn-primary btn-small mover_copiar' 
      data-fancybox-type='iframe' 
      href='".base_url()."index.php/suscriptores/mover_copiar_view/0/".$id."/".$result->id_suscriptor."' 
      >
      <i class='icon-retweet icon-white'></i> Mover
    </a>
    <a 
      class='btn btn-danger btn-small invisible eliminar' 
      data-fancybox-type='iframe' 
      href='".base_url()."index.php/suscriptores/delete_suscriptor_view/".$result->id_suscriptor."/".$result->nombre."'>
      <i class='icon-trash icon-white'></i> Eliminar</a>
     </center>
  </td>
</tr>";
    $cont++;
}
 ?> 
      </tbody>
  
      <tr>
        <td colspan="6">Número de Registros: <?php echo $cant_suscriptores; ?></td>
      </tr>
      <tr>
        <td colspan="6">
          <div id="pagination"><?=$this->pagination->create_links(); ?></div>
        </td>
      </tr>  
      <tr>
        <td colspan="6">
          <a class="new_mail btn btn-primary btn-small" data-fancybox-type="iframe" >
            <span class="glyphicon glyphicon-plus"></span> Nuevo Suscriptor
          </a>&nbsp;
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
    
    $(".mover_copiar").fancybox({
         maxHeight : 190,
         width: 400,
         padding: 1
      });

    $(".eliminar").fancybox({
     maxHeight : 210,
     padding: 1
    });

    });
  </script>  
  </body>
</html>
