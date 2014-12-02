<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 protected $session_data;

 function __construct()
 {
    parent::__construct();
    $this->session_data = $this->session->userdata('logged_in');
    $this->load->model('lista','',TRUE);
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $data['listas_select'] = $this->lista->listas($this->session_data['id']);
     $data['username'] = $this->session_data['username'];
     $data['id'] = $this->session_data['id'];
     $data['sum_listas'] = $this->lista->cantidad_lista($this->session_data['id']);
     $this->load->view('home', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>
