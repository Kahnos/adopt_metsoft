<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


</head>

<style>
    .jumbotron {
        background-color: darkcyan;
        color: #ffffff;
    }
</style>

<body>
    <div class="jumbotron text-center">
        <h1>Instagram API Test</h1>
        <p>Click the button to authenticate Instagram account</p>
        <br>
        <a href="https://api.instagram.com/oauth/authorize/?client_id=7669fceb484944bc8348d1b28fd4b049&redirect_uri=http://localhost/adopt_metsoft/instagram&response_type=token&scope=public_content" class="btn btn-lg btn-info">Authenticate</a>

    </div>




    <!-- Bootstrap required scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>

</html>
