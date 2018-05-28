<?php
require_once('Db.php');

    class User {

        private $id;
        private $username;
        private $password;
        private $email;
        private $first_name;
        private $last_name;
        private $address;
        private $CP;
        private $avatar;
        private $userType;
        // private $userType;
        // private $country;

        // GETTERS & SETTERS

        public function __construct()
        {
          $this->id = 0;
          $this->username ='';
          $this->password = '';
          $this->email = '';
          $this->first_name = '';
          $this->last_name = '';
          $this->address = '';
          $this->CP = '';
          $this->avatar = '';
          $this->userType = '';
        }

        public function getID()
        {
            return $this->id;
        }

        public function setID($newID)
        {
            $this->id = $newID;
        }

        public function getUsername()
        {
            return $this->username;
        }

        public function setUsername($newUsername)
        {
            $this->username = $newUsername;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($newPassword)
        {
            $this->password = $newPassword;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($newEmail)
        {
            $this->email = $newEmail;
        }

         public function getUserType()
         {
             return $this->userType;
         }

         public function setUsertype($newUserType)
         {
             $this->userType = $newUserType;
         }

        public function getFirst_name()
        {
            return $this->first_name;
        }

        public function setFirst_name($newFirst_name)
        {
            $this->first_name = $newFirst_name;
        }

        public function getLast_name()
        {
            return $this->last_name;
        }

        public function setLast_name($newLast_name)
        {
            $this->last_name = $newLast_name;
        }

        public function getAddress()
        {
            return $this->address;
        }

        public function setAddress($newAddress)
        {
            $this->address = $newAddress;
        }

        public function getCP()
        {
            return $this->CP;
        }

        public function setCP($newCP)
        {
            $this->CP = $newCP;
        }

        // public function getCountry()
        // {
        //     return $this->country;
        // }
        //
        // public function setCountry($newCountry)
        // {
        //     $this->country = $newCountry;
        // }

        public function getAvatar()
        {
            return $this->avatar;
        }

        public function setAvatar($newAvatar)
        {
            $this->avatar = $newAvatar;
        }


        public function loadFromArray(array $array)
        {
          $this->username = $array["username"];
          $this->password = $array["password"];
          $this->email = $array["email"];
          if (isset($array['id'])){$this->id = $array['id'];}
          if (isset($array["userType"])){$this->userType = $array["userType"];}
          if (isset($array["first_name"])){$this->first_name = $array["first_name"];}
          if (isset($array["last_name"])){$this->last_name = $array["last_name"];}
          if (isset($array["address"])){$this->address = $array["address"];}
          if (isset($array["CP"])){$this->CP = $array["CP"];}
          if (isset($array["avatar"])){$this->avatar = $array["avatar"];}
        }

        //actualiza un campo en la base de datos con el valor actual del campo.
        public function updateUserField(string $field)
        {
          $db = Db::connect();
          $queryText = "UPDATE users
                        SET {$field} = :value
                        WHERE id = :id ";
          try {
            $query = $db->prepare($queryText);
            $query->bindValue(':value',$this->$field,PDO::PARAM_STR);
            $query->bindValue(':id',$this->id,PDO::PARAM_INT);
            $query->execute();
          } catch (\Exception $e) {
            echo $e->getMessage();exit;
          }

        }
        //actualiza un campo en la base de datos con el valor actual del campo.
        public function updateProfileField(string $field)
        {
          $db = Db::connect();
          $queryText = "UPDATE profiles
                        SET {$field} = :value
                        WHERE user_id = :id ";
          try {
            $query = $db->prepare($queryText);
            $query->bindValue(':value',$this->$field,PDO::PARAM_STR);
            $query->bindValue(':id',$this->id,PDO::PARAM_INT);
            $query->execute();
          } catch (\Exception $e) {
            echo $e->getMessage();exit;
          }

        }
        // Modifica los datos del usuario con lo que trae post y file, si esta seteado
        // hace un update en la base de datos.
        public function update($data,$image)
        {
          $userUpdates=[];
          $profileUpdates=[];
            if ( isset($_FILES[$image]) && trim($_FILES[$image]["name"] ) )
            {
                $extension = pathinfo($_FILES[$image]["name"],PATHINFO_EXTENSION);
                $path= dirname(__file__ , 2) . "/images/" . $this->username . "." . $extension;
                move_uploaded_file($_FILES[$image]["tmp_name"], $path);
                $this->setAvatar(strstr($path,"images"));
                $userUpdates[]='avatar';
            }
            if(isset($data["password"]) && trim($data["password"]) && (trim($data["password"])==trim($data["repassword"]) ) ){
              $this->setPassword(password_hash($data["password"],PASSWORD_DEFAULT));
              $userUpdates[]='password';
            }

            if(isset($data["first_name"]) && trim($data["first_name"])){
              $this->setFirst_name($data["first_name"]);
              $profileUpdates[] = 'first_name';
            }

            if(isset($data["last_name"]) && trim($data["last_name"])){
              $this->setLast_name($data["last_name"]);
              $profileUpdates[] = 'last_name';
            }
            if(isset($data["address"]) && trim($data["address"])){
              $this->setAddress($data["address"]);
              $profileUpdates[] = 'address';
            }
            if(isset($data["CP"]) && trim($data["CP"])){
              $this->setCP($data["CP"]);
              $profileUpdates[]='CP';
            }

            if ($userUpdates)
            {
                foreach ($userUpdates as $update) {
                  $this->updateUserField($update);
                }
            }
            if ($profileUpdates)
            {
              foreach ($profileUpdates as $update)
              {
                $this->updateProfileField($update);
              }

            }

        }

}

?>
