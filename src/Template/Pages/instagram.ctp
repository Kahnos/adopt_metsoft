<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <script>
        var access_token;

        function getAccessToken() {
            var locationStr = window.location.toString();
            access_token = locationStr.substring(54);
            //document.getElementById("p_at").innerHtml = "The access_token is " + at;
            console.log("access_token: " + access_token);
            document.getElementById("p_at").innerHTML = "access_token = " + access_token;
        }

        window.onload = getAccessToken;
    </script>
</head>

<style>
    .jumbotron {
        background-color: darkcyan;
        color: #ffffff;
    }
</style>

<body>
    <div class="jumbotron text-center">
        <h1>¡Instagram redirected!</h1>
        <br>
        <button class="btn btn-lg btn-info" >Test Tag Endpoint</button>
        <!--        <a href="#" class="btn btn-lg btn-info" onclick='asd()'>Test Tag Endpoint</a>-->
        <p id="p_at"></p>

    </div>

    <!-- Bootstrap required scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
