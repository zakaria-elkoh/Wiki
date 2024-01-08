<?php

    namespace App\Config;

    use PDO;
    use PDOException;

    require_once __DIR__ . '/../../vendor/autoload.php';

    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    class DbConfig
    {
        protected $userName;
        protected $host;
        protected $dbName;
        protected $password;

        public function __construct() {
            $this->host = $_ENV["DB_host"];
            $this->dbName = $_ENV["DB_dbName"];
            $this->userName = $_ENV["DB_userName"];
            $this->password = $_ENV["DB_password"];
        }

        public  function getConnection()
        {
            try {
                $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->userName, $this->password);
                echo "connected!";
                return $this->db;
            } catch(PDOException $e){
                echo $e->getMessage();
            }       
        }

    }
