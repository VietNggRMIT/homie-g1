<?php 
echo "teehee";
session_start();
if (isset($SESSION['signup_failed'])){
    echo "=== Your username is not unique, please try again ===";
}
?>
<p><a href="home.php">Home</a></p>
<p><a href="login.php">Log in</a></p>

<form action="verify_signup.php" method="post" enctype="multipart/form-data">
    <label for="biz_name">Full name</label>
    <input class="form-control" id="fullname" name="fullname" placeholder="Full name"><br>
    <label for="biz_name">Phone number</label>
    <input class="form-control" id="phone" name="phone" placeholder="Phone number"><br>
    <label for="biz_name">Email</label>
    <input class="form-control" id="email" name="email" placeholder="Email"><br><br>

    <label for="uname">Username</label>
    <input class="form-control" id="username" name="uname" placeholder="Username"><br>
    <label for="psw">Password</label>
    <input class="form-control" type="password" id="password" name="psw" placeholder="Password"><br>
    <label for="fileup">Upload your profile picture (if you want to)</label><br>
    <input class="form-control pic-upload" type="file" id="formFile" name="fileup"><br><br>

    <button class="btn btn-lg btn-form" type="submit" name="signup">Sign up</button>
</form>