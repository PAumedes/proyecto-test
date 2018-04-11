<?php

if(!isset($_SESSION))
   {
       session_start();
   }

if (isset($_COOKIE["userId"])){
  $_SESSION["userId"]=$_COOKIE["userId"];
}


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
    $errores["email"]="El email no esta registrado";
    return $errores;
  }
}



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

function logged(){
  if (isset($_SESSION['userID'])){return true;}
  return false;
}

 ?>
