<?php

include_once "datebase/dbConnection.php";
include_once "model/discount.php";
include_once "model/Request.php";

class DiscountController
{

    private function connect()
    {
        $db = new connection("localhost", "gerenciador_financeiro", "root", "");
        return $db->getConnection();

    }

    public function register($request)
    {
        $params = $request->get_params();
        $discount = new discount($params["nme_discount"],
            $params["value_discount"],
            $params["type_discount"],
            $params["date_discount"]);

        return $this->connect()->query($this->generateInsertQuery($discount));
    }

    
    
    private function generateInsertQuery($discount)
    {
        {
            $query = "INSERT INTO discount (nme_discount, value_discount, type_discount, date_discount) VALUES ('".$discount->getName() ."','".
            $discount->getValue()."','".
            $discount->getType()."','".
            $discount->getDate()."')";
            return $query;
        }
    }

    public function update($request)
    {
        $params = $request->get_params();

        foreach ($params as $key => $value) {
            $result = $this->connect()->query("UPDATE discount SET " . $key . " =  '" . $value . "' WHERE nme_discount = '" . $params["nme_discount"] . "'");
        }
        return $result;
    }
    

    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $result = $this->connect()->query("SELECT nme_discount, value_discount, type_discount, date_discount FROM discount WHERE " . $crit);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($request)
    {
        $params = $request->get_params();

        $result = $this->connect()->query("DELETE FROM discount WHERE nme_discount = '" . $params["nme_discount"] . "'");
        return $result;
    }

    private function generateCriteria($params)
    {
        $criteria = "";
        foreach ($params as $key => $value) {
            $criteria = $criteria . $key . " LIKE '%" . $value . "%' OR ";
        }
        return substr($criteria, 0, -4);
    }

}