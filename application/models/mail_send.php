<?php
Class Mail_send extends CI_Model
{

function seguimiento($id_lista, $dia)
{
  $this -> db -> from('mail');
  $this -> db -> where('tipo', 1);
  $this -> db -> where('lista_id_lista', $id_lista);
  $this -> db -> where('dia', $dia);

   $query = $this -> db -> get();

   if($query->num_rows()==1)
    {
      return $query->row()->id_mail;
    }

   else
   {
     return 0;
   } 
  
}

function get_boletines()
{
  $this -> db -> from('r_mail');
  $this -> db -> where('tipo', 0);
  $this -> db -> where('estado', 1); 
  
  $query = $this -> db -> get();

   if($query->num_rows()>0)
    {
      return $query->result();
    }

   else
   {
     return false;
   } 
}
function suscriptores_boletin($id_mail)
{
  
  $this -> db -> select('ws_registro.nombre, r_mail.remitente, r_suscriptor.email, r_mail.html, r_mail.asunto');
  $this -> db -> from('ws_registro');
  $this -> db -> from('r_mail');
  $this -> db -> join('r_suscriptor','r_suscriptor.r_lista_id_lista=r_mail.r_lista_id_lista');
  $this -> db -> where('r_mail.estado', 1);
  $this -> db -> where('r_mail.id_mail', $id_mail);

  $query = $this -> db -> get();

   if($query->num_rows()>0)
    {
      return $query->result();
    }

   else
   {
     return false;
   } 

}
/*
SELECT r_mail.html, ws_registro.nombre
FROM r_mail
JOIN r_lista ON r_mail.r_lista_id_lista = r_lista.id_lista
JOIN ws_registro ON r_lista.fk_ws_registro = ws_registro.registro_id
WHERE r_mail.id_mail =11
*/
function mail_info($id_mail)
{
  $this -> db -> select('r_mail.html, r_mail.asunto, r_mail.remitente, ws_registro.nombre');
  $this -> db -> from('r_mail');
  $this -> db -> join('r_lista','r_mail.r_lista_id_lista = r_lista.id_lista');
  $this -> db -> join('ws_registro','r_lista.fk_ws_registro = ws_registro.registro_id');
  $this -> db -> where('r_mail.estado', 1);
  $this -> db -> where('r_mail.id_mail', $id_mail);

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

function get_mail($id_mail)
{
  $this -> db -> from('mail');
  $this -> db -> where('id_mail', $id_mail);

  $query = $this -> db -> get();

   if($query -> num_rows() == 0)
   {
      return $query->row();
   }
   else
   {
     return false;
   }
}

function get_suscriptor_all()
 {
   $this -> db -> select('id_suscriptor, nombre, email, registered, lista_id_lista, user_id_user');
   $this -> db -> from('suscriptor');
   
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

 function save($mail_data)
  { 
  
    if($this->db->insert('mail',$mail_data))
      {
        $mail_data['id_mail']=$this->db->insert_id();
        return true;
      }
    else  
      return false;
  }
}
?>