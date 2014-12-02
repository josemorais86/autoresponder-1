<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- Bootstrap core CSS -->
<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/login.css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Mailing Pehuén</title>
<script src="<?php echo base_url();?>js/jquery-1.2.6.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script type="text/javascript">
$(document).ready(function()
{
  $("#login_form input:first").focus();
});
</script>
</head>

 <body>

<div class="container">
  <?php 
   $attributes = array('class' => 'form-signin', 'role' => 'form');
   echo form_open('verifylogin', $attributes); 
   ?>
<div class="logo"></div>   
  <h2 class="form-signin-heading"><CENTER>Autoresponder</CENTER></h2>
   <?php echo validation_errors(); ?>
       
    <?php 
      echo form_input(array(
        'class'=>'form-control',
        'name'=>'username', 
        'value'=>set_value('username'),
        'size'=>'20',
        'placeholder'=>$this->lang->line('login_username')
        )); 
    ?>
                
     <?php 
      echo form_password(array(
        'class'=>'form-control',
        'name'=>'password', 
        'value'=>set_value('password'),
        'size'=>'20',
        'placeholder'=>$this->lang->line('login_password')
        )); 
      ?>
     <!-- 
     <br/>
     <input type="submit" value="Login"/> -->
     <div id="submit_button">
    <?php echo form_submit('loginButton','Login', "class='btn btn-lg btn-primary btn-block'"); ?>
    </div>  
</div>
   <div class="footer">Wasanga.com</div>
   <?php echo form_close(); ?>
   
 </body>
</html>
