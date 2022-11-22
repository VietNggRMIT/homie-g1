<?php
    session_start();
    if(!isset($_SESSION['user']['uname'])){
        header("Location: home.php");
    }
    else{ //landlord logged in, lets print info
        echo "Welcome landlord " . $_SESSION['user']['fullname'] . ", username " . $_SESSION['user']['uname'] . "<br>";
        echo "<img src=\"" . $_SESSION['user']['pfp'] . "\" height=\"150\"></img>";
        echo "<br>Your email is " . $_SESSION['user']['email'] . " and your phone number is " . $_SESSION['user']['phone'];
        echo "<br>Below are your listings:<br>";
    }
?>