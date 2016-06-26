<?php

    include('httpful.phar');
    
    $url = "http://localhost/gerenciadorfinanceiro/discount/nme_discount={$_POST['nme_discount']}";
       
    $response = \Httpful\Request::get($url)->send();

    $request_response = json_decode($response->body);
            
    echo "cadastrado com sucesso!";

    header('location: http://localhost/client/html/home.html');