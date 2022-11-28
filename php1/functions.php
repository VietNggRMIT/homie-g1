<?php
    //include functions to be used in files
    function logout(){
        unset($_SESSION['user']);
    }

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
    
    function get_user_details($username){ //get user details from username
        $user_file = "./db/user.csv";
        $fp = fopen($user_file, 'r');
        $first = fgetcsv($fp);
        $user_details = [];
        while ($row = fgetcsv($fp)) {
            $i = 0;
            $user = []; //single row of user
            foreach ($first as $col_name) {
                $user[$col_name] =  $row[$i];
                $i++;
            }
            if($user['username'] == $username){
                $user_details['username'] = $user['username'];
                $user_details['user_displayname'] = $user['user_displayname'];
                $user_details['user_phone']= $user['user_phone'];
                $user_details['user_email'] = $user['user_email'];
                $user_details['user_description'] = $user['user_description'];
                break;
            }
        }
        if($user_details) { return $user_details; }
        else { return false; }
    }