<?php

    abstract class Auth
    {
        // PASA EL PARAMETRO RECORDAR. SINO SE PASA EL DEFAULT ES IGUAL A CERO
        public static function session_start()
        {
          if(!isset($_SESSION))
             {
                 session_start();
             }
             if (isset($_COOKIE["userId"]) && trim($_COOKIE["userId"]))
             {
               $_SESSION["userId"]=$_COOKIE["userId"];
             }
        }


        // destruye la cookie de usuario y la sesion.
        public static function logout()
        {
          setcookie("userId",'',time()-10);

          session_destroy();
        }

        // devuelve un objeto usuario si hay un usuario logeado, o nulo si no lo hay.
        public static function loggedUser()
        {
          if (isset($_SESSION['userId'])) {return Users::getByid($_SESSION["userId"]);}
          else {return null;}
        }

       // guarda el id de usuario en session y crea una cookie si recordar = true.
        public static function login(User $user,bool $recordar = false)
        {
          $_SESSION['userId'] = $user->getID();
          if ($recordar)
          {
            setcookie("userId",$usuario["userId"],time()+3600);
          }
        }



    }


?>
