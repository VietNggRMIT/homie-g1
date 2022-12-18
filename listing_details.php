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
                        <div class="col-lg-7">

                            <div class="listing-img-carousel">
                                <div id="carouselExampleIndicators" class="carousel slide listing-carousel" data-bs-ride="true">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                            <img src="php1\resources\listing_image\1.jpg" class="d-block w-100 img-fluid">
                                        </button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                                            <img src="php1\resources\listing_image\2.jpg" class="d-block w-100 img-fluid">
                                        </button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                                            <img src="php1\resources\listing_image\3.jpg" class="d-block w-100 img-fluid">
                                        </button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="php1\resources\listing_image\1.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="php1\resources\listing_image\2.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="php1\resources\listing_image\3.jpg" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>                       
                            </div>

                        </div>
                        <div class="col-lg-5">
                            <div class="card listing-details">

                                <div class="card-body">
                                    <div class="card-title h1">Nhà mặt phố, bố làm to</div>
                                    <div class="h6 mb-2">Posted by: <a href="#">Viet Dep Trai</a></div>
                                    <hr class="baby">
                                    <div class="card-listing-location d-flex align-items-center mb-3">
                                        <i class="fa-solid fa-location-dot mr-1"></i>
                                        <p class="card-text">123 Doi Can, Ba Dinh, Ha Noi</p>
                                    </div>
                                    <div class="h5">Listing description:</div>
                                    <div class="card-description mb-3">
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
                                    <div class="h5">Listing amenities:</div>
                                    <div class="row listing-amenities align-items-center justify-content-around text-center gy-3 mb-3">
                                        <div class="col-sm-4 listing-feature" id="spec_tenant">
                                            <i class="fa-solid fa-users-between-lines"></i>
                                            <span>2 person(s)</span>
                                        </div>
                                        <div class="col-sm-4 listing-feature" id="spec_owner">
                                            <i class="fa-solid fa-user-shield"></i>
                                            <span>With owner</span>
                                        </div>
                                        <div class="col-sm-4 listing-feature" id="spec_size">
                                            <i class="fa-solid fa-ruler-combined"></i>
                                            <span>20 &#13217</span>
                                        </div>
                                        <div class="col-sm-4 listing-feature" id="spec_bed">
                                            <i class="fa-solid fa-bed"></i>
                                            <span>1 bedroom(s)</span>
                                        </div>
                                        <div class="col-sm-4 listing-feature" id="spec_bath">
                                            <i class="fa-solid fa-shower"></i>
                                            <span>1 bathroom(s)</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-price-rating d-flex justify-content-between">
                                        <p class="card-text price mb-0"><strong>$420</strong> <span class="light-gray">/mo</span></p>
                                        <div class="listing-rating">
                                            <i class="fa-solid fa-star"></i>
                                            <span>4.7</span>
                                            <span class="sum-review light-gray">(32)</span>
                                        </div>
                                    </div>  
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-warning btn-lg d-block" href="#">Apply now!</a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="card">
                            <div class="title mt-3">
                                <div class="h2">Owner information</div>
                                <hr class="baby">
                            </div>
                            <div class="row gx-4">
                                <div class="col col-lg-4">
                                    <div class="col d-flex align-items-center">
                                        <div class="profile-pic-section mr-1">
                                            <div class="profile-pic-container">
                                                <img class="card-img-top" src="https://i.pinimg.com/originals/ea/cb/35/eacb35204ab50f96206bfe8013ccb7ec.jpg" style="height: 50px;" alt="Card image cap">
                                            </div>
                                        </div>
                                        <div class="owner-info">
                                            <div class="h3">Viet Dep Trai</div>
                                            <div class="listing-rating">
                                                <i class="fa-solid fa-star"></i>
                                                <span>4.7</span>
                                                <span class="sum-review light-gray">(32)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p>"Short user description that user can choose to write down, whatever text here display here"</p>
                                    </div>
                                </div>
                                <div class="col col-lg-4">
                                    <div class="quick-info">
                                        <ul>
                                            <li><p><i class="fa-regular fa-compass"></i> Thanh Hoa, Viet Nam</p></li>
                                            <li><p><i class="fa-solid fa-mobile-screen"></i> Phone: 0123456789 </p></li>
                                            <li><p><i class="fa-regular fa-envelope"></i> Email: email@email.com</p></li>
                                            <li><p><i class="fa-regular fa-user"></i> Member since 28/11/2022</p></li>
                                            <li><p><i class="fa-sharp fa-solid fa-cake-candles"></i> D.O.B: 6/12/2000</p></li>
                                        </ul>
                                    </div>
                                    <btn class="btn btn-primary">View profile</btn>
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