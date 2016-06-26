<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>
</head>
<body>

<?php

   include '../control/httpful.phar'; 

    $parametro = $_GET['nme_earnings'];
    $response = \Httpful\Request::get("http://localhost/gerenciadorfinanceiro/earnings/?nme_earnings=".$parametro)->send();
    $earning = $response->body;
    $request_response = utf8_decode($earning);

    json_last_error();


    //var_dump($earning);
    var_dump($request_response);
   
    // if(function_exists('json_decode')){
    //     echo "existe";
    // }

    //print_r(json_decode(stripslashes($earning)));
    // $earning = rtrim($earning, "\0");
    //$earning = stripslashes(html_entity_decode($earning));
    //$earningDecode = json_decode($earning,true);
   
    // foreach($request_response as $value)
    // {
    //     $nme_earnings=$value->nme_earnings;
    // }



?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/client/">Gerenciador Financeiro</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">            
        </div>
        <div class="col-sm-8 text-left">
            <h1>Gerenciador Financeiro</h1>
            <p>Resultado da pesquisa:</p>
            <hr>
            <table class="table table-condensed">
                <tr>
                <th>Firstname</th>
                <th>Lastname</th> 
                <th>Points</th>
              </tr>
              <tr>
                <td value="<?php nme_earnings ?>"> </td>
                <td>Jackson</td> 
                <td>94</td>
              </tr>
              <tr>
                <td>Eve</td>
                <td>Jackson</td> 
                <td>94</td>
              </tr>
            </table>
            
        </div>
        <div class="col-sm-2 sidenav">
        </div>
    </div>
</div>

</body>
</html>