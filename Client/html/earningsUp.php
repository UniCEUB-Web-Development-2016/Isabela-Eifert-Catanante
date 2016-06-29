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

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="home.html">Home</a></li>
                <li><a href="about.html">Sobre nós</a></li>
                <li><a href="contact.html">Contato</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="pesquisa.html">Pesquisa</a></li>
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
            <p><a href="earnings.html">Inserir Renda</a></p>
            <p><a href="discount.html">Inserir Despesa</a></p>
            <p><a href="planning.html">Realizar Planejamento</a></p>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Gerenciador Financeiro</h1>
            <p>Descrever o Sistema</p>
            <hr>
            <h3>Renda</h3>

<?php

   include '../control/httpful.phar'; 

    $parametro = $_GET['nme_earnings'];
    $response = \Httpful\Request::get("http://localhost/gerenciadorfinanceiro/earnings/?nme_earnings=".$parametro)->send();

    $contents = $response->body;
    $contents = utf8_encode($contents);
    $contents = substr($contents, 23, -1); //retira o connect da string e o ultimo caractere
    $request_response = json_decode($contents);

//var_dump($contents);
                foreach($request_response as $key=>$value)
                {
                    if($key == 'nme_earnings')
                        $nme_earnings=$value;
                }
                foreach($request_response as $key=>$value)
                {
                    if($key == 'value_earnings')
                        $value_earnings = $value;
                }
                foreach($request_response as $key=>$value)
                {
                    if($key == 'date_earnings')
                        $date_earnings=$value;


                }
                foreach($request_response as $key=>$value)
                {
                    if($key == 'type_earnings')
                    {
                        $type_earnings=$value;
                    }
                                
                }
/**
* 
*/
                class Tentativa
                {
                    
                    public function getRadio($type_earnings)
                     {
                        if($type_earnings == 'mensal')
                        {
                            return 'checked';
                        }
                        if($type_earnings == 'unico')
                        {
                            return 'checked';
                        }
                    }
                }
                
            ?>


            <form action="control/updateEarnings.php" method="post">

                Nome do rendimento: <input name="nme_earnings" type="text" value=<?php echo $nme_earnings; ?> >
                <br>
                Valor: <input name="value_earnings" type="number" value=<?php echo $value_earnings; ?> >
                <br>
                Data do redimento: <input name="date_earnings" type="date" value=<?php echo $date_earnings; ?> >
                <br>
                <p> Tipo de redimento </p>

                <input type="radio" name="type_earnings" value="mensal" 
                    <?php 
                        // $test = new Tentativa(); 
                        // $test->getRadio($type_earnings); 
                    ?> 
                > Mensal <br>
                <input type="radio" name="type_earnings" value="unico" 
                    <?php
                        // $test = new Tentativa(); 
                        // $test->getRadio($type_earnings); 
                    ?> 
                >  Unico <br>

                <input type="submit" value="Alterar"/>

            </form>
            <p></p>
        </div>
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p>ADS</p>
            </div>
            <div class="well">
                <p>ADS</p>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>

</body>
</html>