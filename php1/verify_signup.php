<?php
session_start();
include("func.php");
//trying to access this page without submitting -> login page
if (count($_POST) <= 0 ) { 
    header("Location: login.php");
}
if (isset($_POST["signup"])){
    $userlist = file ('db/landlord.csv'); //read the file into an array of lines
    //get all the data from POST bc why not
    $new_fullname   = $_POST["fullname"];
    $new_phone      = $_POST["phone"];
    $new_email      = $_POST["email"];
    $new_uname      = $_POST["uname"];
    $new_pw         = $_POST["psw"];
    
    $reg_success = TRUE;
    //go line by line to check existing usernames
    foreach ($userlist as $user) {
        $user_details = explode(',', trim($user));
        if($new_uname == $user_details[1]){ //username already exists
            $reg_success = false;
            break;
        }
    }
    
    if(!$reg_success){ 
        $_SESSION['signup_failed'] = true;
        header("Location: signup.php");
        exit();
    }
    //no dupes -> ok
    //handle profile images; force the user to do this again if they don't submit an image
    $target_dir = "res/pfp/";
    $def_pfp = $target_dir . "default_pfp.jpg";
    //no pfp -> use default pfp
    if(!file_exists($_FILES['fileup']['tmp_name']) || !is_uploaded_file($_FILES['fileup']['tmp_name'])) {
        $_SESSION['user']['pfp'] = $def_pfp;
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
            $reg_success = FALSE;
            header( "Refresh:5; url=" . $_SESSION['tryagain'], true, 303);
        } 
        else {
            $new_pfp = $target_dir  . $new_uname . "." . $imageFileType;
            if (move_uploaded_file($_FILES["fileup"]["tmp_name"], $new_pfp)) {
                $_SESSION['user']['pfp'] = $new_pfp;
            } else {
                echo "Sorry, there was an error uploading your file. Default pfp used.";
                $_SESSION['user']['pfp'] = $def_pfp;
                //header( "Refresh:5; url=index.php", true, 303);
            }
        }
    }
    if($reg_success){    
        $pw_file = fopen("./db/landlord.csv", "a");
        $entry = sprintf("%s,%s,%s,%s,%s\n", $new_uname, $new_fullname, $new_phone, $new_email, $new_pw);
        fwrite($pw_file, $entry);
        fclose($pw_file);
        $_SESSION['user']["uname"] = $new_uname;
        $_SESSION['user']['fullname'] = $new_fullname;
        $_SESSION['user']['phone'] = $new_phone;
        $_SESSION['user']['email'] = $new_email;
        $_SESSION['user']['pfp'] = get_pfp($new_uname);
        unset($_SESSION['signup_failed']);
        header("Location: home.php");
    }
}