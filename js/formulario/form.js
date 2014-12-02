function validaMail()
  {
    email= document.getElementById('EMAIL').value;
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) )
        alert('Error: La dirección de correo ' + email + ' es incorrecta.');
    else{
        document.getElementById('formulario_wasanga').submit();
    }
  }