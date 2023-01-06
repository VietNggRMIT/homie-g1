<?php
//reusing web prog page lol sue me
session_start();
include("functions.php");
//trying to access this page without submitting -> login page
if(count($_POST) <= 0 ) { 
    header("Location: user_login.php");
  }
if (isset($_POST["login"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userlist = file ('./db/user.csv');
    $success = false;
    //username,user_password,user_displayname,user_phone,user_email,user_description
    foreach ($userlist as $user) { //user: a line in the db file
        $user_details = explode(',', trim($user)); //trim so that the new line doesnt get counted as pw
        //using plain text to test, make sure to use hash
        if ($user_details[0] == $username && $user_details[1] == $password) {
            unset($_SESSION['login']);
            //set session user details
            $_SESSION['user']['username'] = $username;
            $_SESSION['user']['displayname'] = $user_details[2];
            $_SESSION['user']['phone'] = $user_details[3];
            $_SESSION['user']['email'] = $user_details[4];
            $_SESSION['user']['description'] = $user_details[5];
            //get user image - profile picture
            $_SESSION['user']['image'] = get_image("user", $_SESSION['user']['username']);
            $success = true;
            break;
        }
    }
    if ($success) {
        header("Location: user_account.php");
    } else {
        $_SESSION['login'] = false;
        header("Location: user_login.php");
    }
}