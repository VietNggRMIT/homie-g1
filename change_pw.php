<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/8f1f885a37.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
        <title>Index</title>
    </head>

    <body>
        <?php
            require('header.php');
        ?>

        <main>
            <div class="main-wrapper">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="card change-pass">
                                <div class="card-header">Change Password</div>
                                    <div class="card-body">
                                        <form>
                                            <div class="mb-3">
                                            <label class="small mb-1" for="currentPassword">Current Password</label>
                                            <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password">
                                        </div>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="newPassword">New Password</label>
                                            <input class="form-control" id="newPassword" type="password" placeholder="Enter new password">
                                        </div>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                            <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password">
                                        </div>
                                        <button class="btn btn-primary" type="button">Save</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php
            require('footer.php');
            require('bootstrapjs.php');
        ?>

        <script src="js/scripts.js" async></script>
    </body>

</html>