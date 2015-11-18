<?php
/**
 *
 * Description：
 * Version：         1.0
 * Create：          2015/11/18 11:30
 * Project：         FROST
 * Support：         http://www.wezhi12.com
 * Contact：         support@wezhi12.com
 */
require_once("cls/WeChat_frost.php");
require_once("cls/Curl_frost.php");

$appId = "wxd5647daf15d1007b";
$appSecret = "c71e83875012675876b5f9a16c0109cd";
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appId&secret=$appSecret";
echo $url."<hr />";

//$GLOBALS["wx_access_token"] = $res_out->access_token;
//$GLOBALS["wx_expires_in"] = $res_out->expires_in;
//$GLOBALS["wx_access_token_time"] = time();


$wx = new WeChat_frost($appId,$appSecret);
echo $wx->access_token."<br />";
$server_ip = $wx->Get_server_ip($wx->access_token);
print_r($server_ip);
