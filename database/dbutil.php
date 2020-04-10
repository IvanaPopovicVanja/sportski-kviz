<?php
    class DBUtil {
        
        private $conn;

        public function __construct($configFile = "config.ini") {
            $_SERVER["DOCUMENT_ROOT"]="E:/sportski kviz repo/sportski-kviz";
            if ($config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . "/config/" . $configFile)) {
                $host = $config["host"];
                $db = $config["database"];
                $user = $config["user"];
                $password = $config["password"];

                $this->conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        }

        public function __destruct() {
            $this->conn = null;
        }

        public function get_connection() {
            return $this->conn;
        }

    }
?>
