<?php
Class Form extends CI_Model
{
 
  function existe_nombre($nombre)
  {
    $this -> db -> from('r_form');
    $this->db->where('nombre', $nombre); 
    $query = $this -> db -> get();
   
   //echo $this->db->last_query();
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
   $this -> db -> select('id_form, nombre');
   $this -> db -> from('r_form');
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

  function get_form($id_form)
  {
     $this -> db -> select('id_form, titulo, boton, r_lista_id_lista, url_return');
     $this -> db -> from('r_form');
     $this->db->where('id_form', $id_form); 
     $query = $this -> db -> get();
     
     if($query -> num_rows() > 0)
     {
        $data = array();
        $data['titulo'] = $query->row()->titulo;
        $data['boton'] = $query->row()->boton;
        $data['r_lista_id_lista'] = $query->row()->r_lista_id_lista;
        $data['url_return'] = $query->row()->url_return;

      return $data; 
       
     }
      else
     {
       return false;
  }
 }

 function cantidad_form($lista)
 {
  $this->db->from('r_form');
  $this->db->where('r_lista_id_lista', $lista);
  
  return $this->db->count_all_results();
      
 }

  function get_campos($id_form)
  {
    $this -> db -> from('r_campo AS c');
    $this->db->join('r_form_has_r_campo AS fc','fc.r_campo_id_campo=c.id_campo');
    $this->db->where('fc.r_form_id_form', $id_form);
    $query = $this -> db -> get();
   
   //echo $this->db->last_query();
   if($query -> num_rows() > 0)
   {
     return $query->result();
   }
    else
    {
     return false;
    }

  }
  
  function get_campo()
  {
    $this -> db -> from('r_campo');
    $this->db->order_by('id_campo', 'asc');
    $query = $this -> db -> get();
   
   //echo $this->db->last_query();
   if($query -> num_rows() > 0)
   {
     return $query->result();
   }
    else
    {
     return false;
    }

  } 

  function get_campos_form($id_form)
  {
    $this -> db -> from('r_form');
    $this -> db ->where('id_form',$id_form);
    $query = $this -> db -> get();
   
   //echo $this->db->last_query();
   if($query -> num_rows() > 0)
   {
     return $query->result();
   }
    else
    {
     return false;
    }
  }

  function get_campos_formulario($id_form)
  {
    $this -> db -> from('r_campo AS c');
    $this->db->join('r_form_has_r_campo AS fc','fc.r_campo_id_campo=c.id_campo');
    $this -> db ->where('fc.r_form_id_form', $id_form);
    $this->db->order_by('orden', 'asc');
    $query = $this -> db -> get();
   //echo $this->db->last_query();
   if($query -> num_rows() > 0)
   {
     return $query->result();
   }
    else
    {
     return false;
    }
  }

function save($form_data)
{ 
//$sql="INSERT INTO r_form (nombre, titulo, boton, ref, r_lista_id_lista, url_return) VALUES ('$pre$nombre_form', '$titulo', '$boton', '$ref', $id_lista, '$url_return')";
  if($this->db->insert('r_form',$form_data))
    {
      //$lista_data['id_form']=$this->db->insert_id();
      return $this->db->insert_id();
    }
  else  
    return false;
}
function save_campo($campo_form_data)
{
  if($this->db->insert('r_form_has_r_campo',$campo_form_data))
    {
      return $this->db->insert_id();
    }
  else  
    return false;

}

function delete_form($id_form)
  {
    $this->db->where('id_form',$id_form);
    
    if($this->db->delete('r_form'))
      return true;
    else
      return false;
    }

}
?>