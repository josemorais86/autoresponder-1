<?php
	$cont=1;
	foreach ($forms as $form) 
  {
    echo "<tr class='gradeX'>
        <td>".$cont."</td>
        <td>".$form["nombre"]."</td>
        <td>
          <center>
          <div class='tabletools'>
          <a 
            class='edit_seguimiento btn btn-primary btn-small' 
            data-fancybox-type='iframe' 
            href='".base_url()."index.php/forms/edit_form_view/".$form["id_form"]."'>
            <i class='icon-edit icon-white'></i> Editar 
          </a>
          <a 
            class='btn btn-primary btn-small duplicar' 
            href='#' 
            data-href='#'>
            <i class='icon-retweet icon-white'></i> Duplicar
          </a>
          <a class='btn btn-primary btn-small show_code' 
            data-fancybox-type='iframe' 
            href='".base_url()."index.php/forms/source_code_view/".$form["id_form"]."'>
            <i class='icon-retweet icon-white'></i> Codigo Fuente
          </a>
          <a class='btn btn-danger btn-small invisible eliminar' 
             data-fancybox-type='iframe' 
             href='".base_url()."index.php/forms/delete_form_view/".$form["id_form"]."/".$form["nombre"]."'
             <i class='icon-trash icon-white'></i> Eliminar
          </a>
          </div>
           </center>
        </td>
  </tr>";
  $cont++;
    }
     
 ?>