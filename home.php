<?php
    session_start();
    $_SESSION['username'];

    $con = mysqli_connect('localhost','root');
    if($con){echo "succes!";}
    mysqli_select_db($con,'sportsquis');

    
?>
<html>
<head></head>
<body>
     <div>
       <h2>Dobro dosli <?php echo $_SESSION['username']; ?></h2>
    </div>
    <?php
       $q = "select*from questions";
       $query=mysqli_query($con,$q);
    ?>
</body>
</html>