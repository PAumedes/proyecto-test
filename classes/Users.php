<?php
    require_once('User.php');
    require_once('Db.php');

    abstract class Users
    {
        // devuelve un array con los usuarios almacenados en JSON.
        // Esta funcion se utiliza para la migracion de JSON a mysql
        private static function JSON_getAll()
        {
            $file = file_get_contents("json/users.json");
            $file = explode(PHP_EOL,$file);
            array_pop($file);
            $users=[];
            foreach ($file as $user) {
              $users[]=json_decode($user,true);
            }
            return $users;
        }

        //Toma el archivo usuarios.json y guarda los usuarios registrados alli en la DB mysql
        public static function migrateJSON()
        {
          $usersJSON = self::JSON_getAll();
          $db = db::connect();
          try {
            $db->beginTransaction();
            foreach ($usersJSON as $userJSON)
            {
              $user = new User();
              $user->loadFromArray($userJSON);
              self::create($user);
            }
            $db->commit();
          } catch (PDOException $e) {
            $db->rollBack();
            return $e->getMessage();
          }
        }

        // toma un objeto de tipo usuario y lo guarda en la base de datos.
        public static function create(User $user)
        {
          $db = Db::connect();
          $queryText = "INSERT INTO users(username,password,email,avatar,user_type)
                        VALUES (:username,:password,:email, :avatar, :userType) ";
          try {
            $db->beginTransaction();
            // insert en la tabla users
              $query = $db->prepare($queryText);
              $query->bindValue(':username',$user->getUsername(),PDO::PARAM_STR);
              $query->bindValue(':password',$user->getPassword(),PDO::PARAM_STR);
              $query->bindValue(':avatar',$user->getAvatar(),PDO::PARAM_STR);
              $query->bindValue(':email',$user->getEmail(),PDO::PARAM_STR);
              $query->bindValue(':userType',$user->getUserType(),PDO::PARAM_STR);
              $query->execute();
          // inser en la tabla profiles
            $userID = $db->lastInsertId();
            $queryText = 'INSERT INTO profiles (user_id,first_name,last_name,CP,address)
                          VALUES (:user_id,:first_name,:last_name,:CP,:address)';
            $query = $db->prepare($queryText);
            $query->bindValue(':user_id',$userID,PDO::PARAM_INT);
            $query->bindValue(':first_name',$user->getFirstName(),PDO::PARAM_STR);
            $query->bindValue(':last_name',$user->getLastName(),PDO::PARAM_STR);
            $query->bindValue(':CP',$user->getCP(),PDO::PARAM_STR);

            $query->bindValue(':address',$user->getAddress(),PDO::PARAM_STR);

            $query->execute();

            $db->commit();
          } catch (\Exception $e) {
            $db->rollBack();
            echo $e->getMessage();exit;
            return $e->getMessage();
          }

        }

        // devuelve un array de objetos Usuario.
        // conteniendo todos los usuarios en la base de datos.
        public static function getAll()
        {
          $db = Db::connect();
          $queryText = "SELECT u.id,u.username,u.email,u.password,u.user_type, u.avatar,
                               p.first_name,p.last_name,p.CP,p.phone,p.address
                        FROM users as u
                        INNER JOIN profiles  as p on u.id = p.user_id; ";
           try {
             $query = $db->prepare($queryText);
             $queryt->execute();
             $result = $query->fetchAll(PDO::FETCH_ASSOC);
           } catch (\Exception $e) {

           }
           $users=[];
              foreach ($result as $userArray)
              {
                $user = new User();
                $users[]=$user->loadFromArray($userArray);
              }
              return $users;
        }


        public static function getAllDjs()
        {

        }

        public static function getAllEvents()
        {

        }



        // recive un campo de referencia de busqueda y un valor.
        // devuelve un objeto usuario
        public static function getByUsernameOrEmail(string $value)
        {
          $db = Db::connect();
          $queryText = "SELECT u.id,u.username,u.email,u.password,u.user_type, u.avatar,
                               p.first_name,p.last_name,p.CP,p.phone,p.address
                        FROM users as u
                        INNER JOIN profiles  as p on u.id = p.user_id
                        WHERE u.username = :value OR u.email = :value;";
          try
          {
            $query = $db->prepare($queryText);
            //$field = 'u.'.$field;
            $query->bindValue(':value',$value,PDO::PARAM_STR);
            $query->execute();
          } catch (PDOException $e) {
            echo $e->getMessage();exit;
          }

          $result = $query->fetch(PDO::FETCH_ASSOC);
          if ($result)
          {
              $user = new User;
              $user->loadFromArray($result);
              return $user;
          }
          else {return false;}
        }

        public static function save($user)
        {

        }

        public static function delete($user)
        {

        }


    }


?>
