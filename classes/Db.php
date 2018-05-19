<?php

    class Db
    {

      // devuelve true si existe la base de datos eventr_db
      public static function existsDB()
      {
        $db = self::connect(true);
        $queryText = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'eventr_db'";
        try {
          $query = $db->prepare($queryText);
          $query->execute();
          return ($query->fetch(PDO::FETCH_ASSOC) != NULL);
        } catch (\Exception $e) {
          return $e->getMessage();
        }
      }

      public static function existsTable(string $table)
      {
        $db = self::connect();
        $queryText="SELECT TABLE_NAME
                    FROM information_schema.tables
                    WHERE table_name like :table";
        try
        {
          $query = $db->prepare($queryText);
          $query->bindValue(':table',$table,PDO::PARAM_STR);
          $query->execute();
          return ($query->fetch(PDO::FETCH_ASSOC) != NULL);
        } catch (\Exception $e) {
          return $e->getMessage();
        }
      }


        public static function createDB()
        {
            $db = self::connect(true);
            try
            {
                $sql = "CREATE DATABASE IF NOT EXISTS eventr_db";
                $db->exec($sql);
            }
            catch( PDOException $Exception )
            {
                return $Exception->getMessage();
            }
        }

        // Coneccion a la base de datos.
        // si recibe true como parametro hace la coneccion sin especificar el nombre de la base de datos.
        // esto sirve para la coneccion de los metodos createDB y existsDB
        public static function connect(bool $noDB = false)
        {
          if ($noDB){  $dsn = 'mysql:host=localhost;charset=utf8';}
          else{$dsn = 'mysql:host=localhost; dbname=eventr_db; charset=utf8';}
          $db_user = 'root';
          $db_pass = '';
          $opt = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];
            try
            {
                $db = new PDO($dsn, $db_user, $db_pass, $opt);
                return $db;
            }
            catch( PDOException $Exception )
            {
                echo $Exception->getMessage();
                return false;
                // echo "<p>¡ERROR!</p>"; exit;
            }
        }


        public static function createTable()
        {
            $table = "CREATE TABLE `eventr_db`.`users` (
                    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                    `username` VARCHAR(100) NOT NULL,
                    `email` VARCHAR(100) NOT NULL,
                    `password` VARCHAR(100) NOT NULL,
                    user_type varchar(20),
                    avatar varchar(150),
                    created_at TIMESTAMP DEFAULT now(),
                    updated_at TIMESTAMP DEFAULT now(),
                    PRIMARY KEY (`id`),
                    UNIQUE INDEX `id_UNIQUE` (`id` ASC),
                    UNIQUE INDEX `email_UNIQUE` (`email` ASC),
                    UNIQUE INDEX `username_UNIQUE` (`username` ASC),
                    CONSTRAINT CHK_user_type CHECK(user_type IN ('eventr','DJ','admin'))
                  );"
            ;

            $table2 = "CREATE TABLE `profiles` (
            `id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
            `user_id` int(10) unsigned NOT NULL,
            `first_name` varchar(100),
            `last_name` varchar(100),
            `CP` varchar(100) DEFAULT NULL,
            `phone` varchar(100) DEFAULT NULL,
            `address` varchar(100) DEFAULT NULL,
            created_at TIMESTAMP DEFAULT now(),
            updated_at TIMESTAMP DEFAULT now(),
            PRIMARY KEY (`id`),
            UNIQUE KEY `id_UNIQUE` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
                    ";

            $db = self::connect();

            try
            {
              $db->beginTransaction();
                $db->exec($table);
                $db->exec($table2);
              $db->commit();
            }
            catch(PDOException $Exception)
            {
                $db->rollBack();
                return $Exception->getMessage();
            }
         }






    }






?>
