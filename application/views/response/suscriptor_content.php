<?php
	
	foreach ($suscriptores as $suscriptor) {
    echo "<tr class='gradeX'>
        <td>".$suscriptor["id_suscriptor"]."</td>
        <td>".$suscriptor["nombre"]."</td>
        <td>".$suscriptor["email"]."</td>
        <td>
          <center>
          <span class='badge badge-info'>".$suscriptor["registered"]."</span>
          </center>
        </td>
        <td>
          <center>
          <a 
            class='edit_seguimiento btn btn-primary btn-small' 
            data-fancybox-type='iframe' 
            href='#'>
            <i class='icon-edit icon-white'></i> Editar 
          </a>
          <a 
            class='btn btn-primary btn-small duplicar' 
            href='#' 
            data-href='#'>
            <i class='icon-retweet icon-white'></i> Duplicar
          </a>
          <a 
            class='btn btn-danger btn-small invisible eliminar' 
            data-fancybox-type='iframe' 
            href='#'>
            <i class='icon-trash icon-white'></i> Eliminar</a>
           </center>
        </td>
  </tr>";
 
    }
   
 ?>
 <div id="pagination"><?=$this->pagination->create_links(); ?></div>