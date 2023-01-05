@extends('layouts.app')
@section('title', 'Articles')
@section('content')

    <div class="initial-post">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col" id="first-box">
                    <h1>Ready for your adventure in the city?</h1>
                    <p><br>
                    Moving to the city is a new experience,<br>
                    it can be overwhelm at first. We will <br>
                    guide you through how to start this <br>
                    journey and be ready for anything. <br><br>
                    <button type="button" class="btn btn-dark" onClick="document.getElementById('middle').scrollIntoView();"><h3>Let's get going!</h3></button>                
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="middle">
        <div class="row">
            <div class=" col-lg-8">
                <div class="container bcontent">
                    <div class="news-art">
                        <h2>Recent news</h2>
                        <hr />
                        <div class="card-columns">
                            <div class="card" style="width: 700px;">
                                <div class="row no-gutters">
                                    <div class="col-md-5">
                                        <img class="card-img" src="{{ asset('storage/images/article_image/food-article1.jpg')}}" alt="Suresh Dasari Card">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <a href="#"><h3 class="card-title">Cheap dish student can make</h3></a>
                                            <p class="card-text">Many cheap dish with nutrious ingridient for newbie to cook!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 700px;">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img class="card-img" src="{{ asset('storage/images/article_image/cover2.jpg')}}" alt="Suresh Dasari Card">
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="card-body">
                                            <a href="#"><h3 class="card-title">Law school to teach Law</h3></a>
                                            <p class="card-text">The Vietnamese Prime Minister decided that it is best to teach law in law school!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 700px;">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img class="card-img" src="{{ asset('storage/images/article_image/cover3.jpg')}}" alt="Suresh Dasari Card">
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="card-body">
                                            <a href="#"><h3 class="card-title">Hanoi eating guide</h3></a>
                                            <p class="card-text">Cheap but yummy dishes is what every college students want, so why not go over some!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 700px;">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img class="card-img" src="{{ asset('storage/images/article_image/cover4.jpg')}}" alt="Suresh Dasari Card">
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="card-body">
                                            <a href="#"><h3 class="card-title">HCMC UT student to study</h3></a>
                                            <p class="card-text">Yep, that right, the students is studying right now, you probably should too!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 700px;">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img class="card-img" src="{{ asset('storage/images/article_image/cover5.jpg')}}" alt="Suresh Dasari Card">
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="card-body">
                                            <a href="#"><h3 class="card-title">NEU overcome their goals</h3></a>
                                            <p class="card-text">The amount of student sign up is a lot not gonna lie, NEU plan to reduce the intake!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 700px;">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img class="card-img" src="{{ asset('storage/images/article_image/cover6.jpg')}}" alt="Suresh Dasari Card">
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="card-body">
                                            <a href="#"><h3 class="card-title">Some comfort morning food</h3></a>
                                            <p class="card-text">Eating pho for the morning can be consider a ritual that every Vietnamese has to do!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 700px;">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img class="card-img" src="{{ asset('storage/images/article_image/cover7.png')}}" alt="Suresh Dasari Card">
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="card-body">
                                            <a href="#"><h3 class="card-title">RMIT to build Da Nang campus</h3></a>
                                            <p class="card-text">Nope, this just a made up head title to get some view, carry on mate!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar article">
                    <img class="img-fluid" src="{{ asset('storage/images/article_image/ad-banner.png')}}"><br>
                    <img class="img-fluid" src="{{ asset('storage/images/article_image/ad-banner-2.png')}}"><br>
                    <img class="img-fluid" src="{{ asset('storage/images/article_image/ad-banner-3.png')}}">                   
                </div>
            </div>
        </div>
    </div>

@endsection