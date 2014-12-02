<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Macros extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('macro','',TRUE);
   $this->load->model('lista','',TRUE);
  }

 function index($id_lista)
 {
 if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['id'] = $session_data['id'];
     $data["id_lista"] = $id_lista;
     $data["nombre_lista"] = $this->lista->get_nombre($id_lista);
     $data['sum_macros'] = $this->macro->cantidad_macro($id_lista);
     $this->load->view('macros', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 public function new_macro_view($id_lista, $id_user)
 {
  $listas = $this->lista->listas($id_user);
  $data["id_lista"] = $id_lista;
  $data["listas"] = $listas;
  $this->load->view('macro/modal/crear_macro', $data);
 }

 public function delete_macro_view($id_macro, $nombre_macro)
 {
  $data['nombre_macro'] = $nombre_macro;
  $data['id_macro'] = $id_macro;

  $this->load->view('macro/modal/eliminar', $data);
 }

public function new_macro (){
  
  $macro_data=array(
    'nombre'=>$this->input->get('nombre', TRUE),
    'accion'=>$this->input->get('action', TRUE),
    'target'=>$this->input->get('target', TRUE),
    'r_lista_id_lista'=>$this->input->get('id_lista', TRUE)
    );
  if($this->macro->save($macro_data))
    echo json_encode(array("success" => "success"));
  
}

public function delete_macro (){
  
  $id_macro = $this->input->get('id_macro', TRUE);
  if($this->macro->delete_macro($id_macro))
    echo json_encode(array("success" => "success"));
  
} 

 public function data($lista)
  {
     
   $result = $this->macro->get_all($lista);
   //$sum = $this->macro->cantidad_macro($row->id_lista);

   if($result)
   {
     $macro_array = array();
     
     foreach($result as $row)
     {
      $macro_array[] = Array(
         'id_macro' => $row->id_macro,
         'nombre' => $row->nombre,
         'accion' => $row->accion,
         'target' => $row->target         
       );
      } 
       $data['macros'] = $macro_array;

       $this->load->view('response/macro_content', $data);
    return TRUE;   
     }
    else
   {
     //$this->form_validation->set_message('check_database', 'No existen Macros en la Base de Datos');
     return false;
   }

    
  }

}
?>