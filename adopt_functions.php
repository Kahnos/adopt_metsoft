<?php
//---- TWITTER API

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

//---- DATABASE

// Must be changed, placeholder
function set_db(){
    $username = "root";
    $password = "";
    $hostname = "localhost"; 


    //connection to the database
    $dbhandle = mysql_connect($hostname, $username, $password) 
     or die("Unable to connect to MySQL");
    echo "Connected to MySQL<br>";

    //select a database to work with
    $selected = mysql_select_db("eventos",$dbhandle) 
      or die("Could not select examples");

    //execute the SQL query and return records
    $result = mysql_query("SELECT nombre FROM athletes");

    //fetch tha data from the database 
    while ($row = mysql_fetch_array($result)) {
       echo " Name:".$row{'nombre'}."<br>";
    }
    //close the connection
    mysql_close($dbhandle);
}

//PRUEBA DE ACTUALIZACION DE ESTADO - WORKING
/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
//$url2 = 'https://api.twitter.com/1.1/statuses/update.json';
/*
$url2 = 'https://upload.twitter.com/1.1/media/upload.json';

$requestMethod2 = 'POST';
// POST fields required by the URL above. See relevant docs as above
$postfields2 = array(
    'media' => base64_encode(file_get_contents('espeon.png'))
);
// Perform the request and echo the response
$twitter2 = new TwitterAPIExchange($settings);
echo $twitter2->buildOauth($url2, $requestMethod2)
             ->setPostfields($postfields2)
             ->performRequest();
*/
    
//"689189429546741760" -> Espeon image
//Worked

?>