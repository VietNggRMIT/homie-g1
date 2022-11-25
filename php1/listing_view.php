<?php
    //view a single listing
    //input: listing_id
    //output: listing details, listing image(s), listing documents, reviews with listing_id
    session_start(); 
    include("functions.php");
    if (count($_GET) <= 0 ) { 
        header("Location: home.php");
    }
    if (isset($_GET["view_listing"])){
        $listing_id = $_GET["listing_id"];
        $listing_image = get_image("listing", $listing_id);
        $listing_details = get_listing_details($listing_id);

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
    <a href="user_account.php?username=<?= $listing_user ?>&view_user=">Managed by: <?= $listing_user ?></a>
    <div>
        <h4>Property description: </h4>
        <p><?= $listing_description ?></p>
    </div>
    <div>
        <h3>Address: <?= $listing_address . ", " . $listing_district . ", " . $listing_city ?></h3>
    </div>
    <div>
        <h2><?= "Monthly rent: " . $listing_price; ?> VND</h2>
    </div>