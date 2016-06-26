<?php

    include('httpful.phar');

    echo $_GET['nme_earnings'];
   
    $url = "http://localhost/gerenciadorfinanceiro/earnings/?nme_earnings=".$_POST['nme_earnings'];
    
    $response = \Httpful\Request::get($url)->send();

    $request_response = json_decode($response->body);
      
    echo "cadastrado com sucesso!";

    header('location: http://localhost/client/html/resultado-pesquisa.php');