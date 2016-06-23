<?php
/**
 * Created by PhpStorm.
 * User: Isabela
 * Date: 12/04/2016
 * Time: 21:37
 */
include "RequestController.php";
include "ResourceController.php";
class ControlManager
{
    private $resourceController;
    private $requestController;

    public function __construct()
    {
        $this->resourceController = new ResourceController();
        $this->requestController = new RequestController();
    }
    public function getResource() //função chamada pelo requestRouter
    {
        $request = $this->requestController-> createRequest(
            $_SERVER["SERVER_PROTOCOL"],
            $_SERVER["REQUEST_METHOD"],
            $_SERVER["REQUEST_URI"],
            $_SERVER["SERVER_ADDR"]);
        
        return $this->route_method($request); //retorna a função route_method passando reuquest como parametro
    }
    public function route_method($request)
    {
        //var_dump($request->get_method());
        switch($request->get_method()) 
        {
            case "GET":
                return $this->resourceController->getResource($request);
                break;
            case "POST":
                return $this->resourceController->createResource($request);
                break;
            case "PUT":
                return $this->resourceController->updateResource($request);
                break;
            case "DELETE":
                return $this->resourceController->deleteResource($request);
                break;
            default:

        }
    }
}