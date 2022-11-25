<?php
    //view a single listing
    //input: listing_id
    //output: property details, property documents, reviews with pid

    //listing_id,username,listing_name,listing_city,listing_district,listing_address,
    //listing_price,listing_review_average,listing_description
    session_start(); 
    include("functions.php");
    if (count($_GET) <= 0 ) { 
        header("Location: home.php");
    }
    if (isset($_GET["view_listing"])){
        $listing_id = $_GET["listing_id"];
        $listing_image = get_image("listing", $pid);
        $listing_details = get_listing_details($pid);

        $listing_user = $listing_details['username'];
        $listing_name = $listing_details['listing_name'];
        $listing_city = $listing_details['listing_city'];
        $listing_district = $listing_details['listing_district'];
        $listing_address = $listing_details['listing_address'];
        $listing_price = $listing_details['listing_price'];
        $listing_review_average = $listing_details['listing_review_average'];
        $listing_description = $listing_details['listing_description'];
    }
    else{ //naked url -> tampering?
        header("Location: home.php");
    }
?>
    <h1><?= "ID: " . $listing_id . " -- " . $listing_name; ?></h1>
    <a href="user_account.php?username=<?= $pll ?>&view_user=">Managed by: <?= $listing_user ?></a>
    <div>
        <h4>Property description: </h4>
        <h5><?= $listing_description ?></h5>
    </div>
    <div>
        <h3>Address: <?= $listing_address . ", " . $listing_district . ", " . $listing_city ?></h3>
    </div>
    <div>
        <h2><?= "Monthly rent: " . $listing_price; ?> VND</h2>
    </div>