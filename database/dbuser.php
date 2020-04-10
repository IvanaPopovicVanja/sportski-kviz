<?php
    require_once("dbutil.php");
    require_once("../classes/user.php");

    class DBUser {

        private $dbutil;

        public function __construct() {
            $this->dbutil = new DBUtil();
        }

        public function register_user($email, $password, $username) {
            $sql = "insert into users (email, password, username) values (:email, :password, :username);";
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            $statement = $this->dbutil->get_connection()->prepare($sql);
            $statement->bindValue("email", $email, PDO::PARAM_STR);
            $statement->bindValue("password", $password_hash, PDO::PARAM_STR);
            $statement->bindValue("username", $username, PDO::PARAM_STR);
           

            $ok = false;
            try {
                $statement->execute();
                $ok = true;
            }
            catch (PDOException $e) {
                $ok = false;
            }

            return $ok;
        }

        public function login($email, $password) {
            $sql = "select * from users where email = :email;";

            $statement = $this->dbutil->get_connection()->prepare($sql);
            $statement->bindValue("email", $email, PDO::PARAM_STR);

            $statement->execute();
            $result = $statement->fetchAll();
            
            if (!empty($result) && password_verify($password, $result[0]["password"])) {
                return $this->get_user_object($result);
            }
            else {
                return null;
            }
        }

        public function update_user($user) {
            $sql = "update User set email = :email, password = :password, firstName = :firstName, lastName = :lastName where email = :oldEmail";

            $statement = $this->dbutil->get_connection()->prepare($sql);
            $statement->bindValue("email", $user->getEmail(), PDO::PARAM_STR);
            $statement->bindValue("password", password_hash($user->getPassword(), PASSWORD_BCRYPT), PDO::PARAM_STR);
            $statement->bindValue("firstName", $user->getFirstName(), PDO::PARAM_STR);
            $statement->bindValue("lastName", $user->getLastName(), PDO::PARAM_STR);
            $statement->bindValue("oldEmail", $_SESSION["user"]->getEmail(), PDO::PARAM_STR);

            $ok = false;
            try {
                $statement->execute();
                $ok = true;
            }
            catch (PDOException $e) {
                $ok = false;
            }

            return $ok;
        }

        public function find_by_email($email) {
            $sql = "select * from User where email = :email;";

            $statement = $this->dbutil->get_connection()->prepare($sql);
            $statement->bindValue("email", $email, PDO::PARAM_STR);

            $statement->execute();

            return $this->get_user_object($statement->fetchAll());
        }

        private function get_user_object($db_row) {
            if (empty($db_row)) {
                return null;
            }

            return new User(
                $db_row[0]["email"],
                $db_row[0]["firstName"],
                $db_row[0]["lastName"]
            );
        }

    }
?>
