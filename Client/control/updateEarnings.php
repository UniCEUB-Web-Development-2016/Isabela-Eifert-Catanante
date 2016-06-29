<?php
include('httpful.phar');

$url = "http://localhost/gerenciadorfinanceiro/earnings/?nme_earnings=".$_POST['nme_earnings']."&value_earnings=".$_POST['value_earnings'].
"&type_earnings=".$_POST['type_earnings']."&date_earnings=".$_POST['date_earnings'];

var_dump($url);

$response = \Httpful\Request::put($uri)->send(); 

$request_response = $response->body;

var_dump($request_response);
 

//echo "<script type='text/javascript'>window.alert('Atualizado com sucesso!');</script>";

//header('location: http://localhost/client/html/home.html');
