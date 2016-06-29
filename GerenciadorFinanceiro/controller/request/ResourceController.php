<?php
/**
 * Created by PhpStorm.
 * User: Isabela
 * Date: 12/04/2016
 * Time: 21:32
 */
include_once "util/RequestRouter.php";
include "controller/UserController.php";
include "controller/EarningsController.php";
include "controller/DiscountController.php";
include "controller/PlanningController.php";





class ResourceController
{
    private $controlMap =
        [
            "user" => "UserController",
            "earnings" => "EarningsController",
            "discount" => "DiscountController",
            "planning" => "PlanningController",
        ];

    public function getResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->search($request);
    }
    
    public function createResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->register($request);
    }
    
    public function updateResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->update($request); //
    }

    public function deleteResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->delete($request); //
    }   
}