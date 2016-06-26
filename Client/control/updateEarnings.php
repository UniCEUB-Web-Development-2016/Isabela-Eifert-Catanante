<?php
include('httpful.phar');

$url = "http://localhost/gerenciadorfinanceiro/earnings/?nme_earnings=".$_POST['nme_earnings']."&value_earnings=".$_POST['value_earnings'].
"&type_earnings=".$_POST['type_earnings']."&date_earnings=".$_POST['date_earnings'].;

var_dump($url);

$response = \Httpful\Request::put($uri)                  // Build a PUT request...
    ->sendsJson()                               // tell it we're sending (Content-Type) JSON...
    ->authenticateWith('nme_earnings')  // authenticate with basic auth...
    ->body('{"json":"is awesome"}')             // attach a body/payload...
    ->send(); 
 

echo "<script type='text/javascript'>window.alert('Atualizado com sucesso!');</script>";

header('location: http://localhost/client/html/home.html');

exit;