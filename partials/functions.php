<?php


 session_start();


// var_dump($_COOKIE);exit;
// if (isset($_COOKIE["userId"]) && trim($_COOKIE["userId"])){
//   $_SESSION["userId"]=$_COOKIE["userId"];
// }


//Devuelve la lista completa de usuarios
//dentro de un array
function traerUsuarios(){
  $file = file_get_contents("json/usuarios.json");
  $file = explode(PHP_EOL,$file);
  array_pop($file);
  $usuarios=[];
  foreach ($file as $usuario) {
    $usuarios[]=json_decode($usuario,true);
  }
  return $usuarios;
}


//recibe la informacion de POST del form login.
//valida los campos, devuelve los posibles errores en un array.
function validarLogin($data){
  $errores=[];

  if (!isset($data["user"]) || !$data["user"]){
    $errores["user"] = "ingresa un usuario o email valido";
    return $errores;
  } else {
    $usuarios=traerUsuarios();
    foreach ($usuarios as $usuario) {
      if ($usuario["email"]==$data["user"] || $usuario["username"]==$data["user"]){
        if ( ! password_verify( $data["password"] , $usuario["password"] ) ) {
          $errores["password"]="El password ingresado es incorrecto";
          return $errores;
        }else{
          $_SESSION["userId"]=$usuario["userId"];
          if (isset($data["recordar"])){
            setcookie("userId",$usuario["userId"],time()+3600);
          }
          return "";
        }
      }
    }
    $errores["user"]="El usuario o email no esta registrado";
    return $errores;
  }
}


// Recibe los datos de POST provenientes del form perfil,
// valida si se subio imagen, y si es asi que no haya errores con la imagen.
//valida si se intento hacer un cambio de password, y si fue asi, que las contraseñas coincidan.
//devuelve un array con los posibles errores
function validarPerfil($data,$imagen){
$errores=[];
  if (isset($_FILES[$imagen]) && trim($_FILES[$imagen]["name"])!=""){
    if (! ($_FILES[$imagen]["error"]==UPLOAD_ERR_OK ||  $_FILES[$imagen]["error"]=="") ) {
      $errores["avatar"]="Error al subir la imagen";
    }else {
      $ext = strtolower(pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION));
      if ($ext != "jpg" && $ext != "png" && $ext!="jpeg"){
        $errores["avatar"]="Por favor suba una imagen en formato png o jpeg.";
      }
    }
  }
  if(isset($data["password"])&& trim($data["password"])){
    if(strlen(trim($data["password"])) < 7 ){
      $errores["password"]="El password debe tener al menos 7 caracteres";
    }
    if (trim($data["password"])!=trim($data["repassword"])){
      $errores["rePassword"]= "Las conttraseñas no coinciden";
    }
  }

return $errores;
}




// recibe un id de usuario
// devuelve el usuario ompleto en formato array
function traerUsuario($id){
  $usuarios=traerUsuarios();
  foreach ($usuarios as $usuario) {
    if ($usuario["userId"]==$id){return $usuario;}
  }return false;
}

// trae el usuario como esta guardado en el JSON y lo hace formato json.
// Encodea el usuario con sus nuevos datos a json
// trae el archivo completo json en una variable $file, de texto.
// reemplaza en $file la linea del viejo usuario por la linea de el nuevo usuario
function updateUser($user){
  $userOld = traerusuario($user["userId"]);
  $userOld = json_encode($userOld);
  $user = json_encode($user);
  $file = file_get_contents("json/usuarios.json");
  $file = str_replace($userOld,$user,$file);
  file_put_contents("json/usuarios.json", $file);
}

//pasadas las validaciones
//Si el campo tiene datos entonces lo asigno al objeto user.
function guardarPerfil($data,$imagen){
  $user = traerUsuario($_SESSION["userId"]);
  if ( isset($_FILES[$imagen]) && trim($_FILES[$imagen]["name"] ) ){
      $extension=pathinfo($_FILES[$imagen]["name"],PATHINFO_EXTENSION);
      $path= dirname(__file__ , 2) . "/images/" . $user["username"] . "." . $extension;
			move_uploaded_file($_FILES[$imagen]["tmp_name"], $path);
      $user["avatar"] = strstr($path,"images");
  }
  if(isset($data["firstName"]) && trim($data["firstName"])){
    $user["firstName"]=$data["firstName"];
  }
  if(isset($data["lastName"]) && trim($data["lastName"])){
    $user["lastName"]=$data["lastName"];
  }
  if(isset($data["direccion"]) && trim($data["direccion"])){
    $user["direccion"]=$data["direccion"];
  }
  if(isset($data["codigoPostal"]) && trim($data["codigoPostal"])){
    $user["codigoPostal"]=$data["codigoPostal"];
  }
  if(isset($data["pais"]) && trim($data["pais"])){
    $user["pais"]=$data["pais"];
  }

  updateUser($user);
  return;
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

//Reciba la info por POST del form de registro.
//deuvuelve los errores que arrojen las validaciones
//si no hay error devuelve array vacio.
function validarRegistro($data){
  $errores=[];
  if (!isset($data["username"])||!$data["username"]){
    $errores["username"]="ingresa un nombre de usuario";
  }elseif (existeUsername($data["username"])) {
    $errores["username"]="El nombre de usuario ya esta registrado, por favor, elija otro nombre";
  }

  if (!isset($data["email"])||!$data["email"]){
    $errores["email"]="ingresa un email";
  }elseif (! filter_var($data["email"],FILTER_VALIDATE_EMAIL)) {
    $errores["email"]="ingresa un email valido";
  }elseif (existeMail($data["email"])){
    $errores["email"]="El email ya esta registrado";
  }

  if (!isset($data["password"])||!$data["password"]){
    $errores["password"]="ingresa un password";
  }elseif ( strlen( $data["password"]) < 7 )  {
    $errores["password"]="El password debe tener al menos 7 caracteres";
  }elseif ($data["password"]!=$data["repassword"]) {
    $errores["repassword"]="las contraseñas no coinciden";
  }
  return $errores;
}


// Recibe data de registro, desde POST del form de registro, despues de validado.
//Crea un nuevo ID para el usuario, genera un objeto json con el nueovo usuario
//y lo incorpora a usuarios.json
function registrar($data){
  $usuario=[];
  $usuario["userId"]=nuevoId();
  $usuario["username"]=$data["username"];
  $usuario["email"]=$data["email"];
  $usuario["password"]=password_hash($data["password"],PASSWORD_DEFAULT);
  $usuario["option"] = $data["option"];

  $usuario=json_encode($usuario);
  file_put_contents("json/usuarios.json",$usuario.PHP_EOL, FILE_APPEND);

  return;
}

//devuelve el ultimo id registrado en usuarios +1
function nuevoId(){
  $todos=traerUsuarios();
  if(!$todos){return 1;}
  $ultimo=array_pop($todos);
  return $ultmo["userId"]+1;
}

 ?>
