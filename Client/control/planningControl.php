<?php

    include('httpful.phar');

    $url = "http://localhost/gerenciadorfinanceiro/planning/?nme_planning={$_POST['nme_planning']}&current_value={$_POST['current_value']}&final_value={$_POST['final_value']}&inital_date={$_POST['inital_date']}&final_date={$_POST['final_date']}&description={$_POST['description']}";
    var_dump($url);
    $response = \Httpful\Request::post($url)->send();



    echo "cadastrado com sucesso!";

    header('location: http://localhost/client/html/home.html');