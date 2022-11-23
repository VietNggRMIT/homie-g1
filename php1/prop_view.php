<?php
    //view a single property
    //input: pid
    //output: property details, property documents, reviews with pid
    session_start(); 
    include("func.php");
    if (count($_GET) <= 0 ) { 
        header("Location: home.php");
    }
    if (isset($_GET["view_prop"])){
        $pid = $_GET["pid"];
        $pimg = find_prop_pfp($pid);
        $p_details = get_prop_dt($pid);

        $pll = $p_details['landlord'];
        $pname = $p_details['pname'];
        $pcity = $p_details['city'];
        $pdist = $p_details['district'];
        $pstreet = $p_details['street_adr'];
        $prent = $p_details['monthly_rent'];
        $prating = $p_details['rating'];
    }
    else{ //naked url -> tampering?
        header("Location: index.php");
    }
?>
    <h1><?= "ID: " . $pid . " -- " . $pname; ?></h1>
    <a href="ll_view.php?ll=<?= $pll ?>&view_ll=">Managed by: <?= $pll ?></a>
    <div>
        <h6>Property description: </h6>
        
    </div>
    <div>
        <h3>Address: <?= $pstreet . ", " . $pdist . ", " . $pcity ?></h3>
    </div>
    <div>
        <h2><?= "Monthly rent: " . $prent; ?> VND</h2>
    </div>