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
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
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

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                
                
<!--
                Here goes the filters
-->
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

require_once('vendor\j7mbo\twitter-api-php\TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "281876500-E8bG9YpLhJWk3oBBeUw5ZwdX9jcrauaGaGlWMXjH",
    'oauth_access_token_secret' => "mTsqI8baeNXLgfs0qq2nWaWusUOvjcMoE07K6u1Ue8Bxg",
    'consumer_key' => "71fimlcGDPMcAzen0x3cWQ661",
    'consumer_secret' => "Jah4ATI9Rqtpk9QgfcuVQdLxhyPCbGDQAlytaHqMwcFcGyWyIa"
);

$url = 'https://api.twitter.com/1.1/search/tweets.json';

$getfield = '?q=instagram&count=5';

//Validar que ya se haya cargado una vez el formulario
if (isset($_GET['submitbutton']))
{
    if($_GET['category']=='1') $getfield = '?q=adopcion+perro&count=20';
    if($_GET['category']=='2') $getfield = '?q=adopcion+gato&count=20';
    if($_GET['category']=='3') $getfield = '?q=miss+colombia&count=20';
}
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);

$tweets = json_decode($twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest(),true);

$counter = 0;
?>

    
</fieldset>
</form>

            </div>
        </div>
        <div class="row">
            <?php
                foreach($tweets['statuses'] as $tweet)
                {
                    //Validar que el tweet tenga foto
                    if (isset($tweet['entities']['media'])){
                    echo '<div class="col-sm-4"><div class="thumbnail">';
                    echo "<img src='".$tweet['entities']['media'][0]['media_url']."' ><div class='caption'>";
                    echo "<p>".$tweet['text']."</p>";
                    echo "<a href='#openModal' class='openModal'>Open Modal</a>";
                    echo "</div></div></div>";
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