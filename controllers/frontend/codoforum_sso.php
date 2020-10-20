<?php

use Tygh\Registry;

require_once(Registry::get('config.dir.addons') . 'codoforum_sso/lib/sso.php');

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    return;
}

if ($mode == "get_user") {
    /**
     * 
     * The SSO client id and secret MUST be same as that set in the Codoforum
     * SSO plugin settings
     */
    $settings = array(
        
      "client_id" => Registry::get('addons.codoforum_sso.codoforum_client_id'),
      "secret" => Registry::get('addons.codoforum_sso.codoforum_secret'),
      "timeout" => 6000  
    );
    
    $sso = new codoforum_sso($settings);
    
    $account = array();
    $user = $_SESSION['cart']['user_data'];
    $object_id = $user['user_id'];
    $pair_data = db_get_hash_array(
        'SELECT pair_id, image_id, detailed_id, type, position FROM ?:images_links WHERE object_id = ?i AND object_type = ?s',
        'pair_id', $object_id, 'user_photo'
    );
    
    foreach ($pair_data as $pair) {
        $image_id = $pair['image_id'];
    }
    
    $image_data = fn_get_image($image_id, $object_id, 'user_photo');
    /**
     * 
     * Here comes your logic to check if the user is logged in or not.
     * A simple example would be using PHP SESSION
     */
    if (!empty($user)) {
    
        $account['uid'] = $user['user_id']; //Your logged in user's userid
        $account['name'] = $user['user_name']; //Your logged in user's username
        $account['mail'] = $user['email']; //Your logged in user's email id
        $account['avatar'] = $image_data['image_path']; //not used as of now
    }
    
    //var_dump($account);
    $sso->output_jsonp($account); //output above as JSON back to Codoforum
    exit;    // Do not render UI
}