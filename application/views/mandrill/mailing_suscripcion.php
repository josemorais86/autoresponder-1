<?php
require 'Mandrill.php';

envio_mandrill($data);

function envio_mandrill($value){
            
      
         try {
                $mandrill = new Mandrill('GkqwYTTLFEvJqIf9XlS3DA');
                $message = array(
                    'html'      => $value[0]['html'],
                    'subject'   => $value[0]['asunto'],
                    'from_email'=> $value[0]['remitente'],
                    'from_name' => $value[0]['name'],
                    'to' => array(
                        array(
                            'email' => $value[0]['email'],
                            'type'  => 'to'
                        )
                    ),
                    'headers' => array('Reply-To' => $value[0]['remitente']),
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
?> 