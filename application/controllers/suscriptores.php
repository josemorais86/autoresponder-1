<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Suscriptores extends CI_Controller {

 function __construct()
 {
   parent::__construct();
  $this->load->model('suscriptor', '', TRUE);
  $this->load->library('pagination');
  $this->load->model('lista', '', TRUE);
 }

 function index($id_lista)
 {
    
    if($this->session->userdata('logged_in'))
   {
    /********************Variables Globales******************/
    $session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $data['id'] = $session_data['id'];
    $data["nombre_lista"] = $this->lista->get_nombre($id_lista);
    $data["cant_suscriptores"] = $this->suscriptor->cantidad_lista($id_lista); 
    /********************************************************/

    /********************PAGINACION*************************/
    $pagination = 7;
    $total_rows = $this->suscriptor->cantidad_lista($id_lista);
    $config['base_url'] = base_url().'index.php/suscriptores/index/'.$id_lista; 
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $pagination;
    $config['num_links'] = 9;
    $config['uri_segment'] = 4; 
    $config['next_link'] = 'Siguiente »';
    $config['prev_link'] = '« Anterior';
    $config['first_link'] = 'Primero';
    $config['last_link'] = 'Final';
    //$config['display_pages'] = FALSE;
    //echo $total_rows;
    $this->pagination->initialize($config);
    $data['results'] = $this->suscriptor->get_suscriptor($pagination, $this->uri->segment(4), $id_lista);
    
    /********************************************************/

    $this->load->view('suscriptores', $data);
   
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 public function new_lista_view($id_user)
 {
  $data["id_user"] = $id_user;
  $this->load->view('listas/modal/new_lista', $data);
 }
 
 public function mover_copiar_view($mc, $id_user, $id_suscriptor)
 {
    if($mc == 1)
    {
      $data["id_user"] = $id_user;
      $data["accion"] = "COPIAR";
      $data["listas"] = $this->lista->listas($id_user);
      $data["id_suscriptor"] = $id_suscriptor;
      $this->load->view('suscriptor/modal/mover_copiar', $data);
    }
    else
    {
      $data["id_user"] = $id_user;
      $data["accion"] = "MOVER";
      $data["listas"] = $this->lista->listas($id_user);
      $data["id_suscriptor"] = $id_suscriptor;
      $this->load->view('suscriptor/modal/mover_copiar', $data); 
    } 
 }

 public function mover_copiar()
 {
    if($this->input->get('accion', TRUE) == "COPIAR")
      {
        $this->suscriptor->copy_suscriptor($this->input->get('suscriptor', TRUE), $this->input->get('id_user', TRUE), $this->input->get('lista', TRUE));
        echo json_encode(array("success" => "success"));
      }
    else
      if($this->input->get('accion', TRUE) == "MOVER")
      {
        $this->suscriptor->move_suscriptor($this->input->get('suscriptor', TRUE), $this->input->get('lista', TRUE));
        echo json_encode(array("success" => "success"));
      }
      else  
        echo json_encode(array("success" => "error"));    
 }
 
 public function delete_suscriptor_view($id_suscriptor, $nombre_suscriptor=null)
 {
  $data['nombre_suscriptor'] = $nombre_suscriptor;
  $data['id_suscriptor'] = $id_suscriptor;

  $this->load->view('suscriptor/modal/eliminar', $data);
 }

 public function delete_suscriptor (){
  
  $id_suscriptor = $this->input->get('id_suscriptor', TRUE);
  if($this->suscriptor->delete_suscriptor($id_suscriptor))
    echo json_encode(array("success" => "success"));
  
}
  public function new_suscriptor (){
  
  $hoy = date("Y-m-d H:i:s");
  $suscriptor_data=array(
    'nombre'=>$this->input->get('nombre_suscriptor', TRUE),
    'lista_id_lista'=>$this->input->get('id_lista', TRUE),
    'email'=>$this->input->get('email_suscriptor', TRUE),
    'user_id_user'=>$this->input->get('id_user', TRUE),
    'registered'=>$hoy
    );

  if($this->suscriptor->save($suscriptor_data))
    echo json_encode(array("success" => "success"));
  
} 

}
?>