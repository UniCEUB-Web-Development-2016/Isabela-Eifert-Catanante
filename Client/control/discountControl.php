<?php

include('httpful.phar');

$url = "http://localhost/gerenciadorfinanceiro/discount/?nme_discount={$_POST['nme_discount']}&value_discount={$_POST['value_discount']}&type_discount={$_POST['type_discount']}&date_discount={$_POST['date_discount']}";
var_dump($url);
$response = \Httpful\Request::post($url)->send();



echo "cadastrado com sucesso!";