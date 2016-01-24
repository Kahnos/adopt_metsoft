<?php

// FUNCION PARA OBTENER LOS TWEETS 
function getJsonTweets($query){
        ini_set('display_errors', 1);
        require_once('vendor\j7mbo\twitter-api-php\TwitterAPIExchange.php');
 
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => "281876500-E8bG9YpLhJWk3oBBeUw5ZwdX9jcrauaGaGlWMXjH",
			'oauth_access_token_secret' => "mTsqI8baeNXLgfs0qq2nWaWusUOvjcMoE07K6u1Ue8Bxg",
			'consumer_key' => "71fimlcGDPMcAzen0x3cWQ661",
			'consumer_secret' => "Jah4ATI9Rqtpk9QgfcuVQdLxhyPCbGDQAlytaHqMwcFcGyWyIa"
        );
       
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q='.utf8_encode($query).'&count=20';
 
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $json =  $twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
        return $json;
}

//FUNCION PARA INSERTAR LOS TWEETS EN LA BD
function insertarTweetInfo(
        $id_tweet,
        $tweet,
        $rts,
        $favs,
        $fecha_creacion,
        $usuario,
        $url_imagen,
        $followers,
        $followings,
        $num_tweets
        ){
    
    //Creamos la conexión a la base de datos
    $conexion = mysqli_connect("localhost", "USER_DATABASE", "PASS_USER_DATABASE", "twitterdata");
    //Comprobamos laconexión
    if($conexion){
    }else{
           die('Ha sucedido un error inexperador en la conexion de la base de datos<br>');
    }
    //Codificación de la base de datos en utf8
    mysqli_query ($conexion,"SET NAMES 'utf8'");
    mysqli_set_charset($conexion, "utf8");
    
    //Creamos la sentencia SQL para insertar los datos de entrada
    $sql = "insert into tweets (id_tweet,tweet,rt,fav,fecha_creacion,usuario,url_imagen,followers,followings,num_tweets) 
            values (".$id_tweet.",'".$tweet."',".$rts.",".$favs.",'".$fecha_creacion."','".$usuario."','".$url_imagen."',".$followers.",".$followings.",".$num_tweets.");";
            $consulta = mysqli_query($conexion,$sql);
    //Comprobamos si la consulta ha tenido éxito
    if($consulta){
    }else{
           die("No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion));
    }
    
    //Cerramos la conexión de la base de datos
    $close = mysqli_close($conexion);
    if($close){
    }else{
        Die('Ha sucedido un error inexperado en la desconexion de la base de datos<br>');
    }   
}

//--------------------------------------------------------
//Obtenemos el JSON con la información
$json = getJsonTweets('mascota OR perro OR gato OR adopcion OR adoptar OR adopta adopta OR adopcion OR adoptar -mono -rt -RT -"amigos por siempre" -ganadores since:2015-01-01 -venta -donar -donacion -compra -niño -unete -niña -bebe -"no compres" -jornada -asiste geocode:10.5000,-66.9667,450000km'
                     );
//Codificamos el json
$json = json_decode($json);
//obtenemos un array con las filas, es decir con cada tweet.
$rows = $json->statuses;
//Iteramos los tweets, extraemos la información y la almacenamos en la base de datos.
foreach($rows as $row){
	//if (!($rows[$i]->retweeted)) {
		 $id_tweet = $row->id_str;
		 $tweet = $row->text;
		 $rts = $row->retweet_count;
		 $favs = $row->favorite_count;
		 $fecha_creacion = $row->created_at;
		 $usuario = $row->user->screen_name;
		 $url_imagen = $row->user->profile_image_url;
		 $followers = $row->user->followers_count;
		 $following = $row->user->friends_count;
		 $num_tweets = $row->user->statuses_count;
		 echo $tweet.'</br>'.count($rows).'</br>';
		 //insertamos los datos en la base de datos
		 //insertarTweetInfo($id_tweet, $tweet, $rts, $favs, $fecha_creacion, $usuario, $url_imagen, $followers, $followings, $num_tweets);
	// }
}

?>