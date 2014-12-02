<?php
require 'Mandrill.php';

//print_r($data);
envio_mandrill($data);

function envio_mandrill($data){
            
      foreach ($data as $value) 
      {
         try {
                $mandrill = new Mandrill('GkqwYTTLFEvJqIf9XlS3DA');
                $message = array(
                    'html'      => $value->html,
                    'subject'   => $value->asunto,
                    'from_email'=> $value->remitente,
                    'from_name' => $value->name,
                    'to' => array(
                        array(
                            'email' => $value->email,
                            'type'  => 'to'
                        )
                    ),
                    'headers' => array('Reply-To' => $value->remitente),
                    'important' => false,
                    'auto_text' => true,
                    'auto_html' => true,
                    'track_opens' => true
                );
     
                $async = true;
                $ip_pool = 'Main Pool';
                $send_at = '';
                $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
                    
            } catch(Mandrill_Error $e) {
                // Mandrill errors are thrown as exceptions
                echo "Error al Enviar Correo: " . get_class($e) . ' - ' . $e->getMessage();
                throw $e;
            }

      }

}
?> 