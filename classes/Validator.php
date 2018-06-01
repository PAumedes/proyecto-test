<?php
require_once('Users.php');
require_once('User.php');

    abstract class Validator
    {
      //Recibe un User con datos cargados del form de registro.
      //Recibe ademas el contenido del campo rePassword, para validar contra el password.
      //deuvuelve los errores que arrojen las validaciones
      //si no hay error devuelve array vacio.
      static function validateRegister(User $user, $rePass)
      {
        $errors=[];
        if (!$user->getUsername())
        {
          $errors["username"]="ingresa un nombre de usuario";
        }
        elseif (Users::getByUsernameOrEmail($user->getUsername()))
        {
          $errors["username"]="El nombre de usuario ya esta registrado, por favor, elija otro nombre";
        }

        if (!$user->getEmail())
        {
          $errors["email"]="ingresa un email";
        }
        elseif (! filter_var($user->getEmail(),FILTER_VALIDATE_EMAIL))
        {
          $errors["email"]="ingresa un email valido";
        }
        elseif (Users::getByUsernameOrEmail( $user->getEmail() ) )
        {
          $errors["email"]="El email ya esta registrado";
        }

        if (!$user->getPassword())
        {
          $errors["password"]="ingresa un password";
        }
        elseif ( strlen( $user->getPassword() ) < 7 )
        {
          $errors["password"]="El password debe tener al menos 7 caracteres";
        }
        elseif ($user->getPassword()!=$rePass) {

          $errors["repassword"]="las contraseñas no coinciden";
        }
        return $errors;
      }


        //recibe la informacion de POST del form login.
        //valida los campos, devuelve los posibles errores en un array.
        //si no hay errores seta la COOKIE y el userId en SESSION
        function validateLogin($data)
        {
          $errors=[];

          if (!isset($data["user"]) || !$data["user"])
          {
            $errors["user"] = "ingresa un usuario o email valido";
            return $errors;
          }
          else
          {
            $user = Users::getByUsernameOrEmail( trim( $data['user'] ) );
          }
          if (!$user)
          {
              $errors["user"]="El usuario o email no esta registrado";
              return $errors;
          }
          else
          {
            if (!password_verify( $data["password"] , $user->getPassword() ))
            {
              $errors['password'] = 'El password ingresado es incorrecto';
              return $errors;
            }
            else  { return false;  }
          }
        }





          // Recibe los datos de POST provenientes del form perfil,
          // valida si se subio imagen, y si es asi que no haya errores con la imagen.
          //valida si se intento hacer un cambio de password, y si fue asi, que las contraseñas coincidan.
          //devuelve un array con los posibles errores
        public static function validateProfile($data,$image)
        {

          $errors=[];
            if (isset($_FILES[$image]) && trim($_FILES[$image]["name"]))
            {
              if (! ($_FILES[$image]["error"]==UPLOAD_ERR_OK ||  $_FILES[$image]["error"]=="") )
              {
                $errors["avatar"]="Error al subir la imagen";
                return $errors;
              }
                else
                {
                  $ext = strtolower(pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION));
                    if ($ext != "jpg" && $ext != "png" && $ext!="jpeg")
                    {
                      $errors["avatar"]="Por favor suba una imagen en formato png o jpeg.";
                      return $errors;
                    }
                }
            }

            if(isset($data["password"])&& trim($data["password"]))
            {
              if(strlen(trim($data["password"])) < 7 )
              {
                $errors["password"]="El password debe tener al menos 7 caracteres";
              }
              if (trim($data["password"])!=trim($data["repassword"]))
              {
                $errors["repassword"]= "Las conttraseñas no coinciden";
              }
            }
          return $errors;
        }


    }




?>
