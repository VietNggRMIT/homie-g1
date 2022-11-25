<?php
    session_start();
    include("functions.php");
    if (count($_GET) <= 0 ) { 
        header("Location: home.php");
    }
    if (isset($_GET["view_user"])){
    //print info (currently need logging in)
        echo "Property manager " . $_SESSION['user']['displayname'] . ", username " . $_SESSION['user']['username'] . "<br>";
        echo "<img src=\"" . $_SESSION['user']['image'] . "\" height=\"150\"></img>";
        echo "<br>Email: " . $_SESSION['user']['email'] . " --- Phone number: " . $_SESSION['user']['phone'];
        echo "<br>Description: " . $_SESSION['user']['description'];
        echo "<br>Below are this user's listings:<br>";
        if(isset($_SESSION['user']['username']) && ($_SESSION['user']['username']) == $_GET['username']){
            echo "Add listings...";
        }
    }
?>