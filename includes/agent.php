<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/25
 * Time: 10:52
 */

add_action('wp_ajax_bm_send','bm_send');

function bm_send()
{
    $curl = curl_init();

    /*$host = "e2bot.localhost.com";
    $ip = "192.168.99.100";*/
    $overlay_settings = (array) get_option( 'bm_general_settings' );
    $change_url = $overlay_settings['change_url'];
    $change_ip = $overlay_settings['change_ip'];
    $change_host = $overlay_settings['change_host'];

    if($change_url&&!$change_ip){
        $url=$change_url;
        curl_setopt($curl, CURLOPT_URL, $url);
    }elseif(!$change_url&&$change_ip&&$change_host){
            $url=$change_ip;
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [$change_host]);
        }elseif(!$change_url&&!$change_ip){
            echo "nourl";
            die();
        }

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, 0);//direct to brower
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);//direct to brower
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // https?╣А ит????обhosts
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

    $post_data = array(
        "driver"  => $_POST['driver']?$_POST['driver']:'web',
        "userId"  => $_POST['userId'],
        "message" => $_POST['message'],
    );

    curl_setopt($curl,CURLOPT_POSTFIELDS, $post_data);

    $data=curl_exec($curl);

    if (curl_errno($curl)) {
        echo  'Curl error: ' . curl_error($curl);
    }

    curl_close($curl);
    die();
}

?>