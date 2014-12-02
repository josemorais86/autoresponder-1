<?php
Class Lista extends CI_Model
{
 
 function listas($user)
 {
   //$this -> db -> select('id_lista, nombre');
   $this -> db -> from('r_lista');
   $this -> db -> where('fk_ws_registro', $user);
   
   $query = $this -> db -> get();

   if($query -> num_rows() > 1)
   {
    
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function get_lista($id_lista)
 {
   $this -> db -> from('r_lista');
   $this -> db -> where('id_lista', $id_lista);
   
   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
    
     return $query->result();
   }
   else
   {
     return false;
   }
 }

  function cantidad_lista($user)
 {
  $this->db->from('r_lista');
  $this->db->where('fk_ws_registro', $user);
  
  return $this->db->count_all_results();
      
 }

 function save($lista_data)
  { 
  
    if($this->db->insert('r_lista',$lista_data))
      {
        //$lista_data['id_lista']=$this->db->insert_id();
        return $this->db->insert_id();
      }
    else  
      return false;
  }
  function update($id_lista, $lista_data)
  {
    $this->db->where('id_lista', $id_lista);
    if($this->db->update('r_lista', $lista_data))
      return TRUE;
    else
      return FALSE;   
  }

  function delete_lista($id_lista)
  {
    $this->db->where('id_lista',$id_lista);
    
    if($this->db->delete('r_lista'))
      return true;
    else
      return false;
    }

   function get_nombre($id_lista)
 {
    $this -> db -> select('nombre');
    $this -> db -> from('r_lista');
    $this -> db ->where('id_lista', $id_lista); 
    $query = $this -> db -> get();

    return $query->row()->nombre;
 }  
  function get_email_creador($id_lista)
 {
    $this -> db -> select('email_creador');
    $this -> db -> from('r_lista');
    $this -> db ->where('id_lista', $id_lista); 
    $query = $this -> db -> get();

    return $query->row()->email_creador;
 }  
}
?>