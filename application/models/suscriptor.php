<?php
Class Suscriptor extends CI_Model
{
 
 function array_lista_suscriptores($id_lista){

  $this-> db -> from('r_suscriptor');
  $this-> db -> where('r_lista_id_lista', $id_lista);

  $query = $this -> db -> get();
   
   if($query -> num_rows() > 0)
     {
       return $query->result();
     }
      else
     {
       return false;
  }
  /*
  $suscriptores = array();
   while ($fila = $db->next_record())
      {
        $suscriptores[]= array("nombre" => $fila["nombre"], "email" => $fila["email"], "prospecto_id" => $fila["fk_ws_prospecto"], "id_registro" => $fila["fk_ws_registro"] );
  
      }
    return $suscriptores;
  */

}

 function existe_suscriptor_lista($email, $id_lista)
  {
    $this -> db -> from('r_suscriptor');
    $this->db->where('email', $email);
    $this->db->where('r_lista_id_lista', $id_lista); 
    $query = $this -> db -> get();
   
   if($query -> num_rows() > 0)
     {
       return true;        
     }
      else
     {
       return false;
  }
} 

 function get_all($lista)
 {
   $this -> db -> select('id_suscriptor, nombre, email, registered');
   $this -> db -> from('r_suscriptor');
   $this->db->where('r_lista_id_lista', $lista); 
   $query = $this -> db -> get();
  
   if($query -> num_rows() > 0)
   {
     
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function get_suscriptor($pagination, $segment, $lista) 
 {
    $this->db->where('r_lista_id_lista', $lista);
    $this->db->order_by('id_suscriptor', 'asc');
    $this->db->limit($pagination, $segment);
    $query = $this->db->get('r_suscriptor')->result();

    //echo $this->db->last_query(); 
    return $query;

  }

 function cantidad_lista($lista)
 {
  $this->db->from('r_suscriptor');
  $this->db->where('r_lista_id_lista', $lista);
  
  return $this->db->count_all_results();
      
 }

 function save($suscriptor_data)
  { 
  
    if($this->db->insert('r_suscriptor',$suscriptor_data))
      {
        //$suscriptor_data['id_suscriptor']=$this->db->insert_id();
        return $this->db->insert_id();
      }
    else  
      return false;
  }

  function delete_suscriptor($id_suscriptor)
  {
    $this->db->where('id_suscriptor',$id_suscriptor);
    
    if($this->db->delete('r_suscriptor'))
      return true;
    else
      return false;
    }
  function eliminar_suscriptor_lista($EMAIL, $target)  
  {
    $this->db->where('email',$EMAIL);
    $this->db->where('r_lista_id_lista',$target);
    
    if($this->db->delete('r_suscriptor'))
      return true;
    else
      return false;
  } 
  function move_suscriptor($id_suscriptor, $id_lista)
  {
    
  $data = array('r_lista_id_lista' => $id_lista);
  $this->db->where('id_suscriptor', $id_suscriptor);
  $this->db->update('r_suscriptor',$data);
 
  }

  function copy_suscriptor($id_suscriptor, $usuario_id, $id_lista)
{
  $this->db->from('r_suscriptor');
  $this->db->where('id_suscriptor', $id_suscriptor);
  $fila = $this -> db -> get();

  $suscriptor = array("nombre" => $fila->row()->nombre, "email" => $fila->row()->email, "prospecto_id" => $fila->row()->fk_ws_prospecto, "id_registro" => $fila->row()->fk_registro_id, "registered" => $fila->row()->registered );
  
      if(!$suscriptor["prospecto_id"])
          $prospecto = "NULL";
        else
          $prospecto = $suscriptor["prospecto_id"];
        if(!$suscriptor["id_registro"])
          $referido = "NULL";
        else
          $referido = $suscriptor["id_registro"];

  
  $suscriptor_data=array(
    'nombre'=>$suscriptor["nombre"],
    'r_lista_id_lista'=>$id_lista,
    'email'=>$suscriptor["email"],
    'fk_ws_registro'=>$usuario_id,
    'registered'=>$suscriptor["registered"]
    );
  
  if($this->suscriptor->save($suscriptor_data))
    return TRUE;
  else
    return False; 
}

}
?>