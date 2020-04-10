<?php
    function validateUser($email, $password, $username,  &$error) {
        if ($email === false) {
            $error[] = "Email must be valid.";
        }
        if (strlen($password) < 5) {
            $error[] = "Password must be at least 5 characters long.";
        }
        if (empty($username)) {
            $error[] = "First name can't be empty.";
        }
        
    }

    function validateNewItem($name, $price, &$errors) {
        if (trim($name) === "") {
            $errors[] = "Item name is required.";
        }
        if (filter_var($price, FILTER_VALIDATE_INT) === false) {
            $errors[] = "Price must be a number.";
        }
        else if ($price < 1) {
            $errors[] = "Price must be a positive number.";
        }
    }
?>
