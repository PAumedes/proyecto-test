<?php














// recibe un id de usuario
// devuelve el usuario ompleto en formato array
function traerUsuario($id){
  $usuarios=traerUsuarios();
  foreach ($usuarios as $usuario) {
    if ($usuario["userId"]==$id){return $usuario;}
  }return false;
}



// Devuelve true si hay una sesion activa con un userId en SESSION
function logged(){
  if (isset($_SESSION['userId'])){return true;}
  else {return false;}
}


//recibe un mail
//devuelve un usuario que tenga ese mail, si existe.
// de lo contrario devuelve falso
function existeMail($mail){
  $usuarios=traerUsuarios();
    foreach ($usuarios as $usuario) {
      if ($usuario["email"] == $mail){
        return $usuario;
      }
    } return false;
}

//Recibe un username
//devuelve un usuario que tenga ese username, si existe.
// de lo contrario devuelve falso
function existeUsername($username){
  $usuarios=traerUsuarios();
    foreach ($usuarios as $usuario) {
      if ($usuario["username"] == $username){
        return $usuario;
      }
    }return false;
}





//devuelve el ultimo id registrado en usuarios +1
function nuevoId(){
  $todos=traerUsuarios();
  if(!$todos){return 1;}
  $ultimo=array_pop($todos);
  $nuevoId = (int)$ultimo["userId"];
  $nuevoId++;
  return $nuevoId;
}

 ?>
