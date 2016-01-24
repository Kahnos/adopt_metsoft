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

    <?php
        include 'filters.php';
    ?>

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

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-12">


<!--
                Here goes the filters
-->


<?php
    // TEST FILTERS

    // Strings de prueba
    $testTweets = array(
                        "El tweet 0414-8893387 viene de correo@dom.inio.com la mascota tiene 5 años",
                        "adopta a este gatito un pequeño terranoba, es cariñoso, vacunado, castrado y esterilizado 04256354765, ahora",
                        "el es danielito es un perro muy amoroso sin vacunas y esta castrado Shar Pei, escribe a lib.corrales.bravo@gma.il.net",
                        "gato en adopcion kaztrado de 2 años",
                        "adopta a boby un perrito pitbull callegero sacado de las calles lo vacunamos y lo castramos, interesados comunicarse",
                        "adopta a mimi un gatito callegero de 12 años, sacado de las calles lo vacunamos 23123+4+512, interesados comunicarse",
                        "adopta a este perro, no esta castrado pero si vacunado, raza bull terrier",
                        "gato en adopcion sin castracion, llama al ,0424-212+35-12.",
                        "algun interesado en adoptar a uno de estos cachorros chow chow? estan vacunados, no castrados, adoptalos te daran el amor quer tanto nececitas",
                        "el perro no esta castrado, contacta a lib.corrales.bravo@gmail.com, llama al 042421235-12, cocker sumiso",
                        "el gato si esta esteril es un pudel hermoso",
                        "el perro no esta capado, gran danes",
                        "el rusben si esta capado, adopta a este Agua",
                        "adopta a este perrito chiguagua, no tiene ningun tratamiento",
                        "adoptame, pitbull le falta vacunas y castrarlo"
                        );

    foreach ($testTweets as $tweet){
        echo "</br> Tweet: " . $tweet . "</br>";
        verifyAll($tweet);
    }

?>
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
    <button id="submitbutton" name="submitbutton" class="btn btn-primary" type="submit" value="ok">Buscar</button>
  </div>
</div>


<!-- Modal box -->
<div id="openModal" class="modalDialog">
    <div>
        <a href="#close" title="Close" class="close">X</a>
        <h2>Modal Box</h2>
        <p>This is a sample modal box that can be created using the powers of CSS3.</p>
        <p>You could do a lot of things here like have a pop-up ad that shows when your website loads, or create a login/register form for users
        </p>
    </div>
</div>
<!-- API Logic -->
<?php

require_once('adopt_functions.php');

$settings = set_twt_api();

// **** PLACEHOLDER FILTER ****

$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=mascota OR perro OR gato OR adopcion OR
            adoptar OR adopta adopta OR adopcion OR adoptar
            -mono -"amigos por siempre" -ganadores since:2016-01-01
            geocode:10.5000,-66.9667,450000km -venta -donar -donacion
            -compra -niño -unete -niña -bebe -"no compres" -jornada -asiste';

//Validar que ya se haya cargado una vez el formulario
if (isset($_GET['submitbutton']))
{
    if($_GET['category']=='1') $getfield = '?q=adopcion+perro&count=40';
    if($_GET['category']=='2') $getfield = '?q=adopcion+gato&count=40';
    if($_GET['category']=='3') $getfield = '?q=miss+colombia&count=20';
}

// **** END OF PLACE HOLDER FILTER ****

$tweets = get_twt($settings,$getfield,$url);

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
            foreach($tweets['statuses'] as $tweet){
                if (isset($tweet['entities']['media'])){ ?>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <div class="thumbnail">
                                <div class='image'>
                                    <img src='<?= $tweet['entities']['media'][0]['media_url']?>' class='img img-responsive full-width'>";
                                </div>
                                <div class='caption'>
                                    <p><?=$tweet['text']?></p>
                                    <a href='#openModal' class='openModal'>Open Modal</a>";
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            ?>
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
