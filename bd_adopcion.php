<?php

// FUNCION PARA OBTENER LOS TWEETS
function getJsonTweets($max_id,$fecha){
        ini_set('display_errors', 1);
        require_once('vendor\j7mbo\twitter-api-php\TwitterAPIExchange.php');
        $query = 'mascota OR perro OR gato adopta OR adopcion OR adoptar -mono -"adopta la forma" -"adopta forma" -"proyecto" -enfermedad -enfermedades -"habitossaludables" -rt -RT -"amigos por siempre" -ganadores   -venta -vender -JiaJia -donar -donacion -compra -comprar -niño -unete -niña -bebe -"no compres" -jornada -asiste';
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => "3400216702-SVZbDfvrwiYeZ64LPcaDFruzcemFWBrwbbM8bKe",
            'oauth_access_token_secret' => "DCj8wZneBvDFRtTFssRLF4WsNXmhM4EOgR6dhfMacoKoQ",
            'consumer_key' => "O8BeFPW1mvgT13YiB3rXt7XU0",
            'consumer_secret' => "2nJZJKnXjcWgh27MSmo2GBaMdgrT1iDbQcoorAgqOzjx2fhoUa"
        );

        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q='.utf8_encode($query).' since:'.$fecha.'&count=100&result_type=recent&max_id='.$max_id /*&geocode=10.5000,-66.9667,450000km' */;

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
        $fecha_creacion,
        $usuario,
        $url_imagen_usuario,
        $a_url_img,
        $ubicacion
        ){

    //Creamos la conexión a la base de datos
    //echo 'ID DEL TWEET DENTRO DE LA FUNCION: '.$id_tweet.'</br>';
    $conexion = mysqli_connect("localhost", "root", "", "adopcion");
    //Comprobamos laconexión
    if($conexion){
    }else{
           die('Ha sucedido un error inexperador en la conexion de la base de datos<br>');
    }
    //Codificación de la base de datos en utf8
    mysqli_query ($conexion,"SET NAMES 'utf8'");
    mysqli_set_charset($conexion, "utf8");

    //Creamos la sentencia SQL para insertar los datos de entrada
    $sql = "insert into tweets (id_tweet,tweet,fecha_publicacion,usuario,url_imagen_perfil,ubicacion)
            values ('".$id_tweet."','".$tweet."','".$fecha_creacion."','".$usuario."','".$url_imagen_usuario."','".$ubicacion."');";
    $consulta = mysqli_query($conexion,$sql);

     //Comprobamos si la consulta ha tenido éxito
    if($consulta){
    }else{
           echo("No se ha podido insertar en la base de datos 1<br><br>".mysqli_error($conexion));
    }

    for($k=0;$k<count($a_url_img);$k++){
        $sql2 = "insert into tweet_imagen (id_tweet,url_imagen)
        values(".$id_tweet.",'".$a_url_img[$k]."');";
    }
    $consulta2 = mysqli_query($conexion,$sql2);

    //Comprobamos si la consulta ha tenido éxito
    if($consulta2){
    }else{
           echo ("No se ha podido insertar en la base de datos 2<br><br>".mysqli_error($conexion));
    }

    //Cerramos la conexión de la base de datos
    $close = mysqli_close($conexion);
    if($close){
    }else{
        echo('Ha sucedido un error inexperado en la desconexion de la base de datos<br>');
    }
}

//--------------------------------------------------------
//Obtenemos el JSON con la información
function fill_BD(){
    $max_id = 99999999999999999999999999999999999;
    $i =0;
    for ($j=0;$j<3;$j++) {
        $json = getJsonTweets($max_id,'2016-01-01');
        // since:2016-01-01

        //Codificamos el json
        $json = json_decode($json);
        //obtenemos un array con las filas, es decir con cada tweet.
        $rows = $json->statuses;
        echo '</br></br>EXTRAIDOS: '.count($rows).'</br></br>';
        //Iteramos los tweets, extraemos la información y la almacenamos en la base de datos.
        foreach($rows as $row){
            //Valida queno sea retweet y que tenga foto
            if ($row->retweeted == false AND isset($row->entities->media)) {
                 $id_tweet = $row->id_str;
                 $tweet = $row->text;
                 $fecha_creacion = date_format(date_create($row->created_at),'Y-m-d');
                 $usuario = $row->user->screen_name;
                 $url_imagen_usuario = $row->user->profile_image_url;
                 $url_imagen;
                 $a_url_img = array();
                for ($k=0;$k<count($row->entities->media);$k++) {
                    $url_imagen = $row->entities->media[$k]->media_url;
                    $a_url_img[$k] = $url_imagen;
                    //echo $a_url_img[$k].'</br>';
                }
                 $ubicacion="";
                if(isset($row->place->full_name))
                    $ubicacion = $row->place->full_name;
                 $i++;
                // echo 'fecha de el tweet: '.date_format(date_create($fecha_creacion),'Y-m-d').'</br>';
                 //echo $tweet.'</br>'.$i.'</br>'.$id_tweet.'</br>';
                 //insertamos los datos en la base de datos
                 insertarTweetInfo($id_tweet, $tweet, $fecha_creacion, $usuario, $url_imagen_usuario, $a_url_img, $ubicacion);
             }
            $max_id = $row->id_str;
        }
                echo $max_id.'</br>'.$i.'</br>';
                sleep(2);
    }
}

fill_BD();

?>
