<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This a project for MetSoft">
    <meta name="author" content="A team of cool people">

    <title>Pet Shelter - Placeholder name</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/(libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">PetShelter</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    
    
    <!-- Modal box -->
    <div id="openModal" class="modalDialog modalDialog_display">
        <div id="modalInside" class="container">
            <img src="http://www.smashbros.com/images/og/peach.jpg" class="modal_picture">
                <div class="col-xs-12 test_2">
                    <div class="test_1">
                        <ul id="caracteristicas">
                            <li>Raza:<span id="mod_raza">Placeholder</span></li>
                            <li>Vacuna:<span id="mod_vacuna">Placeholder</span></li>
                            <li>Edad:<span id="mod_edad">Placeholder</span></li>
                            <li>Sexo:<span id="mod_sexo">Placeholder</span></li>
                            <li>Ubicación:<span id="mod_ubicacion">Placeholder</span></li>
                            <li>Castrado:<span id="mod_castrado">Placeholder</span></li>
                        </ul>
                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                    <div class="test_3">
                        <a id="enlace" href="google.com" class="but btn btn-success">
                            <span class="glyphicon glyphicon-ok-circle"></span> Contactar
                        </a>
                        <button type="button" class="but cancel btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle"></span> Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                
<!-- PLACEHOLDER FORM -->
                <form class="form-horizontal" action="index.php">
                    <fieldset>

<!-- Form Name -->
                    <legend>Filtros</legend>

                    <!-- Multiple Checkboxes -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="category">Filtros_beta</label>
                      <div class="col-md-4">
                      <div class="checkbox">
                        <label for="category-0">
                          <input type="checkbox" name="category" id="category-0" value="1">
                          Perros
                        </label>
                        </div>
                      <div class="checkbox">
                        <label for="category-1">
                          <input type="checkbox" name="category" id="category-1" value="2">
                          Gatos
                        </label>
                        </div>
                      <div class="checkbox">
                        <label for="category-2">
                          <input type="checkbox" name="category" id="category-2" value="3">
                          Otros
                        </label>
                        </div>
                      </div>
                    </div>

<!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submitbutton"></label>
                        <div class="col-md-4">
                            <button id="submitbutton" name="submitbutton" class="btn btn-primary" type="submit" value="ok">
                                Buscar
                            </button>
                        </div>
                    </div>

<!-- API Logic -->
<?php                

require_once('adopt_functions.php');

//$settings = set_twt_api();

// **** PLACEHOLDER FILTER ****

$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=mascota OR perro OR gato OR adopcion OR
            adoptar OR adopta adopta OR adopcion OR adoptar 
            -mono -"amigos por siempre" -ganadores since:2016-01-01 
            geocode:10.5000,-66.9667,450000km -venta -donar -donacion 
            -compra -niño -unete -niña -bebe -"no compres" -jornada -asiste';

//Validar que ya se haya cargado una vez el formulario

/*
if (isset($_GET['submitbutton']))
{
    if($_GET['category']=='1') $getfield = '?q=adopcion+perro&count=40';
    if($_GET['category']=='2') $getfield = '?q=adopcion+gato&count=20';
    if($_GET['category']=='3') $getfield = '?q=miss+colombia&count=20';
}
*/

// **** END OF PLACE HOLDER FILTER ****

//$tweets = get_twt($settings,$getfield,$url);

$counter = 0;

//----------<Cargar en base de datos>

//**The function needs to be updated
//set_db();

?>

                    
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="row">
        <?php
        mysql_connect("localhost", "root", "") or
            die("Could not connect: " . mysql_error());
        mysql_select_db("adopcion");

//Esto debería ser de acuerdo a lo que pida el usuario
        $result = mysql_query("SELECT * FROM mascota");

        while ($row = mysql_fetch_assoc($result)) { ?>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="thumbnail">
                    <div class='image'>
                        <?php
                        $id_tweet = $row['id_tweet'];
                        $result_img = mysql_query("SELECT * FROM tweet_imagen
                                                   WHERE id_tweet = {$id_tweet}");
                        $row_img = mysql_fetch_assoc($result_img);
                        echo "<img src='{$row_img["url_imagen"]}' class='img img-responsive full-width'>"; ?>
                    </div>
                    <div class='caption'>
                        <p class="raza"> <?=$row["Raza"]?></p>
                        <p class="vacuna hid_info"> <?=$row["Vacuna"]?></p>
                        <p class="edad hid_info"> <?=$row["Edad"]?></p>
                        <p class="sexo hid_info"> <?=$row["Sexo"]?></p>
                        <p class="ubicacion"> <?=$row["Ubicacion"]?></p>
                        <p class="enlace hid_info"><?php echo "https://twitter.com/intent/tweet?in_reply_to={$row['id_tweet']}";?></p>
                        <p class="castrado hid_info"> <?=$row["castrado"]?></p>
                        <button type="button" class="modalOpenBut pull-right btn btn-info">
                            <span class="glyphicon glyphicon-zoom-in"></span> Detalles
                        </button>
                        
                        <!-- ^^^^^^^^ -->
                    </div>
                </div>
            </div>
            <?php
                }
        mysql_free_result($result);
            ?>
    </div>
    </div>
    
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; PetShelter 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/j_shelter.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>