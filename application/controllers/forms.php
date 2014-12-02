<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'controllers/mailing_send.php';
session_start(); //we need to call PHP's session object to access it through CI
class Forms extends mailing_send {

 function __construct()
 {
  parent::__construct();
  $this->load->model('form', '', TRUE);
  $this->load->model('suscriptor', '', TRUE);
  $this->load->model('lista', '', TRUE);
  $this->load->model('macro', '', TRUE);
  $this->load->model('mail', '', TRUE);
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
     $data['sum_forms'] = $this->form->cantidad_form($id_lista);
     $this->load->view('forms', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 
 function user_id()
 {
  if($this->session->userdata('logged_in'))
  {
    $session_data = $this->session->userdata('logged_in');
    return $session_data['id'];
  }
 }

 public function new_form_view($id_lista)
 {
  if($this->session->userdata('logged_in'))
  {
    $this->load->helper('form');
    $session_data = $this->session->userdata('logged_in');
    $data = array();
    $data['campos'] = $this->form->get_campo();
    $data["id_lista"] = $id_lista;
    $data['id'] = $session_data['id'];
    $data['username'] = $session_data['username'];
    
    $this->load->view('form/new_form', $data);
  }
  else
  {
     //If no session, redirect to login page
     redirect('login', 'refresh');
  }  
 }

  public function edit_form_view($id_form)
 {
  if($this->session->userdata('logged_in'))
  {
    $this->load->helper('form');
    $session_data = $this->session->userdata('logged_in');
    $data = array();
    $data['campos'] = $this->form->get_campo();
    $data['campos_form'] = $this->form->get_campos_form($id_form);
    $data['campos_formulario'] = $this->form->get_campos_formulario($id_form);
    $data['id'] = $session_data['id'];
    $data['username'] = $session_data['username'];
    
    $this->load->view('form/edit_form', $data);
  }
  else
  {
     //If no session, redirect to login page
     redirect('login', 'refresh');
  }  
 }

public function delete_form_view($id_form, $nombre_form=null)
 {
  $data['nombre_form'] = $nombre_form;
  $data['id_form'] = $id_form;

  $this->load->view('form/modal/eliminar', $data);
 }

 public function delete_form (){
  
  $id_form = $this->input->get('id_form', TRUE);
  if($this->form->delete_form($id_form))
    echo json_encode(array("success" => "success"));
  
}

public function source_code_view($id_form)
 {
  $data['id_form'] = $id_form;
  $data['id_user'] = $this->user_id();

  $this->load->view('form/modal/source_code', $data);
 }

 function crear_form (){
  //$this->load->view('form/new_form', $data);
  $nombre=$this->input->post('nombre', TRUE);
  $campos=$this->input->post('campos', TRUE);
  $boton=$this->input->post('boton', TRUE);
  $titulo=$this->input->post('titulo', TRUE);
  $ref=$this->input->post('ref', TRUE);
  $url_return=$this->input->post('url_return', TRUE);
  $id_lista=$this->input->post('id_lista', TRUE);
 
   if($campos)
    $campo_array = explode(",", $campos);//echo $campo_array[0];
   
   $pre="";
   $orden = 0;
   
   if($this->form->existe_nombre($nombre))
    $pre = "copia_de_";
   
   //Creamos el form con nombre y ref
   $form_data=array(
    'nombre'=>"$pre$nombre",
    'titulo'=>$titulo,
    'boton'=>$boton,
    'ref'=>$ref,
    'r_lista_id_lista'=>$id_lista,
    'url_return'=>$url_return
    
    );

  if($id_form=$this->form->save($form_data))
   foreach ($campo_array as $key) {
     $campo_form_data=array(
    'r_form_id_form'=>$id_form,
    'r_campo_id_campo'=>$key,
    'orden'=>$orden
    );
    $this->form->save_campo($campo_form_data);
    $orden++;
   }
   $this->index($id_lista);
} 

 public function genera_form($id_form, $id_user)
 {

  $formulario = $this->form->get_form($id_form);
  $campos = $this->form->get_campos($id_form);


                //**********************************GENERADOR FORM****************************************
    $form = "<link rel='stylesheet' href='".base_url()."css/formulario/form.css'/>
            <script type='text/javascript' src='".base_url()."js/formulario/form.js'></script>
        <div class='r_container'>
            <div style='padding: 11;'>
                <form id='formulario_wasanga' accept-charset='utf-8' action='".base_url()."index.php/forms/procesa_form' method='post'>
                  <input type='hidden' name='id_form' id='id_form' value='".$id_form."'>
                  <input type='hidden' name='id_user' id='id_user' value='".$id_user."'>
                  <input type='hidden' name='id_lista' id='id_lista' value='".$formulario["r_lista_id_lista"]."'>
                  <input type='hidden' name='url_return' id='url_return' value='".$formulario["url_return"]."'>
                  <span style='font-size: 24px; color: #2B93D3;font-family: Arial, Helvetica, sans-serif !important;'>".$formulario["titulo"]."</span>
                        <div style='margin-top: 17'>";
                      
                      if($campos) 
                        foreach ($campos as $key => $row)
                         $form .= "<div><label class='lbl_campo'>".$row->nombre.":</label><input class='input_campo' type='text' name='".$row->nombre."' id='".$row->nombre."' ></div>";
                         
                         
                       
    $form .= "</div><div class='r_footer'>
        <input type='button' class='r_button' id='send' onclick='validaMail()' value='".$formulario["boton"]."' style='display:inline !important; width: 139px !important; margin-top: 22; margin-left: 38;'>
                <div style='padding: 19px;'>
                    <a href='#' target='_blank' class='privacidad'>Respetamos tu privacidad</a>
            </form></div>
            </div>";
            
    $data['fuente'] = $form;
    $this->load->view('response/source_content', $data);
   
 }
 public function procesa_form()
 {
    //Recibe id_form del formulario externo
    $id_form  = $this->input->post('id_form', TRUE);
    $id_lista = $this->input->post('id_lista', TRUE);
    $email    = $this->input->post('EMAIL', TRUE);
    $hoy = date("Y-m-d H:i:s");
    
    //si el formulario tiene el campo NOMBRE se almacena en $nombre
    if($name=$this->input->post('NOMBRE', TRUE))
      $nombre=$name;
    else
      $nombre="";
    
    //array con datos del nuevo suscriptor
    $suscriptor_data=array(
      'email'=>$email,
      'nombre'=> $nombre,
      'registered'=>$hoy,
      'fk_ws_registro'=>$this->input->post('id_user', TRUE),
      'r_lista_id_lista'=>$id_lista
      );
    /*si el suscriptor se almacena correctamente en la base de datos entonces TRUE
     y se redirige a la pagina de destino previamente configurada*/
    if($id_suscriptor = $this->suscriptor->save($suscriptor_data))
      {
        if($seguimiento = $this->mail->existe_mail_dia_0($id_lista))
          $this->mailing_suscripcion($seguimiento["id_seguimiento"], $email, $nombre);
         
        $suscriptor_data['id_suscriptor'] = $id_suscriptor;
        $this->procesa_macro($suscriptor_data, $email, $this->input->post('id_lista', TRUE));
        header("Location: ".$this->input->post('url_return', TRUE));   
        
      }    
    else
      echo "Ocurrió un error al enviar el formulario";   
 }

 function procesa_macro($suscriptor_data, $EMAIL, $id_lista)
 {

  if($macro = $this->existe_macro($id_lista))
    foreach ($macro as $key => $value) 
    {
      echo " Macro de:".$value["accion"]." a lista: ".$value["target"];
      $this->ejecutar_macro($suscriptor_data, $value["accion"], $value["target"], $EMAIL);
    }
  else
    return false; 

  }
 function existe_macro($id_lista)
 {
    //Retorna: array(accion=>accion, lista=>lista) pueden ser mas de una macro
    //FALSE en caso contrario
    $array=array();
    $retorno = false;

    if($macros = $this->macro->get_all($id_lista))
      {
        foreach ($macros as $macro) 
        {
          $array[] = array("accion" => $macro->accion, "target" => $macro->target);
            
        }
        $retorno = $array;
      }

    return $retorno;

  }

  function ejecutar_macro($suscriptor_data, $accion, $target, $EMAIL)
{
  //accion 1 = agregar 2 = eliminar
  if($accion == 1)
  { 
    if($this->suscriptor->existe_suscriptor_lista($EMAIL, $target))
      {
        $this->suscriptor->copy_suscriptor($suscriptor_data["id_suscriptor"], $suscriptor_data["fk_ws_registro"], $target);
      }
    else
      echo " Ya existe suscriptor en la lista";
  }
  //Eliminar
  else
    if($id_suscriptor = $this->suscriptor->existe_suscriptor_lista($EMAIL, $target))
    {
      $this->suscriptor->eliminar_suscriptor_lista($EMAIL, $target);
       /*  
      if($target == 0)
        eliminar_suscriptor_prospectos($EMAIL);
      else
        eliminar_suscriptor_lista($EMAIL, $target); 
    */
    } 
    else
      echo " No existe suscriptor para eliminar en la lista: ".$target;
}

 public function data($lista)
  {

    //query the database
   $result = $this->form->get_all($lista);
   
   if($result)
   {
     $form_array = array();
     
     foreach($result as $row)
     {
       $form_array[] = Array(
         'id_form' => $row->id_form,
         'nombre' => $row->nombre
        );
      } 
       $data['forms'] = $form_array;

       $this->load->view('response/form_content', $data);
    return TRUE;   
     }
     
   else
   {
    return false;
   }

    
  }


}
?>