<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailing extends CI_Controller {

  protected $session_data;

 function __construct()
 {
    parent::__construct();
    $this->load->model('mail','',TRUE);
    $this->session_data = $this->session->userdata('logged_in');
    $this->load->model('lista', '', TRUE);    
 }

 function index($id_lista, $tipo)
 {
   if($this->session->userdata('logged_in'))
   {
     $data['id'] = $this->session_data['id'];
     $data['username'] = $this->session_data['username'];
     $data['id_lista'] = $id_lista;
     $data['tipo'] = $tipo;
     $data["nombre_lista"] = $this->lista->get_nombre($id_lista);
     $data["cantidad_lista"]=$this->mail->cantidad_mail($id_lista, $tipo);
     
    if($tipo == 1)
    {
      $titulo = "Seguimientos";
      $controller = "new_mailing_view";
      $boton = "Seguimiento";
      $dia = "Día";
    }
    else
    {
      $titulo =  "Boletines";
      $controller = "new_boletin_view";
      $boton = "Boletin";
      $dia = "Comienza en:";
    }
    $data['titulo'] = $titulo;
    $data['controller'] = $controller;
    $data['boton'] = $boton;
    $data['dia'] = $dia;

     $this->load->view('mailing', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
   
 }

public function new_mailing_view($id_lista)
 {
  $this->load->helper('form');
  $this->load->library('form_validation');

  $data = array();
  $data["id_lista"] = $id_lista;
  $data['id'] = $this->session_data['id'];
  $data['username'] = $this->session_data['username'];
  
  if($this->lista->get_email_creador($id_lista))
    $data['email_creador'] = $this->lista->get_email_creador($id_lista);
  else
    $data['email_creador'] = $this->session_data['user_email'];

  $this->form_validation->set_rules('nombre', 'Nombre Seguimiento', 'required');
  $this->form_validation->set_rules('rte', 'Remitente', 'required');
  $this->form_validation->set_rules('asunto', 'Asunto', 'required');
  $this->form_validation->set_rules('editor', 'Contenido Seguimiento', 'required');
  $this->form_validation->set_rules('dia', 'N° de días desde Suscripción', 'required');

  if ($this->form_validation->run() == FALSE)
  {
      $this->load->view('mail/new_seguimiento', $data);
  }
  else
  {
      $this->new_mail();
  }
       
 }

public function new_boletin_view($id_lista)
{
  $this->load->helper('form');
  $this->load->library('form_validation');

  $data = array();
  $data["id_lista"] = $id_lista;
  $data['id'] = $this->session_data['id'];
  $data['username'] = $this->session_data['username'];

  $this->form_validation->set_rules('nombre', 'Nombre Seguimiento', 'required');
  $this->form_validation->set_rules('rte', 'Remitente', 'required');
  $this->form_validation->set_rules('asunto', 'Asunto', 'required');
  $this->form_validation->set_rules('editor', 'Contenido Seguimiento', 'required');
  $this->form_validation->set_rules('dia', 'N° de días desde Suscripción', 'required');

  if ($this->form_validation->run() == FALSE)
  {
      $this->load->view('mail/new_boletin', $data);
  }
  else
  {
      $this->new_mail();
  }
}

public function new_mail(){
        
    $fecha = $this->input->post('fecha', TRUE);
    
    if($fecha)
      $fecha = date('d-m-Y');
    else
      $fecha = "";
      //$fecha = date('Y-m-d');

    
    $mail_data=array(
    'nombre'=>$this->input->post('nombre', TRUE),
    'remitente'=>$this->input->post('rte', TRUE),
    'dia'=>$this->input->post('dia', TRUE),
    'asunto'=>$this->input->post('asunto', TRUE),
    'html'=>$this->input->post('editor', TRUE),
    'fecha'=> $fecha,
    'hora'=> $this->input->post('hora', TRUE),
    'tipo'=> $this->input->post('tipo', TRUE),
    'r_lista_id_lista'=> $this->input->post('id_lista', TRUE)    
    );

  if($this->mail->save($mail_data))
    echo json_encode(array("success" => "success"));
  
} 
 function _restarFechas($fecha1){

$fecha2 = date('d-m-Y');
//separamos fecha 2
 
$ano1 = substr($fecha1, 6, 4);
$mes1 = substr($fecha1, 3, 2);
$dia1 = substr($fecha1, 0, 2);
echo "año:".$ano1." mes:".$mes1." dia:".$dia1; 
//separamos fecha 2
 
$ano2 = substr($fecha2, 6, 4);
$mes2 = substr($fecha2, 3, 2);
$dia2 = substr($fecha2, 0, 2);
echo "año:".$ano2." mes:".$mes2." dia:".$dia2;

$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
$timestamp2 = mktime(0,0,0,$mes2,$dia2,$ano2);
 
$resta = $timestamp1 - $timestamp2;
 
$dias = $resta / (60 * 60 * 24);

$resultado_final = floor($dias);
 
return $resultado_final;
}
 
 function _quedan($fecha, $hora)
 {
  
  $hora_actual = date("H");//día de 24
  $horas_faltantes = $hora_actual - $hora;
  $dias_faltantes = $this->_restarFechas($fecha);
  
  if($horas_faltantes > 1)
    $s1 = "s";
  else
    $s1 = "";

  if($dias_faltantes > 1)
    $s2 = "s";
  else
    $s2 = "";

  if($dias_faltantes < 0)
    $retorno = "0 días";
  else
   $retorno = $dias_faltantes." dia".$s2." ".$horas_faltantes." hora".$s1;

  return $retorno;

 }

 function print_button($estado, $id_mail){
  
  $retorno = "<button type='button' class='btn btn-primary estado active' data-active='activate' data-toggle='button' data-href='".base_url()."index.php/mailing/cambiar_estado/$estado/$id_mail'><span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'></span> Activo</button>";
  //$retorno = "<a class='estado' href='#' >Activo</a>";
  if($estado == 0)
   $retorno = "<button type='button' class='btn btn-primary estado' data-active='deactivate' data-toggle='button' data-href='".base_url()."index.php/mailing/cambiar_estado/$estado/$id_mail'><span class='glyphicon glyphicon-thumbs-down' aria-hidden='true'></span> Inactivo</button>";
   //$retorno = "<a class='estado' href='#' data-href='controller/r_mail.php?id_lista=$id_lista&accion=cambiar_estado&estado=$estado&id_mail=$id_mail'>Inactivo</a>";
  
  return $retorno;
}

function cambiar_estado($estado, $id_mail)
{

  $new_estado = 0;
 
  if($estado == 0)
    $new_estado = 1;
  
  if($this->mail->state_change($new_estado, $id_mail))
    echo json_encode(array("success" => "success"));
}

 function dialog_edit_boletin($id_mail)
 {
    $boletin = $this->mail->get_mail($id_mail);
    
    if($boletin)
    {
    
      $data["nombre"]=$boletin[0]->nombre;
      $data["fecha"]=$boletin[0]->fecha;
      $data["asunto"]=$boletin[0]->asunto;
      $data["remitente"]=$boletin[0]->remitente;
      $data["lista_id_lista"]=$boletin[0]->lista_id_lista;
      $data["html"] = $boletin[0]->html;//$boletin->html; 
      $this->load->view('response/edit_boletin_content', $data);
    
    return TRUE;
    }
    else
    return FALSE;
 }

 function data($lista, $tipo)
  {
    //query the database
   $result = $this->mail->get_all($lista, $tipo);
   
    if($result)
   {
     $mail_array = array();
     
     foreach($result as $row)
     {
      $button = $this->print_button($row->estado, $row->id_mail);

       if($row->fecha)
        $time = $this->_quedan($row->fecha, $row->hora);
      else
        $time = $row->dia;

       $mail_array[] = Array(
         'id_mail' => $row->id_mail,
         'nombre' => $row->nombre,
         'remitente' => $row->remitente,
         'time' => $time,
         'estado' => $row->estado,
         'button' => $button
       );
      } 
       $data['mails'] = $mail_array;

       $this->load->view('response/mail_content', $data);
    return TRUE;   
     }
     
   else
   {
    return false;
   }

    
  }

}
?>