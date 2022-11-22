<?php
//reusing web prog page lol sue me
session_start();
include("func.php");
//trying to access this page without submitting -> login page
if(count($_POST) <= 0 ) { 
    header("Location: login.php");
  }
if (isset($_POST["login"])){
    $userN = $_POST['uname'];
    $passW = $_POST['psw'];
    $userlist = file ('db/landlord.csv');
    $success = false;
    foreach ($userlist as $user) { //user: a line in the db file
        $user_details = explode(',', trim($user)); //trim so that the new line doesnt get counted as pw
        //using plain text to test, make sure to use hash
        if ($user_details[0] == $userN && $user_details[4] == $passW) {
            unset($_SESSION['login']);
            //set session user details
            $_SESSION['user']['uname'] = $userN;
            $_SESSION['user']['fullname'] = $user_details[1];
            $_SESSION['user']['phone'] = $user_details[2];
            $_SESSION['user']['email'] = $user_details[3];
            //get user pfp
            $_SESSION['user']['pfp'] = get_pfp($_SESSION['user']['uname']);         
            $success = true;
            break;
        }
    }
    if ($success) {
        header("Location: account.php");
    } else {
        $_SESSION['login'] = false;
        header("Location: login.php");
    }
}