<?php
//plan: show all properties here
    include("functions.php");
    session_start();
    echo "<p><a href=\"user_login.php\">Landlords, log in here</a></p>";
    echo "<p><a href=\"user_signup.php\">Sign up</a></p>";
    if(isset($_SESSION['user']['username'])){
        echo "<p><a href=\"user_account.php?username=" . $_SESSION['user']['username'] ."&view_user=\">Account</a></p>";
    }
    function read_searchfilter() { //to be replaced by sql commands
        $file_name = './db/listing.csv';
        $fp = fopen($file_name, 'r');
        $first = fgetcsv($fp);
        $listings = [];
        while ($row = fgetcsv($fp)) {
            $i = 0;
            $listing = [];
            foreach ($first as $col_name) {
                if(array_key_exists($i, $row)){
                    $listing[$col_name] =  $row[$i];
                }
                $i++;
            }
            if(isset($_POST['min_price']) && is_numeric($_POST['min_price'])){
                if($listing['listing_price'] < $_POST['min_price']){
                    continue;
                }
            }
            if(isset($_POST['max_price']) && is_numeric($_POST['max_price'])){
                if($listing['listing_price'] > $_POST['max_price']){
                    continue;
                }
            }
            if(isset($_POST['listing_name']) && !empty($_POST['listing_name'])){
                if(strpos($listing['listing_name'], $_POST['listing_name']) === false){
                    continue;
                }
            }
            $listings[] = $listing;
        }
        // overwrite the session variable
        $_SESSION['listings'] = $listings;
    }
    read_searchfilter();
?>
    <form class="search-filter-form" method="post" action="home.php">
        <div class="search-input">
            <input class="form-control" type="search" placeholder="Search..." name="listing_name">
        </div>
        <div class="filter-input">
            <input class="form-control" type="number" oninput="validity.valid || (value='');" onkeypress="isNum(event)" id="min_price" name="min_price" min="0.00" step="1" placeholder="Min price">
            <input class="form-control" type="number" oninput="validity.valid || (value='');" onkeypress="isNum(event)" id="max_price" name="max_price" min="0.00" step="1" placeholder="Max price">
        </div>
        <div class="form-btn">
            <button class="btn btn-warning btn-lg" type="submit" name="act">Filter</button>
        </div>
    </form>
<?php
    //get and show details for all properties matching filters
    //listing_id,username,listing_name,listing_city,listing_district,listing_address,
    //listing_price,listing_review_average,listing_description
    if (isset($_SESSION['listings'])){
        foreach($_SESSION['listings'] as $listing_details){
            $listing_id = $listing_details['listing_id'];
            $listing_user = $listing_details['username'];
            $listing_name = $listing_details['listing_name'];
            $listing_city = $listing_details['listing_city'];
            $listing_district = $listing_details['listing_district'];
            $listing_address = $listing_details['listing_address'];
            $listing_price = $listing_details['listing_price'];
            $listing_review_average = $listing_details['listing_review_average'];
            $listing_image = get_image("listing", $listing_id);
    ?>
            <div>
                <div>
                    <img src="<?= $listing_image; ?>" alt="<?= $listing_name; ?>" height="150">
                </div>
                <div class=card-body>
                    <p><?= "ID: " . $listing_id . " --- " . $listing_name . ", rated as: " . $listing_review_average . " stars"; ?></p>
                    <!-- <a href="user_account.php?username=<?= $listing_user ?>&view_user=">Managed by: <?= $listing_user ?></a> -->
                    <a href="#">Managed by: <?= $listing_user ?></a>
                    <p>Address: <?= $listing_address . ", " . $listing_district . ", " . $listing_city ?></p>
                    <p>Monthly rent: <?= $listing_price; ?></p>
                    <a href="listing_view.php?listing_id=<?= $listing_id ?>&view_listing=">View this listing</a><br>
                </div>
            </div>
    <?php }
    } ?>

