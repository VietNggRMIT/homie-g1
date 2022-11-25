<?php 
    session_start();
    if(isset($_SESSION['login'])){
        echo "====Wrong username or password====<br>";
    }
    echo "Landlords, log in below!"; 
?>

<form action="verify_login.php" method="post">
    <label for="username">Username</label>
    <input class="form-control" required type="text" id="username" name="username" placeholder="Username"><br>
    <label for="password">Password</label>
    <input class="form-control" required type="password" id="password" name="password" placeholder="Password"><br>

    <button class="btn btn-lg btn-form" type="submit" name="login">Sign in</button>
</form>

<p><a href="user_signup.php">New to site? Sign up</a></p>
