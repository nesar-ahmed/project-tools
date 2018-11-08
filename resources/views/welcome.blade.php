<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Project Tools </title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style>
        body{
            background-color: rgba(#777777, 0.38)
        }
        .account-mangage-position{
            margin-top: 70px;
        }
        .welcome-title-position{
            margin-top: 140px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-right account-mangage-position">
            <a class="btn btn-outline-success" href="{{ route('register') }}"> <i class="fas fa-plus-square"></i> CREATE AN ACCOUNT </a>
            <span> &nbsp; &nbsp; &nbsp; &nbsp; </span>
            <a class="btn btn-outline-success" href="{{ route('login') }}"> <i class="fas fa-sign-in-alt"></i> LOGIN </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 offset-3 welcome-title-position">
            <h3 class="text-center"> WELCOME TO </h3>
            <h1 class="text-center text-success"> PROJECT TOOLS </h1>
        </div>
    </div>

    <script src="js/jquery.min.js"> </script>
    <script src="js/bootstrap.js"> </script>
</body>
</html>
