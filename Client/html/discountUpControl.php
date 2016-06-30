<?php

   include '../control/httpful.phar'; 	

$url = "http://localhost/gerenciadorfinanceiro/discount/?nme_discount=".$_POST['nme_discount']."&value_discount=".$_POST['value_discount']."&type_discount=".$_POST['type_discount']."&date_discount=".$_POST['date_discount'];


$response = \Httpful\Request::put($url)
		->sendsJson()                               // tell it we're sending (Content-Type) JSON...
		//->authenticateWith('nme_discount', 'email')  // authenticate with basic auth...
		->body('{"json":"is awesome"}')             // attach a body/payload...
		->send();

		echo "<script type='text/javascript'>window.alert('Atualizado com sucesso!');</script>";
		
		exit();