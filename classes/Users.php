<?php
    require_once('User.php');

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


        public static function getAll()
        {

        }

        public static function getAllDjs()
        {

        }

        public static function getAllEvents()
        {

        }

        public static function getByID()
        {

        }

        public static function save($user)
        {

        }

        public static function delete($user)
        {

        }


    }


?>
