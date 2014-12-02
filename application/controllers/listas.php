<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listas extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('lista','',TRUE);
   $this->load->model('suscriptor', '', TRUE);
 }

 function index()
 {
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login');
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }

 }
public function name_lista_view($id_lista)
 {
  $data["lista"] = $this->lista->get_lista($id_lista);
  $this->load->view('listas/modal/nombre_lista', $data);
 }

public function name_lista (){
  
  $id_lista = $this->input->get('id_lista', TRUE);
  $lista_data=array(
    'nombre'=>$this->input->get('nombre_lista', TRUE),
    'nombre_creador'=>$this->input->get('nombre_creador', TRUE),
    'email_creador'=>$this->input->get('email_creador', TRUE),
    'reply_to'=>$this->input->get('reply_to', TRUE)
    );
  if($this->lista->update($id_lista, $lista_data))
    echo json_encode(array("success" => "success"));
  
} 

 public function new_lista_view($id_user)
 {
  $data["id_user"] = $id_user;
  $this->load->view('listas/modal/new_lista', $data);
 }

public function duplicar($id_user, $id_lista, $nombre_lista)
{
  $lista_data=array(
    'nombre'=>"copia_de_".$nombre_lista,
    'fk_ws_registro'=>$id_user
    );
  if($last_insert=$this->lista->save($lista_data))
  {
    $suscriptores = $this->suscriptor->array_lista_suscriptores($id_lista);
    $this->insert_suscriptor($suscriptores, $id_user, $last_insert);
  }
} 

public function insert_suscriptor($suscriptores, $usuario_id, $last_insert)
{
  foreach ($suscriptores as $suscriptor) 
  {
    $suscriptor_data=array(
    'nombre'=>$suscriptor->nombre,
    'r_lista_id_lista'=>$last_insert,
    'email'=>$suscriptor->email,
    'fk_ws_registro'=>$usuario_id,
    'registered'=>$suscriptor->registered
    );

  $this->suscriptor->save($suscriptor_data);
  }  
  
  redirect('home', 'refresh');
    
}

public function new_lista (){
  
  $lista_data=array(
    'nombre'=>$this->input->get('nombre_lista', TRUE),
    'fk_ws_registro'=>$this->input->get('id_user', TRUE)
    );
  if($this->lista->save($lista_data))
    echo json_encode(array("success" => "success"));
  
} 

public function delete_lista_view($id_lista, $nombre_lista=null)
 {
  $data['nombre_lista'] = $nombre_lista;
  $data['id_lista'] = $id_lista;

  $this->load->view('listas/modal/eliminar', $data);
 }

 public function delete_lista (){
  
  $id_lista = $this->input->get('id_lista', TRUE);
  if($this->lista->delete_lista($id_lista))
    echo json_encode(array("success" => "success"));
  
}

 public function data($user)
  {
   $this->load->library('form_validation');
    //query the database
   
   $result = $this->lista->listas($user);
   $cont=0;
   if($result)
   {
     $list_array = array();
     
     foreach($result as $row)
     {
       $suscriptores = $this->suscriptor->cantidad_lista($row->id_lista);
       $list_array[] = Array(
         'id_lista' => $row->id_lista,
         'nombre' => $row->nombre,
         'fk_ws_registro'=> $row->fk_ws_registro,
         'suscriptores' => $suscriptores
       );
      } 
       $data['listas'] = $list_array;

       $this->load->view('response/listas_content', $data);
    return TRUE;   
     }
     
   else
   {
     $this->form_validation->set_message('check_database', 'No existen listas en la Base de Datos');
     return false;
   }

    
  }

}
?>