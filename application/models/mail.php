<?php
Class Mail extends CI_Model
{
 
 function get_all($lista, $tipo)
 {
   $this -> db -> select('id_mail, nombre, remitente, dia, estado, fecha, hora');
   $this -> db -> from('r_mail');
   $this -> db -> where('r_lista_id_lista', $lista);
   $this -> db -> where('tipo', $tipo);

   $query = $this -> db -> get();

   if($query -> num_rows() > 0)
   {
     //print_r($query->result());
     return $query->result();
   }
   else
   {
     return false;
   }
 }

function existe_mail_dia_0($id_lista)
{
  /*SELECT r_mail.id_mail, r_mail.nombre, r_lista.fk_ws_registro 
  FROM r_mail JOIN r_lista on r_mail.r_lista_id_lista = r_lista.id_lista WHERE r_mail.r_lista_id_lista = 28*/
  $this -> db -> select('r_mail.id_mail, r_mail.nombre, r_lista.fk_ws_registro');
  $this -> db -> from('r_mail');
  $this -> db ->join('r_lista','r_lista.id_lista = r_mail.r_lista_id_lista');
  $this -> db -> where('r_lista_id_lista', $id_lista);
  $this -> db -> where('estado', 1);
  $this -> db -> where('dia', 0);

   $query = $this -> db -> get();
   
   //echo $this->db->last_query();
   if($query -> num_rows() > 0)
     {
        $data = array();
        $data['id_usuario'] = $query->row()->fk_ws_registro;
        $data['id_seguimiento'] = $query->row()->id_mail;

      return $data; 
       
     }
   else
   {
     return false;
   }

}
function get_mail($id_mail)
 {
   $this -> db -> select('id_mail, nombre, asunto, html, remitente, dia, estado, fecha, hora, lista_id_lista');
   $this -> db -> from('r_mail');
   $this -> db -> where('id_mail', $id_mail);
   
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

  function cantidad_mail($lista, $tipo)
 {
  $this->db->from('r_mail');
  $this->db->where('r_lista_id_lista', $lista);
  $this->db->where('tipo', $tipo);
  
  return $this->db->count_all_results();
      
 }

 function save($mail_data)
  { 
  
    if($this->db->insert('r_mail',$mail_data))
      {
        $mail_data['id_mail']=$this->db->insert_id();
        return true;
      }
    else  
      return false;
  }

 function state_change($estado, $id_mail)
 {
  //$sql="UPDATE r_mail  SET estado=$new_estado WHERE id_mail = $id_mail";
    $data = array('estado' => $estado);

    $this->db->where('id_mail', $id_mail);
    return $this->db->update('r_mail', $data); 

 } 

}
?>