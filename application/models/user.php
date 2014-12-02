<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('registro_id, user_login, user_password, user_email');
   $this -> db -> from('ws_registro');
   $this -> db -> where('user_login', $username);
   $this -> db -> where('user_password', $password);
   $this -> db -> limit(1);

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

 function user_info($id_user)
{
  $this -> db -> select('nombre', 'user_email');
  $this -> db -> from('ws_registro');
  $this -> db -> where('registro_id', $id_user);

  $query = $this -> db -> get();

  if($query->num_rows()==1)
    {
      $data = array();
      $data['nombre'] = $query->row()->nombre;
      $data['mail'] = $query->row()->mail;
      
      return $data;
    }

   else
   {
     return false;
   } 

}
}
?>
