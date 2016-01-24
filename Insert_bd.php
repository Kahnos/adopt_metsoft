 <?php

  require_once('filters.php');  // archivo que contiene los filtros
     
    //Creamos la conexión a la base de datos
    $connection = mysqli_connect("localhost", "root", "","adopcion");
    //Comprobamos la conexión
    if($connection){
    }else{
           die('Ha sucedido un error inexperador en la conexion de la base de datos<br>');
    }
	
	//Codificación de la base de datos en utf8
    mysqli_query ($connection,"SET NAMES 'utf8'");
    mysqli_set_charset($connection, "utf8");
    
    //Creamos la sentencia SQL para insertar los datos de entrada
    $sql = "SELECT * FROM tweets";
	$table = mysqli_query($connection,$sql);
	
	//Comprobamos si la consulta ha tenido éxito
    if($table){
    }else{
           echo("No se ha podido insertar en la base de datos 1<br><br>".mysqli_error($connection));
    }
	//Se recorre la tabla y se llena la tabla mascotautilizando los filtros sobre el tweets
	while($row = mysqli_fetch_array($table)) {
		$tweet = $row['tweet'];
		$sql = "insert into mascota (Raza, Vacuna, Edad, telefono, castrado, Ubicacion, id_tweet, usuario_tw, correo) 
				values ('".verifyRace($tweet)."','".verifyVaccine($tweet)."','".verifyAge($tweet)."','".verifyTelephone($tweet)."','".verifyNeutered($tweet)."','".$row['ubicacion']."','".$row['id_tweet']."','".$row['usuario']."','".verifyMail($tweet)."');";
		$consulta = mysqli_query($connection,$sql);
		 //Comprobamos si la consulta ha tenido éxito
		if($consulta){
		}else{
			   echo("No se ha podido insertar en la base de datos 1<br><br>".mysqli_error($connection));
		}
	}
  echo 'Listo</br></br>';
  ?>