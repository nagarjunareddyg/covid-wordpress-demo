<?php 

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


class covid19_tracker_api {

    private $api_base ='https://api.covid19api.com';
    function covid19_tracker_api()
    {
        
    }    
    function get_summary()
    {
        
        $summary_url = $this->$api_base .'/summary'; 
        
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $summary_url);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        $resp_json = curl_exec($ch);
       // $resp_json = file_get_contents( $summary_url );
        return  json_decode( $resp_json, true );
    }    
    function get_country_summary($country)
    {
        $summary_url = $this->$api_base .'/live/country/'.$country;
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $summary_url);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        $resp_json = curl_exec($ch);
       // $resp_json = file_get_contents( $summary_url );
        return json_decode( $resp_json, true );
    }
}