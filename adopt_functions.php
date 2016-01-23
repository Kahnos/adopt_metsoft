<?php

//Call to the api in order
function set_twt_api(){
    require_once('vendor\j7mbo\twitter-api-php\TwitterAPIExchange.php');

    $settings = array(
        'oauth_access_token' => "281876500-E8bG9YpLhJWk3oBBeUw5ZwdX9jcrauaGaGlWMXjH",
        'oauth_access_token_secret' => "mTsqI8baeNXLgfs0qq2nWaWusUOvjcMoE07K6u1Ue8Bxg",
        'consumer_key' => "71fimlcGDPMcAzen0x3cWQ661",
        'consumer_secret' => "Jah4ATI9Rqtpk9QgfcuVQdLxhyPCbGDQAlytaHqMwcFcGyWyIa"
    );
    
    return $settings;
}

//Making a GET request with twitter api
function get_twt($settings,$getfield,$url){
    $requestMethod = 'GET';

    $twitter = new TwitterAPIExchange($settings);

    $tweets = json_decode($twitter->setGetfield($getfield)
        ->buildOauth($url, $requestMethod)
        ->performRequest(),true);

    return $tweets;
}

?>