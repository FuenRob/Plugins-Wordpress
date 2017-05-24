<?php

/**
* Plugin Name: Add Sent Mail
* Plugin URI: 
* Description: Sent mail when user is registered.
* Version: 1.0
* Author: Roberto Morais
* Author URI: 
* License: GNU
*/

include '../../../wp-load.php';
include '../../../wp-admin.php';


function mail_from() {
    $emailaddress = 'hola@tuvidaon.com';
    return $emailaddress;
}

function mail_from_name() {
    $sendername = "Tu vida ON";
    return $sendername;
}

add_action( 'user_register', 'sent_mail' );

function sent_mail ($new_user_id){
    
    add_filter('wp_mail_from','mail_from');
    add_filter('wp_mail_from_name','mail_from_name');
    
    
    
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $password = implode($pass);
     
    wp_set_password( $password, $new_user_id );
 
    $user_info = get_userdata($new_user_id);
    $to = $user_info->user_email;
    $subject = 'Subject';
    $message = 'Body mail';
    
    //$headers = array('Content-Type: text/html; charset=UTF-8');
    //$headers[] = "From: Hola tuvidaon <hola@tuvidaon.com>";
    if(wp_mail( $to, $subject, $message)){
        //echo json_encode(array("result"=>"complete"));
    } else {
        echo json_encode(array("result"=>"mail_error"));
    }

}

?>