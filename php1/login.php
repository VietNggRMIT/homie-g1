<?= "Landlords, log in below!"; ?>

<form action="verify_login.php" method="post">
    <label for="uname">Username</label>
    <input class="form-control" required type="text" id="username" name="uname" placeholder="Username"><br>
    <label for="psw">Password</label>
    <input class="form-control" required type="password" id="password" name="psw" placeholder="Password"><br>

    <button class="btn btn-lg btn-form" type="submit" name="login">Sign in</button>
</form>

<p><a href="signup.php">New to site? Sign up</a></p>
