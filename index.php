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
<!--
            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>
-->
            <div class="col-md-12">
<!--
                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
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
<?php                

require_once('vendor\j7mbo\twitter-api-php\TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "281876500-E8bG9YpLhJWk3oBBeUw5ZwdX9jcrauaGaGlWMXjH",
    'oauth_access_token_secret' => "mTsqI8baeNXLgfs0qq2nWaWusUOvjcMoE07K6u1Ue8Bxg",
    'consumer_key' => "71fimlcGDPMcAzen0x3cWQ661",
    'consumer_secret' => "Jah4ATI9Rqtpk9QgfcuVQdLxhyPCbGDQAlytaHqMwcFcGyWyIa"
);

$url = 'https://api.twitter.com/1.1/search/tweets.json';

$getfield = '?q=pikachu&count=5';

//if ($_GET['submitbutton']=='ok')
//{
    if($_GET['category']=='1') $getfield = '?q=adopcion+perro&count=5';
    if($_GET['category']=='2') $getfield = '?q=adopcion+gato&count=5';
    if($_GET['category']=='3') $getfield = '?q=miss+colombia&count=5';
//}
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);

$tweets = json_decode($twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest(),true);

$counter = 0;
?>

    
</fieldset>
</form>

                <div class="row">
<!-- Original
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$24.99</h4>
                                <h4><a href="#">First Product</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
-->
                    <?php
                    foreach($tweets['statuses'] as $tweet)
                    {
                        echo '<div class="col-sm-4 col-lg-4 col-md-4"><div class="thumbnail">';
                        // if (if(isset($tweet['entities']['media'][0]['media_url'])))
                        echo "<img src='".$tweet['entities']['media'][0]['media_url']."' ><div class='caption'>";
                        //else
                        //echo "<img src='".$tweet['entities']['media'][0]['media_url']."' ><div class='caption'>";
                        echo "<p>".$tweet['text']."<p/>";
                        echo "</div></div></div>";
                    }
                    ?>
<!--
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$64.99</h4>
                                <h4><a href="#">Second Product</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                
                            </div>
                        </div>
                    </div>
-->
                </div>

            </div>

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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>