<?php
Class Macro extends CI_Model
{
 
 function existe_macro($id_lista)
  {
    $this -> db -> from('r_macro');
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
   $this -> db -> from('r_macro');
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

 function cantidad_macro($lista)
 {
  $this->db->from('r_macro');
  $this->db->where('r_lista_id_lista', $lista);
  
  return $this->db->count_all_results();
      
 }

 function save($macro_data)
  { 
  
    if($this->db->insert('r_macro',$macro_data))
      {
        $macro_data['id_macro']=$this->db->insert_id();
        return true;
      }
    else  
      return false;
  }

 function delete_macro($id_macro)
  {
    $this->db->where('id_macro',$id_macro);
    
    if($this->db->delete('r_macro'))
      return true;
    else
      return false;
    //  return $this->db->delete('r_macro');
  }

}
?>