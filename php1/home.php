<?php
//plan: show all properties here
    include("func.php");
    session_start();
    echo "<p><a href=\"login.php\">Landlords, log in here</a></p>";
    echo "<p><a href=\"signup.php\">Sign up</a></p>";
    if(isset($_SESSION)){
        echo "<p><a href=\"account.php\">Account</a></p>";
    }
    function read_searchfilter() { //to be replaced by sql commands
        $file_name = 'db/property.csv';
        $fp = fopen($file_name, 'r');
        $first = fgetcsv($fp);
        $props = [];
        while ($row = fgetcsv($fp)) {
            $i = 0;
            $prop = [];
            foreach ($first as $col_name) {
                $prop[$col_name] =  $row[$i];
                $i++;
            }
            if(isset($_POST['min_price']) && is_numeric($_POST['min_price'])){
                if($prop['monthly_rent'] < $_POST['min_price']){
                    continue;
                }
            }
            if(isset($_POST['max_price']) && is_numeric($_POST['max_price'])){
                if($prop['monthly_rent'] > $_POST['max_price']){
                    continue;
                }
            }
            if(isset($_POST['pname']) && !empty($_POST['pname'])){
                if(strpos($prop['pname'], $_POST['pname']) === false){
                    continue;
                }
            }
            $props[] = $prop;
        }
        // overwrite the session variable
        $_SESSION['props'] = $props;
    }
    read_searchfilter();
?>
    <form class="search-filter-form" method="get" action="home.php">
        <!-- Search by name <input type="text" name="prop_name"> -->
        <div class="search-input">
            <input class="form-control" type="search" placeholder="Search..." name="pname">
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
    //pid,landlord,pname,city,district,street_adr,monthly_rent,rating
    if (isset($_SESSION['props'])){
        foreach($_SESSION['props'] as $p_details){
            $pid = $p_details['pid'];
            $pll = $p_details['landlord'];
            $pname = $p_details['pname'];
            $pcity = $p_details['city'];
            $pdist = $p_details['district'];
            $pstreet = $p_details['street_adr'];
            $prent = $p_details['monthly_rent'];
            $prating = $p_details['rating'];
            $pimg = find_prop_pfp($pid);
    ?>
            <div>
                <div>
                    <img src="<?= $pimg; ?>" alt="<?= $pname; ?>">
                </div>
                <div class=card-body>
                    <p><?= "ID: " . $pid . " --- " . $pname . ", rated as: " . $prating . " stars"; ?></p>
                    <form id='ll_form' action="ll_view.php" method="GET">
                        <input type="hidden" name="ll" value="<?= $pll ?>">
                        <a href="javascript:{}" onclick="document.getElementById('ll_form').submit(); return false;">Managed by: <?= $pll ?></a>
                    </form>
                    <p>Monthly rent: <?= $prent; ?></p>
                </div>
                <form action="prop_view.php" method="GET">
                    <input type="hidden" name="pid" value="<?= $pid ?>">
                    <button class="btn btn-primary" type="submit" name="view_prod">View this prop</button>
                </form>
            </div>
    <?php }
    } ?>

