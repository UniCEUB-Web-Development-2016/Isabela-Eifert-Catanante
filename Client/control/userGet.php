<?php

    include('httpful.phar');
   
    $url = "http://localhost/gerenciadorfinanceiro/user/?email_user=".$_POST['email_user']; //."&".$_POST['pass_user'];
    
    var_dump($url);

    $response = \Httpful\Request::get($url)->send();

    $contents = $response->body;
    $contents = utf8_encode($contents);
    $contents = substr($contents, 23, -1); //retira o connect da string e o ultimo caractere
    $request_response = json_decode($contents);

    var_dump($contents);

   