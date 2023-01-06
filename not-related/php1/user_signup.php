<?php 
echo "teehee";
session_start();
if (isset($SESSION['signup_failed'])){
    echo "=== Your username is not unique, please try again ===";
}
?>
<p><a href="home.php">Home</a></p>
<p><a href="user_login.php">Log in</a></p>
<!-- username,user_password,user_displayname,user_phone,user_email,user_description -->
<form action="verify_signup.php" method="post" enctype="multipart/form-data">
    <label for="username">Username</label>
    <input class="form-control" id="username" name="username" placeholder="Username"><br>
    <label for="password">Password</label>
    <input class="form-control" type="password" id="password" name="password" placeholder="Password"><br>
    
    <label for="displayname">Full name</label>
    <input class="form-control" id="displayname" name="displayname" placeholder="Display name"><br>
    <label for="phone">Phone number</label>
    <input class="form-control" id="phone" name="phone" placeholder="Phone number"><br>
    <label for="email">Email</label>
    <input class="form-control" id="email" name="email" placeholder="Email"><br><br>
    <label for="description">Description</label>
    <input class="form-control" id="description" name="description" placeholder="Some description about you..."><br><br>

    <label for="fileup">Upload your profile picture (Optional)</label><br>
    <input class="form-control pic-upload" type="file" id="formFile" name="fileup"><br><br>

    <button class="btn btn-lg btn-form" type="submit" name="signup">Sign up</button>
</form>