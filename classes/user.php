<?php
    class User {

        private $email;
        private $username;
        private $img;
        private $password;

        public function __construct($email, $username, $img, $password = "") {
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;
            $this->img = $img;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getUserName() {
            return $this->username;
        }

        public function getImage() {
            return $this->img;
        }

    }
?>
