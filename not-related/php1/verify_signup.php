<?php
session_start();
include("functions.php");
//trying to access this page without submitting -> login page
if (count($_POST) <= 0 ) { 
    header("Location: login.php");
}
if (isset($_POST["signup"])){
    $userlist = file ('db/landlord.csv'); //read the file into an array of lines
    //username,user_password,user_displayname,user_phone,user_email,user_description
    $new_username   = $_POST["username"];
    $new_password   = $_POST["password"];
    $new_displayname   = $_POST["displayname"];
    $new_phone      = $_POST["phone"];
    $new_email      = $_POST["email"];
    $new_description= $_POST["description"];

    $register_success = true;
    //go line by line to check existing usernames
    foreach ($userlist as $user) {
        $user_details = explode(',', trim($user));
        if($new_uname == $user_details[1]){ //username already exists
            $register_success = false;
            break;
        }
    }
    
    if(!$register_success){ 
        $_SESSION['signup_failed'] = true;
        header("Location: user_signup.php");
        exit();
    }
    //no username dupes -> ok
    //handle profile images
    $target_dir = "resources/user_image/";
    $default_image = $target_dir . "default_user_image.jpg";
    //no pfp -> use default pfp
    if(!file_exists($_FILES['fileup']['tmp_name']) || !is_uploaded_file($_FILES['fileup']['tmp_name'])) {
        $_SESSION['user']['image'] = $default_image;
    }
    else{ //user uploaded some stuff
        $target_file = $target_dir . basename($_FILES["fileup"]["name"]);
        $uploaded = TRUE;
        $imageFileType = strtolower(pathinfo($target_file)['extension']);
        $err_mes = "";
        // Disallow files that are too big
        if ($_FILES["fileup"]["size"] > 5000000) {
            $err_mes = "Sorry, your file is too large.";
            $uploaded = FALSE;
        }
        // Only allow certain file formats
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        if(!in_array($imageFileType, $allowed)) {
            $err_mes = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploaded = FALSE;
        }
        if (!$uploaded) { 
            echo $err_mes . " Please try again.";
            $register_success = FALSE;
            header( "Refresh:5; url=" . $_SESSION['tryagain'], true, 303);
        } 
        else {
            $new_image = $target_dir  . $new_username . "." . $imageFileType;
            if (move_uploaded_file($_FILES["fileup"]["tmp_name"], $new_image)) {
                $_SESSION['user']['image'] = $new_image;
            } else {
                echo "Sorry, there was an error uploading your file. Default pfp used.";
                $_SESSION['user']['image'] = $default_image;
                //header( "Refresh:5; url=index.php", true, 303);
            }
        }
    }
    if($register_success){    
        //username,user_password,user_displayname,user_phone,user_email,user_description
        $user_file = fopen("./db/user.csv", "a");
        $entry = sprintf("%s,%s,%s,%s,%s,%s\n", $new_username, $new_password, $new_displayname, 
                    $new_phone, $new_email, $new_description);
        fwrite($user_file, $entry);
        fclose($user_file);
        $_SESSION['user']['username'] = $new_username;
        $_SESSION['user']['displayname'] = $new_displayname;
        $_SESSION['user']['phone'] = $new_phone;
        $_SESSION['user']['email'] = $new_email;
        $_SESSION['user']['description'] = $new_description;
        $_SESSION['user']['image'] = get_image("user",$new_username);
        unset($_SESSION['signup_failed']);
        header("Location: home.php");
    }
}