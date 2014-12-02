<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailing_send extends CI_Controller {

  
 function __construct()
 {
    parent::__construct();
    
    $this->load->model('mail_send','',TRUE);
    $this->load->model('suscriptor','',TRUE);
    $this->load->model('user','',TRUE);
    
 }

 function index($id_lista, $tipo)
 {
   
  $this->load->view('mailing', $data);
  
   
 }

private function restarFechas($fecha1, $fecha2)
{

  //separamos fecha 2
   
  $ano1 = substr($fecha1, 6, 4);
  $mes1 = substr($fecha1, 3, 2);
  $dia1 = substr($fecha1, 0, 2);
   
  //separamos fecha 2
   
  $ano2 = substr($fecha2, 6, 4);
  $mes2 = substr($fecha2, 3, 2);
  $dia2 = substr($fecha2, 0, 2);

  $timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
  $timestamp2 = mktime(0,0,0,$mes2,$dia2,$ano2);
   
  $resta = $timestamp1 - $timestamp2;
   
  $dias = $resta / (60 * 60 * 24);

  $resultado_final = floor($dias);
   
  return $resultado_final;
}

private function conversor($fecha)
  {
    $ano = substr($fecha, 0, 4);
    $mes = substr($fecha, 5, 2);
    $dia = substr($fecha, 8, 2);
    
    return $dia."-".$mes."-".$ano;
  }   

public function mailing_daily()
 {
  
  $fecha_actual = date('d-m-y');     

   $result = $this->mail_send->get_suscriptor_all();

if($result)
  {
   $suscriptor_array = array();
   
   foreach($result as $suscriptor)
    {
      $fecha_suscripcion = $suscriptor->registered; 
      $suscripcion_date = $this->conversor($fecha_suscripcion);
      $resta = $this->restarFechas($fecha_actual, $suscripcion_date);
      $seguimiento = $this->mail_send->seguimiento($suscriptor->lista_id_lista, $resta);

      echo "-id:[".$suscriptor->id_suscriptor."] dias desde suscripcion:".$resta." seguimiento:".$seguimiento."<br>";

       if($seguimiento != 0)
        //id_seguimiento, user_id_user, email(suscriptor), nombre(suscriptor)
        $this->envio_mandrill($seguimiento,$suscriptor->user_id_user,$suscriptor->email,$suscriptor->nombre);        
    }
  }     
 }

public function mailing_suscripcion($id_mail, $email_suscriptor, $nombre_suscriptor)
{
  
  $row = $this->mail_send->mail_info($id_mail);

  $mailing_array[] = Array(
         'html' => $row[0]->html,
         'asunto' => $row[0]->asunto,
         'remitente' => $row[0]->remitente,
         'name' => $row[0]->nombre,
         'email' =>$email_suscriptor

       );
  $data['data'] = $mailing_array;
  $this->load->view('mandrill/mailing_suscripcion', $data);

}

public function mailing_hourly()
{
  //primero preguntar por algun boletín inactivo, esto es para preguntar luego por la hora
   
  $hora_actual = date('H');
  $fecha_actual = date('d-m-y');
  $hora_envio = 8;
  $result = $this->mail_send->get_boletines(); 
  
  if($result)
    {
      echo "Existen registros <br>".$fecha_actual.":".$hora_actual."<br>";
      
      foreach($result as $boletin)
      {
          $fecha_boletin = $boletin->fecha;
           echo "<br>fecha boletin: ".$fecha_boletin;
           $resta = $this->restarFechas($fecha_boletin, $fecha_actual);
           echo "resta: ".$resta;
           if($resta == 0)// La fecha de hoy coincide con la fecha del boletín
            { 
                  echo "<br>La fecha de hoy coincide con la fecha del boletín<br>";
                  echo "hora boletin:".$boletin->hora."<br>";
                  echo "hora hoy:".$hora_actual."<br>"; 
            if($boletin->hora == $hora_actual)// La hora coincide con la del boletín
              {
                echo "envio mandril a:<br>";
                $data["data"] = $this->mail_send->suscriptores_boletin($boletin->id_mail);
                $this->load->view('mandrill/mailing_hourly', $data);
                //$this->envio_mandrill($this->mail_send->suscriptores_boletin($boletin->id_mail));
                //print_r($this->mail_send->suscriptores_boletin($boletin->id_mail));
              }       
            }
      }
    }
}      

function envio_mandrill($data)
{

foreach ($data as $value) 
{

print_r($data);
  // reemplaza la etiqueta [[nombre]] en el html por nombre de suscriptor


/*
  $bodytag = str_replace("[[nombre]]", $nombre, $value->html);
  $subjetag = str_replace("[[nombre]]", $nombre, $value->asunto);

*/

  $mandrill_ready = NULL;

  try {

      $this->mandrill->init( $this->config->item('GkqwYTTLFEvJqIf9XlS3DA') );
      $mandrill_ready = TRUE;

  } catch(Mandrill_Exception $e) {

      $mandrill_ready = FALSE;

  }

  if( $mandrill_ready ) {

      //Send us some email!
      $email = array(
          'html' => $value->html, //Consider using a view file
          'text' => 'This is my plaintext message',
          'subject' => $value->asunto,
          'from_email' => $value->remitente,
          'from_name' => $value->name,
          'to' => array(array('email' => $value->email )) //Check documentation for more details on this one
          //'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails
          );

      $result = $this->mandrill->messages_send($email);

  }
 
} 
  
  }

}
?>