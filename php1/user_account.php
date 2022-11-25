<?php
    session_start();
    include("functions.php");
    if (count($_GET) <= 0 ) { 
        header("Location: home.php");
    }
    if (isset($_GET["view_user"])){ ?>
        <a href="home.php">Home</a><br>
    <?php
        $user_details   = get_user_details($_GET['username']);
        $new_user_name  = $user_details['username'];
        $new_user_displayname   = $user_details['user_displayname'];
        $new_user_phone         = $user_details['user_phone'];
        $new_user_email         = $user_details['user_email'];
        $new_user_description   = $user_details['user_description'];
        if(!$new_user_description){
            $new_user_description = "(none)";
        }
        $new_user_image   = get_image("user", $new_user_name);

        echo "Property manager " . $new_user_displayname . ", username " . $new_user_name . "<br>";
        echo "<img src=\"" . $new_user_image . "\" height=\"150\"></img>";
        echo "<br>Email: " . $new_user_email . " --- Phone number: " . $new_user_phone;
        echo "<br>Description: " . $new_user_description . "<br>";
        if(isset($_SESSION['user']['username']) && ($_SESSION['user']['username']) == $new_user_name){
            echo "<a href=\"#\">Add listings...</a>";
        }
        echo "<br><br>=======Below are this user's listings=======<br><br>";
        $file_name = './db/listing.csv';
        $fp = fopen($file_name, 'r');
        $first = fgetcsv($fp);
        while ($row = fgetcsv($fp)) {
            $i = 0;
            $listing = [];
            foreach ($first as $col_name) {
                $listing[$col_name] =  $row[$i];
                if ($col_name == 'size') {
                    $listing[$col_name] = explode(',', $listing[$col_name]);
                }
                $i++;
            }
            if($listing['username'] == $new_user_name){
                $listing_image = get_image("listing", $listing['listing_id']);
            ?>
                <a>
                    <div class="listing-info">
                        <div class="listing-thumbnail">
                            <img src="<?= $listing_image; ?>" class="listing-img" alt="listing image" height="100">
                        </div>
                        <div class="listing-specs">
                            <div class="listing-id">=====ID: <?= $listing['listing_id']; ?></div>
                            <div class="listing-title">Listing Name: <?=$listing['listing_name']; ?> </div>
                            <div class="listing-title">Listing Address: <?= $listing['listing_address'] . ", " . $listing['listing_district'] . ", " . $listing['listing_city']; ?> </div>
                            <div class="listing-price">Monthly Rent: <?= $listing['listing_price']; ?></div>
                            <div class="listing-description">Description: <?= $listing['listing_description']; ?></div><br><br>
                        </div>
                    </div>
                </a>
            <?php }
        }
    }
?>