<?php
/**
 * Created by PhpStorm.
 * User: Isabela
 * Date: 12/04/2016
 * Time: 19:34
 */
include "controller/request/ControlManager.php";

class RequestRouter
{

    public function route()
    {
        return (new ControlManager)->getResource();
        // retorna o que o objeto controlManager trouxer com da função get
    }
}