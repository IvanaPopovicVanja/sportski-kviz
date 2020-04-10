<?php
    function checkLogged() {
        if (isset($_SESSION["user"])) {
            return true;
        }
        else {
            return false;
        }
    }
?>
