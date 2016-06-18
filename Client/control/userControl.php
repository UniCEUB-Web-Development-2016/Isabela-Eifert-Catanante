<?php

    include('httpful.phar');

    $url = "http://localhost/gerenciadorfinanceiro/user/?nme_user={$_POST['nme_user']}&last_nme_user={$_POST['last_nme_user']}&email_user={$_POST['email_user']}&pass_user={$_POST['pass_user']}&gender_user={$_POST['gender_user']}&birthdate_user={$_POST['birthdate_user']}";

    $response = \Httpful\Request::post($url)->send();

var_dump($url);
    echo "cadastrado com sucesso!";