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
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="banner-dashboard">
                                <div class="card dashboard-account">
                                    <div class="profile-pic-section mt-3">
                                        <div class="profile-pic-container">
                                            <img class="card-img-top"  src="https://i.pinimg.com/originals/ea/cb/35/eacb35204ab50f96206bfe8013ccb7ec.jpg" alt="Card image cap">
                                        </div>
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
                                        <hr>
                                        <div class="acc-options-btns d-grid gap-2 md-block">
                                            <a class="btn btn-warning">Update info</a>
                                            <a class="btn btn-warning">Change password</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-3">
                                <div class="dashboard-title">
                                    <div class="h2">Your property listings</div>
                                    <div>Description field, maybe this is updateable?</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <a class="card listing-card" href="#">
                                            <div id="carouselControls" class="carousel slide" data-bs-ride="false">
                                                <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="php1\resources\listing_image\1.jpg" class="d-block" alt="listing-img">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="php1\resources\listing_image\2.jpg" class="d-block" alt="listing-img">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="php1\resources\listing_image\3.jpg" class="d-block" alt="listing-img">
                                                </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Nhà chất</h5>
                                                <div class="card-listing-location d-flex mb-2">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    <p class="card-text">123 Mỹ... Đình</p>
                                                </div>
                                                <div class="card-description">
                                                    <p>
                                                        First it marked out a race-course, in a sort of circle, 
                                                        ('the exact shape doesn't matter,' it said,) and then all 
                                                        the party were placed along the course, here and there. There 
                                                        was no 'One, two, three, and away,' but they began running 
                                                        when they liked, and left off when they liked, so that it 
                                                        was not easy to know when the race was over. However, when they 
                                                        had been running half an hour or so, and were quite dry again, 
                                                        the Dodo suddenly called out 'The race is over!' and they all crowded round.
                                                    </p>
                                                </div>
                                                <div class="listing-amenities d-flex mb-3">
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-users-between-lines"></i>
                                                        <span>2 person(s)</span>
                                                    </div>
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-user-shield"></i>
                                                        <span>With owner</span>
                                                    </div>
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-ruler-combined"></i>
                                                        <span>20 &#13217</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="card-price-rating d-flex">
                                                    <p class="card-text price">$420 <span class="light-gray">/mo</span></p>
                                                    <div class="listing-rating">
                                                        <i class="fa-solid fa-star"></i>
                                                        <span>4.7</span>
                                                        <span class="sum-review light-gray">(32)</span>
                                                    </div>
                                                </div>  
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="card listing-card" href="#">
                                            <div id="carouselControls" class="carousel slide card-slider" data-bs-ride="false">
                                                <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="php1\resources\listing_image\1.jpg" class="d-block" alt="listing-img">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="php1\resources\listing_image\2.jpg" class="d-block" alt="listing-img">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="php1\resources\listing_image\3.jpg" class="d-block" alt="listing-img">
                                                </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Nhà chất</h5>
                                                <div class="card-listing-location d-flex mb-2">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    <p class="card-text">123 Mỹ... Đình</p>
                                                </div>
                                                <div class="card-description">
                                                    <p>
                                                        First it marked out a race-course, in a sort of circle, 
                                                        ('the exact shape doesn't matter,' it said,) and then all 
                                                        the party were placed along the course, here and there. There 
                                                        was no 'One, two, three, and away,' but they began running 
                                                        when they liked, and left off when they liked, so that it 
                                                        was not easy to know when the race was over. However, when they 
                                                        had been running half an hour or so, and were quite dry again, 
                                                        the Dodo suddenly called out 'The race is over!' and they all crowded round.
                                                    </p>
                                                </div>
                                                <div class="listing-amenities d-flex mb-3">
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-users-between-lines"></i>
                                                        <span>2 person(s)</span>
                                                    </div>
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-user-shield"></i>
                                                        <span>With owner</span>
                                                    </div>
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-ruler-combined"></i>
                                                        <span>20 &#13217</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="card-price-rating d-flex">
                                                    <p class="card-text price">$420 <span class="light-gray">/mo</span></p>
                                                    <div class="listing-rating">
                                                        <i class="fa-solid fa-star"></i>
                                                        <span>4.7</span>
                                                        <span class="sum-review light-gray">(32)</span>
                                                    </div>
                                                </div>  
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="card listing-card" href="#">
                                            <div id="carouselControls" class="carousel slide card-slider" data-bs-ride="false">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                    <img src="php1\resources\listing_image\1.jpg" class="d-block" alt="listing-img">
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img src="php1\resources\listing_image\2.jpg" class="d-block" alt="listing-img">
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img src="php1\resources\listing_image\3.jpg" class="d-block" alt="listing-img">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Nhà chất</h5>
                                                <div class="card-listing-location d-flex mb-2">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    <p class="card-text">123 Mỹ... Đình</p>
                                                </div>
                                                <div class="card-description">
                                                    <p>
                                                        Welcome to my crib, totally not a trap hau.
                                                        Enjoy your stay at the finest trap hau.
                                                        Set a text wrap limit here
                                                    </p>
                                                </div>
                                                <div class="listing-amenities d-flex mb-3">
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-users-between-lines"></i>
                                                        <span>2 person(s)</span>
                                                    </div>
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-user-shield"></i>
                                                        <span>With owner</span>
                                                    </div>
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-ruler-combined"></i>
                                                        <span>20 &#13217</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="card-price-rating d-flex">
                                                    <p class="card-text price">$420 <span class="light-gray">/mo</span></p>
                                                    <div class="listing-rating">
                                                        <i class="fa-solid fa-star"></i>
                                                        <span>4.7</span>
                                                        <span class="sum-review light-gray">(32)</span>
                                                    </div>
                                                </div>  
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="card listing-card" href="#">
                                            <div id="carouselControls" class="carousel slide card-slider" data-bs-ride="false">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                    <img src="php1\resources\listing_image\1.jpg" class="d-block" alt="listing-img">
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img src="php1\resources\listing_image\2.jpg" class="d-block" alt="listing-img">
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img src="php1\resources\listing_image\3.jpg" class="d-block" alt="listing-img">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Nhà chất</h5>
                                                <div class="card-listing-location d-flex mb-2">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    <p class="card-text">123 Mỹ... Đình</p>
                                                </div>
                                                <div class="card-description">
                                                    <p>
                                                        Welcome to my crib, totally not a trap hau.
                                                        Enjoy your stay at the finest trap hau.
                                                        Set a text wrap limit here
                                                    </p>
                                                </div>
                                                <div class="listing-amenities d-flex mb-3">
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-users-between-lines"></i>
                                                        <span>2 person(s)</span>
                                                    </div>
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-user-shield"></i>
                                                        <span>With owner</span>
                                                    </div>
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-ruler-combined"></i>
                                                        <span>20 &#13217</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="card-price-rating d-flex">
                                                    <p class="card-text price">$420 <span class="light-gray">/mo</span></p>
                                                    <div class="listing-rating">
                                                        <i class="fa-solid fa-star"></i>
                                                        <span>4.7</span>
                                                        <span class="sum-review light-gray">(32)</span>
                                                    </div>
                                                </div>  
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="show-more d-flex justify-content-center mb-3">
                                    <button class="btn btn-outline-primary">Show more</button>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="dashboard-title">
                                    <h1>Your blogposts</h1>
                                </div>
                                <hr>
                                <div class="row row-cols-1 row-cols-md-2 g-4">
                                    <div class="col">
                                        <a class="card listing-card blog-card" href="#">
                                            <img src="php1\resources\background\tra-da-via-he-hanoi.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Last updated 3 day(s) ago</small>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="card listing-card blog-card" href="#">
                                            <img src="php1\resources\background\tra-da-via-he-hanoi.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Last updated 3 day(s) ago</small>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="card listing-card blog-card" href="#">
                                            <img src="php1\resources\background\tra-da-via-he-hanoi.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Last updated 3 day(s) ago</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="show-more d-flex justify-content-center mb-3">
                                    <button class="btn btn-outline-primary">Show more</button>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="dashboard-title">
                                    <div class="h5">Your applications</div>
                                </div>
                                <hr>
                                <div class="card-body application-listings">
                                    <div class="row column-labels">
                                        <label class="col-4 property">Property</label>
                                        <label class="col-2 applicant">Applicant</label>
                                        <label class="col-4 location">Location</label>
                                        <label class="col-2 date">Date</label>
                                    </div>
                                    <div class="applications">
                                        <a class="row app" href="#">
                                            <div class="col-4 property txt-wrap">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac leo non diam egestas euismod ut ac mauris. Praesent rutrum velit eget massa viverra placerat. Proin nec condimentum magna.</div>
                                            <div class="col-2 appicant">Handsome Viet</div>
                                            <div class="col-4 location txt-wrap">123hehe, Nhanh Chinh, Thanh Xuan, Ha Noi</div>
                                            <div class="col-2 date">21/01/2000</div>
                                        </a>
                                        <a class="row app" href="#">
                                            <div class="col-4 property txt-wrap">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac leo non diam egestas euismod ut ac mauris. Praesent rutrum velit eget massa viverra placerat. Proin nec condimentum magna.</div>
                                            <div class="col-2 appicant">Handsome Viet</div>
                                            <div class="col-4 location txt-wrap">123hehe, Nhanh Chinh, Thanh Xuan, Ha Noi</div>
                                            <div class="col-2 date">21/01/2000</div>
                                        </a>
                                        <a class="row app" href="#">
                                            <div class="col-4 property txt-wrap">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac leo non diam egestas euismod ut ac mauris. Praesent rutrum velit eget massa viverra placerat. Proin nec condimentum magna.</div>
                                            <div class="col-2 appicant">Handsome Viet</div>
                                            <div class="col-4 location txt-wrap">123hehe, Nhanh Chinh, Thanh Xuan, Ha Noi</div>
                                            <div class="col-2 date">21/01/2000</div>
                                        </a>
                                        <a class="row app" href="#">
                                            <div class="col-4 property txt-wrap">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac leo non diam egestas euismod ut ac mauris. Praesent rutrum velit eget massa viverra placerat. Proin nec condimentum magna.</div>
                                            <div class="col-2 appicant">Handsome Viet</div>
                                            <div class="col-4 location txt-wrap">123hehe, Nhanh Chinh, Thanh Xuan, Ha Noi</div>
                                            <div class="col-2 date">21/01/2000</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
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