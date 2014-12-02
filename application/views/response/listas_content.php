<?php
	
	foreach ($listas as $lista) {

		echo "<tr class='gradeX'>
    	<td><a class='edit_nombre' data-fancybox-type='iframe' href=".base_url()."index.php/listas/name_lista_view/".$lista["id_lista"].">".$lista["nombre"]."</a></td>
		<td>Manual</td>
		<td><center><span class='badge badge-info'>".$lista["suscriptores"]."</span></center></td>
		<td>
              <center>
                <div class='btn-group'>
                  <a class='btn btn-primary dropdown-toggle' data-toggle='dropdown' href='#'> Acciones <span class='caret'></span></a>
                  <ul class='dropdown-menu'>
                    <li>
                      <a href='".base_url()."index.php/suscriptores/index/".$lista["id_lista"]."' ccsserviceable='true'>Suscriptores </a>
                    </li>
                    <li>
                      <a href='".base_url()."index.php/mailing/index/".$lista["id_lista"]."/1' ccsserviceable='true'>Seguimientos </a>
                    </li>
                    <li>
                      <a href='".base_url()."index.php/forms/index/".$lista["id_lista"]."' ccsserviceable='true'>Formularios </a>
                    </li>
                    <li>
                      <a href='".base_url()."index.php/mailing/index/".$lista["id_lista"]."/0' ccsserviceable='true'>Boletines </a>
                      <a href='".base_url()."index.php/macros/index/".$lista["id_lista"]."' ccsserviceable='true'>Macros</a>
                    </li>
                    <li>
                      <a href='".base_url()."index.php/listas/duplicar/".$lista["fk_ws_registro"]."/".$lista["id_lista"]."/".$lista["nombre"]."' > Duplicar</a>
                    </li>
                    <li>
                      <a class='eliminar' data-fancybox-type='iframe' 
                      href='".base_url()."index.php/listas/delete_lista_view/".$lista["id_lista"]."/".$lista["nombre"]."'
                      > Eliminar</a>
                    </li>
                    <li>
                      <a href='controller/r_lista.php?accion=vaciar&amp;id_lista=".$lista["id_lista"]."' class='confirmation_empty'> Vaciar</a>
                    </li>
                  </ul>
                </div>
              </center>
              </td>
	</tr>";
    }
    
    
 ?>