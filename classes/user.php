<?php

    class User {

        private $id;
        private $username;
        private $password;
        private $email;
        private $firstName;
        private $lastName;
        private $address;
        private $cp;
        private $avatar;
        // private $userType;
        // private $country;

        // GETTERS & SETTERS

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

        // public function getUserType()
        // {
        //     return $this->userType;
        // }

        // public function setUsertype($newUserType)
        // {
        //     $this->userType = $newUserType;
        // }

        public function getFirstName()
        {
            return $this->firstName;
        }

        public function setFirstName($newFirstName)
        {
            $this->firstName = $newFirstName;
        }

        public function getLastName()
        {
            return $this->lastName;
        }

        public function setLastName($newLastName)
        {
            $this->lastName = $newLastName;
        }

        public function getAddress()
        {
            return $this->lastName;
        }

        public function setAddress($newAddress)
        {
            $this->address = $newAddress;
        }

        public function getCP()
        {
            return $this->cp;
        }

        public function setCP($newCP)
        {
            $this->cp = $newCP;
        }

        // public function getCountry()
        // {
        //     return $this->country;
        // }

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

        public function update()
        {
        
        }
    }

?>