<?php
    //include functions to be used in files
    function get_pfp($uname){ //get pfp from username; used when logging in/signing up
        //get user pfp
        $pfp_dir = "res/pfp/";
        $scan = scandir($pfp_dir);
        $my_pfp = "";
        foreach($scan as $file) {
            if ($file == "." || $file == "..") { }//do nothing - just to be safe
            else{
                $file_uname = explode(".", $file)[0]; //username portion of img file
                if($uname == $file_uname){
                    $my_pfp = $pfp_dir . $file;
                }
            }
        }
        if(!$my_pfp){
            $my_pfp = $pfp_dir . "default_pfp.jpg";
        }
        return $my_pfp;
    }
    function find_prod_pfp($pid){ //get picture from property id
        $pimg = "";
        //get property image, use default img if not available
        $prod_dir = "res/prop/";
        $def_prod = $prod_dir . "default_prop.jpg";
        $scan = scandir($prod_dir);
        foreach($scan as $file) {
            if ($file == "." || $file == "..") { }//do nothing - just to be safe
            else{
                $file_uname = explode(".", $file)[0]; //pid portion of img file
                if($pid == $file_uname){
                    $pimg = $prod_dir . $file;
                }
            }
        }
        if(!$pimg){
            $pimg = $def_prod;
        }
        return $pimg;
    }


    //methods below are to be replaced by SQL commands, but put them here just to be safe
    function get_prod_deets($pid){ //get details from product id
        $prod_fname = "../db/products.csv";
        $fp = fopen($prod_fname, 'r');
        $first = fgetcsv($fp);
        $p_deets = [];
        while ($row = fgetcsv($fp)) {
            $i = 0;
            $prod = []; //single row of order
            foreach ($first as $col_name) {
                $prod[$col_name] =  $row[$i];
                $i++;
            }
            if($prod['pid'] == $pid){
                $p_deets['pname'] = $prod['product_name'];
                $p_deets['price'] = $prod['price'];
                $p_deets['vendor']= $prod['vendor'];
                $p_deets['description'] = $prod['description'];
                break;
            }
        }
        if($p_deets) { return $p_deets; }
        else { return false; }
    }
    function get_hub_adr($hub){
        $fname = "../db/dhubs.csv";
        $hub_list = file ($fname);
        foreach ($hub_list as $hub_line) {
            $hub_data = explode('|+|',$hub_line);
            if($hub == $hub_data[0])
                return $hub_data[1];
            }
        return false;
    }
    function get_ord_deets($oid){ //get product details from order id
        $ord_fname = "../db/orders.csv";
        $fp = fopen($ord_fname, 'r');
        $first = fgetcsv($fp);
        $o_deets = [];
        while ($row = fgetcsv($fp)) {
            $i = 0;
            $ord = []; //single row of order
            foreach ($first as $col_name) {
                $ord[$col_name] =  $row[$i];
                $i++;
            }
            if($ord['oid'] == $oid){
                $o_deets['products'] = $ord['products'];
                $o_deets['hub'] = $ord['hub'];
                $o_deets['user_addr']= $ord['user_addr'];
                $o_deets['status'] = $ord['status'];
                break;
            }
        }
        if($o_deets) { return $o_deets; }
        else { return false; }
    }