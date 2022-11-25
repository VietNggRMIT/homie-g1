<?php
    //include functions to be used in files
    //get image from username or listing_id; 
    //PARAM: $role: specify role 'user' or 'listing; $id: username or listing_id
    function get_image($role, $id){ 
        $img = "";
        if($role == "user"){
            $img_dir = "resources/user_image/";
            $default_img = $img_dir . "default_user_image.jpg";
        }
        elseif ($role == "listing") {
            $img_dir = "resources/listing_image/";
            $default_img = $img_dir . "default_listing_image.jpg";
        }
        else{ //rewrite the code please
        }

        $scan = scandir($img_dir);
        foreach($scan as $file) {
            if ($file == "." || $file == "..") { }//do nothing - just to be safe
            else{
                $file_id = explode(".", $file)[0]; //id portion of img file
                if($id == $file_id){
                    $img = $img_dir . $file;
                    break; //get the first image file only
                }
            }
        }
        if(!$img){
            $img = $default_img;
        }
        return $img;
    }

    //methods below are to be replaced by SQL commands, but put them here just to be safe
    function get_listing_details($listing_id){ //get details from property id
        $prop_fname = "db/listing.csv";
        $fp = fopen($prop_fname, 'r');
        $first = fgetcsv($fp);
        $listing_result = [];
        while ($row = fgetcsv($fp)) {
            $i = 0;
            $listing_row = []; //single row of listing.csv
            foreach ($first as $col_name) {
                $listing_row[$col_name] =  $row[$i];
                $i++;
            }
            if($listing_row['listing_id'] == $listing_id){
                $listing_result['listing_id'] = $listing_row['listing_id'];
                $listing_result['username'] = $listing_row['username'];
                $listing_result['listing_name'] = $listing_row['listing_name'];
                $listing_result['listing_city'] = $listing_row['listing_city'];
                $listing_result['listing_district'] = $listing_row['listing_district'];
                $listing_result['listing_address'] = $listing_row['listing_address'];
                $listing_result['listing_price'] = $listing_row['listing_price'];
                $listing_result['listing_review_average'] = $listing_row['listing_review_average'];
                $listing_result['listing_description'] = $listing_row['listing_description'];

                if($listing_result['listing_review_average'] == ''){
                    $listing_result['listing_review_average'] = 'No reviews yet.';
                }
                break;
            }
        }
        if($listing_result) { return $listing_result; }
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