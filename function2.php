<?php

/*
* @package           WeatherPlugin
* @author            Jaine
* @copyright         2022  Jaine
* @license           GPL-2.0-or-later
*
* @wordpress-plugin
* Plugin Name:       Weather Report
* Description:       This is for measuring curent weather report
* Version:           2.1.1
* Author:            Jaine
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:       weather
* Domain Path:       /languages
*/
function address(){
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,"http://ip-api.com/json");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$result=curl_exec($ch);
$result=json_decode($result);

if($result->status=='success'){
	echo "Country:".$result->country.'<br/>';
	echo "Region:".$result->regionName.'<br/>';
	echo "City:".$result->city.'<br/>';
	if(isset($result->lat) && isset($result->lon)){
		echo "Lat:".$result->lat.'<br/>';
		echo "Lon:".$result->lon.'<br/>';
	}
	echo "IP:".$result->query.'<br/>';	
}
}
add_shortcode('ip_address','address');

?>