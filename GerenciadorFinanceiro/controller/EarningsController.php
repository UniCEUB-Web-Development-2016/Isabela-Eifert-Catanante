<?php
/**
 * Created by PhpStorm.
 * Earnings: Isabela
 * Date: 26/04/2016
 * Time: 21:37
 */
include_once "datebase/dbConnection.php";
include_once "model/earnings.php";
include_once "model/Request.php";

class EarningsController
{
    private function connect()
    {
        $db = new connection("localhost", "gerenciador_financeiro", "root", "");
        return $db->getConnection();

    }
    
    public function register($request)
    {
        $params = $request->get_params();
        $earnings = new earnings($params["nme_earnings"],
            $params["value_earnings"],
            $params["type_earnings"],
            $params["date_earnings"]);

        return $this->connect()->query($this->generateInsertQuery($earnings));
    }

    

    private function generateInsertQuery($earnings)
    {
        $query =  "INSERT INTO earnings (nme_earnings, value_earnings, type_earnings, date_earnings) VALUES ('".$earnings->getName()."','".
            $earnings->getValue()."','".
            $earnings->getType()."','".
            $earnings->getDate()."')";
        return $query;
    }

    public function update($request)
    {
        $params = $request->get_params();

        foreach ($params as $key => $value) {
            $result = $this->connect()->query("UPDATE earnings SET " . $key . " =  '" . $value . "' WHERE nme_earnings = '" . $params["nme_earnings"] . "'");
        }
        return $result; 
    }

    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $result = $this->connect()->query("SELECT nme_earnings, value_earnings, type_earnings, date_earnings FROM earnings WHERE " . $crit);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($request)
    {
        $params = $request->get_params();

        $result = $this->connect()->query("DELETE FROM earnings WHERE nme_earnings = '" . $params["nme_earnings"] . "'");
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
