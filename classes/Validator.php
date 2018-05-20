<?php

    abstract class Validator
    {
        public static function validateRegister($data)
        {

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
                $errors["rePassword"]= "Las conttraseñas no coinciden";
              }
            }
          return $errors;
        }


    }




?>
