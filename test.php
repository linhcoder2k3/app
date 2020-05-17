<?php
error_reporting();
include 'system/config.php';
$rand = rand(1,3);
$cookie = 'sb=JIixXj3T5eqbieYJxGjDybG2; datr=JIixXuRrH7aIkJow5tKrsHlW; c_user=100042123080414; xs=11%3AJL_8AtNNs_eaaw%3A2%3A1589616193%3A9404%3A6388; fr=1Qq4zu1eP9MnjVDer.AWU2uBE7LhpSyWQ2hG27L_gBBj8.BesYgk.M7.F66.0.0.Bev__A.AWWsamWW;';
$Curl->url();
$Curl->set_cookie($cookie);
$index = $Curl->get('https://m.facebook.com/composer/ocelot/async_loader/?publisher=feed');
$uid = explode('\",\"ACCOUNT_ID',explode('"USER_ID\":\"',$index)[1])[0];
$name = explode(', profile picture',explode('aria-label=\"',$index)[1])[0];
$fb_dtsg = explode('\" autocomplete=',explode(' name=\"fb_dtsg\" value=\"',$index)[1])[0];
$token = explode('\",\"useLocalFilePreview\":true',explode('"accessToken\":\"',$index)[1])[0];
echo json_encode(array('uid' => $uid, 'name' => $name, 'fb_dtsg' => $fb_dtsg, 'token' => $token));
