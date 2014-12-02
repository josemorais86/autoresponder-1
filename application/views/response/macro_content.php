<?php
	
	foreach ($macros as $macro) 
  {
    echo "<tr class='gradeX'>
        <td>".$macro["id_macro"]."</td>
        <td>".$macro["nombre"]."</td>
        <td>".$macro["accion"]."</td>
        <td>".$macro["target"]."</td>
        <td>
          <center>
          <div class='tabletools'>
          <a 
            class='eliminar btn btn-primary btn-small' 
            data-fancybox-type='iframe' 
            href='".base_url()."index.php/macros/delete_macro_view/".$macro["id_macro"]."/".$macro["nombre"]."'>
            <i class='icon-edit icon-white'></i> Eliminar 
          </a>              
          </div>
           </center>
        </td>
  </tr>";
 
    }
     
 ?>