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
                    <div class="title-section mb-3">
                        <div class="title h1">
                         Property listings
                        </div>
                        <hr class="baby">
                    </div>
                    <div class="search-filter mb-5">
                        <form>
                            <div class="row">
                                <div class="col-md-5 mx-auto">
                                    <div class="input-group">
                                        <input class="form-control border-end-0 border rounded-pill" type="search" placeholder="Search" id="search-input">
                                        <span class="input-group-append">
                                            <button class="btn btn-outline-secondary border-bottom-0 border rounded-pill ms-n5" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row row-cols-lg-3">
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