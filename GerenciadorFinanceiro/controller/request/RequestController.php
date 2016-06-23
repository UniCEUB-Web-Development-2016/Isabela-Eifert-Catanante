<?php
/**
 * Created by PhpStorm.
 * User: Isabela
 * Date: 12/04/2016
 * Time: 19:36
 */


include_once "model/Request.php";

class RequestController
{
    public function createRequest($protocol, $method, $uri, $server_addr)
    {
        $uri_array = explode("/", $uri);
        
        return new Request(
            $protocol,
            $method,
            $uri_array[2],
            $this->getParams($uri_array[3]),
            $server_addr);

    }
    public function getParams($string_params) //string_params ==$uri_array[3]
    {
        $a = str_replace ("?" , "" , $string_params); //substituir "?" por ""
        //str_replace = Esta função retorna uma string ou um array com todas as ocorrências de search em subject substituídas com o valor dado para replace.
        $b = explode("&", $a);

        $params_map = array();
        foreach ($b as $value) {    //cria um hashmap
            $c = explode("=", $value); //composto pela chave = valor
           $params_map[$c[0]] = $c[1]; //    exemplo:  name = isabela
        }
        return $params_map;
    }
}