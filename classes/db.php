<?php

    class db
    {

        // private static $dsn;
        // private static $db_user;
        // private static $db_pass;
        // private static $opt;

        private static $dsn = 'mysql:host=localhost; dbname=eventr_db; charset=utf8';
        private static $db_user = 'root';
        private static $db_pass = '';
        private static $opt = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];

        // public function __construct () {
        //     $this->dsn =  'mysql:host=localhost; dbname=eventr_db; charset=utf8';
        //     $this->db_user = 'root';
        //     $this->db_pass = '';
        //     $this->opt = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];
        // }

        public static function createDB()
        {

            //$db=$this->connect();
            $dsn = 'mysql:host=localhost; charset=utf8';
            try
            {
                $db = new PDO($dsn, self::$db_user, self::$db_pass, self::$opt);
                $sql = "CREATE DATABASE IF NOT EXISTS eventr_db";
                $db->exec($sql);
            }
            catch( PDOException $Exception )
            {
                echo $Exception->getMessage();
                // echo "<p>¡ERROR!</p>"; exit;
            }
        }

        public static function connect()
        {
            try
            {
                $db = new PDO(self::$dsn, self::$db_user, self::$db_pass, self::$opt);
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
                    `id` SMALLINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                    `username` VARCHAR(100) NOT NULL,
                    `email` VARCHAR(100) NOT NULL,
                    `password` VARCHAR(100) NOT NULL,
                    PRIMARY KEY (`id`),
                    UNIQUE INDEX `id_UNIQUE` (`id` ASC),
                    UNIQUE INDEX `email_UNIQUE` (`email` ASC),
                    UNIQUE INDEX `username_UNIQUE` (`username` ASC));
            ";

            $table2 = "CREATE TABLE `profiles` (
            `id` smallint(10) unsigned NOT NULL AUTO_INCREMENT,
            `user_id` smallint(10) unsigned NOT NULL,
            `first_name` varchar(100) NOT NULL,
            `last_name` varchar(100) NOT NULL,
            `CP` varchar(100) DEFAULT NULL,
            `phone` varchar(100) DEFAULT NULL,
            `address` varchar(100) DEFAULT NULL,
            `avatar` varchar(100) DEFAULT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `id_UNIQUE` (`id`),
            UNIQUE KEY `avatar_UNIQUE` (`avatar`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1
                    ";

            $db = self::connect();

            $db = self::connect();

            try
            {
                $use = "use eventr_db";
                $db->exec($use);
                $db->exec($table);
                $db->exec($table2);
            }
            catch(PDOException $Exception)
            {
                echo $Exception->getMessage();
            }
         }

        public static function migrateJSON()
        {

        }

        public static function existDB()
        {

        }

    }



    db::createDB();
    db::createTable();
    // $algo = db::connect();

    // var_dump($algo);

?>
