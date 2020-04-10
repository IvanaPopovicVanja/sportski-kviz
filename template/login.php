<?php
    require_once("../classes/user.php");
    require_once("../database/dbuser.php");
?>

<?php include("header.php"); ?>

<?php
    if (isset($_SESSION["user"])) {
        header("Location: home.php");
    }

    $error = [];

    if (isset($_POST["login"])) {
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);

        $dbuser = new DBUser();
        $user = $dbuser->login($email, $password);

        if ($user) {
            $_SESSION["user"] = $user;
            header("Location: /");
        }
        else {
            $error[] = "Email/password incorrect.";
        }
    }
?>

<center>
    <form method="post" id="loginForm">
        <table>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Login" name="login"></td>
            </tr>
        </table>
    </form>

    <?php
        if (!empty($error)) {
            ?>
                <div class="error">
                    <?php foreach ($error as $err) echo $err . "<br>"; ?>
                </div>
            <?php
        }
    ?>
</center>

<?php include("footer.php"); ?>
