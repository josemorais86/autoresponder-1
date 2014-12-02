<?php
	$cont = 1;
	foreach ($mails as $mail) {
  echo "<tr class='gradeX'>
      <td>".$cont."</td>
    <td>".$mail["remitente"]."</td>
    <td>".$mail["nombre"]."</td>
    <td><center>
      <span class='badge badge-info'>".$mail["time"]."</span>
      </center>
    </td>  
    <td>
        <center>
          
          ".$mail["button"]."
        
        </center>
      </td>
      <td>
          <div class='tabletools'>
          <a 
            class='open-edit-new_boletin-dialog'
                   data-fancybox-type='iframe' 
                   href='javascript:void(0);'
                   id-mail=".$mail["id_mail"]."
                   >
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
           </div>
        </td>
  </tr>";  
	$cont++;
    }
       
 ?>