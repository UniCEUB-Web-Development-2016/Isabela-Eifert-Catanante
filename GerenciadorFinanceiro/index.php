<?php
/**
 * Created by PhpStorm.
 * User: Isabela
 * Date: 13/04/2016
 * Time: 01:29
 */
include "util/RequestRouter.php";
include_once "datebase/dbConnection.php";

//include"view/html/home.html";

echo json_encode((new RequestRouter)->route()); //formato jason, basicamente chave valor
//cria um objeto do tipo request router e inicia a função route()

//var_dump((new connection("localhost","gerenciador_financeiro","root",""))->connect()); //test connection PDO