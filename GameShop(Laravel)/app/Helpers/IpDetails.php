<?php

namespace App\Helpers;

class IpDetails {

    public static function ip_details($ip) {

        $json = file_get_contents("http://ipinfo.io/{$ip}");
        $details = json_decode($json);
        return $details->country;



        /*$jsonData = file_get_contents("http://freegeoip.net/json/{$ip}");
		$countryInfo = json_decode($jsonData,true);
		return $countryInfo['country_code'];*/

   }
}
