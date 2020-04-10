<?php
    require_once("../database/dbuser.php");
    require_once("../helper/validateInput.php");
    require_once("../helper/checkLogged.php");
?>

<?php
    include("header.php");
?>

<?php
    if (checkLogged()) {
        header("Location: /");
    }

    $error = [];
    $successful = "";
    $unsuccessful = "";

    if (isset($_POST["register"])) {
        $email = filter_var(trim(htmlspecialchars($_POST["email"])), FILTER_VALIDATE_EMAIL);
        $password = trim(htmlspecialchars($_POST["password"]));
        $username = trim(htmlspecialchars($_POST["username"]));
        
    
        validateUser($email, $password, $username, $error);
        
        if (empty($error)) 
        {

            $dbuser = new DBUser();
            if ($dbuser->register_user($email, $password, $username)) {
                $successful = "Registration was successful. You can go to login page.";
            }
            else {
                $unsuccessful = "Registration was not successful. Maybe email is already taken.";
            }
        }
    }
?>

<center>
    <h3>Registration</h3>
    <form method="post" id="registerForm">
        <table>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>User name:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Register" name="register"></td>
            </tr>

            
        </table>
    </form>
    <?php
        if (!empty($error)) {
    ?>
        <div class="error">
            <?php foreach ($error as $err) {
                echo  $err . "<br>";
            } ?>
        </div>
    <?php
        }
    ?>
    <?php
        if (!empty($successful)) {
            ?>
                <div class="success"><?php echo $successful; ?></div>
            <?php
        }
        if (!empty($unsuccessful)) {
            ?>
                <div class="error"><?php echo $unsuccessful; ?></div>
            <?php
        }
    ?>
</center>

<?php
    include("footer.php");
?>
