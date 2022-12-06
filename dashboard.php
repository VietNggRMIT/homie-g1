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
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
        <title>Index</title>
    </head>
    <header>
        <?php
            require('header.php');
        ?>
    </header>
    <body>
        <div class="main-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="banner-dashboard">
                            <div class="card" style="width: 300px;">
                                <div class="box">
                                    <img class="card-img-top rounded-circle"  src="https://i.pinimg.com/originals/ea/cb/35/eacb35204ab50f96206bfe8013ccb7ec.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body text-center">
                                <hr>
                                <h5 class="card-name">Mr white</h5><br>
                                <p><i class="fa-solid fa-star"></i><b>3.6</b> (69)</p>
                                <p class="card-text">"Short user description that user can choose to write down, whatever text here display here"</p>
                                <ul class="social-icons">
                                    <li><a class="icons" href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a class="icons" href="https://github.com/VietNggRMIT/homie-g1"><i class="fa-brands fa-youtube"></i></a></li>  
                                </ul>
                                <br>
                                    <div class="quick-info">
                                        <ul id="5">
                                            <li><p><i class="fa-solid fa-house"></i> Thanh Hoa, Viet Nam</p></li>
                                            <li><p><i class="fa-solid fa-user"></i> Member since 28/11/2022</p></li>
                                            <li><p><i class="fa-sharp fa-solid fa-cake-candles"></i> Birthday: 6/12/2000</p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="card accounts-info">
                                    <div class="card-header">User information changing</div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputdecription">Description</label>
                                                    <input class="form-control" id="inputdecription" type="text" placeholder="Enter your decription name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLocation">Location</label>
                                                    <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address">
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                                    <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday">
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="button">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                                <br>
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
                </div>
            </div>
        </div>
    </body>
    <?php
        require('footer.php');
    ?>