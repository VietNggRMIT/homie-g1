<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="js/scripts.js" async></script>
        <script src="https://kit.fontawesome.com/8f1f885a37.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
        <title>Index</title>
    </head>

    <body>
        <?php 
            require('header.php');
        ?>

        <main>
            <div class="main-wrapper">
                <div class="container account-container">
                    <div class="row account-bg">
                        <div class="col-lg-7 d-lg-flex d-none position-relative account-bgi bgi-signin">
                            <div class="overlay overlay-signin">
                                <div class="hero-item slogan">
                                    <h2>Reliable and affordable housing starts here</h2>
                                    <h2>Renting easily like renting from your Homie</h2>
                                </div>
                                <div class="hero-item"></div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="card account-card">
                                <div class="card-content">
                                    <h2>Welcome back!</h1>
                                    <form>
                                        <div class="form-group mb-3">
                                            <label for="username">Username</label>
                                            <div class="input-group">
                                                <i class="fa-solid fa-user"></i>
                                                <input class="form-control" id="username" name="username" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="password">Pasword</label>
                                            <div class="input-group">
                                                <i class="fa-solid fa-key"></i>
                                                <input class="form-control" id="password" name="password" placeholder="Pasword">
                                            </div>
                                        </div>
                                        <div class="d-grid col-6 mx-auto mb-5">
                                            <button class="btn btn-primary" type="submit" name="signup">Sign in</button>
                                        </div>
                                        <p class="text-center">Need an account? <a href="user_signup.php">Sign up</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php 
            require('footer.php');
            require('bootstrapjs.php')
        ?>

    </body>
</html>