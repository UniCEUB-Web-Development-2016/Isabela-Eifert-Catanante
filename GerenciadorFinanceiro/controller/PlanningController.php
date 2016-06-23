<?php
/**
 * Created by PhpStorm.
 * Planning: Isabela
 * Date: 26/04/2016
 * Time: 21:17
 */
include_once "datebase/dbConnection.php";
//include_once "model/planning.php";
include_once "model/Request.php";

class PlanningController
{
    private function connect()
    {
        $db = new connection("localhost", "gerenciador_financeiro", "root", "");
        return $db->getConnection();

    }

    public function register($request)
    {
        $params = $request->get_params();
        $planning = new planning(
            $params["nme_planning"],
            $params["current_value"],
            $params["final_value"],
            $params["inital_date"],
            $params["final_date"],
            $params["description"]);

        return $this->connect()->query($this->generateInsertQuery($planning));

    }

    private function generateInsertQuery($planning)
    {
        {
            $query = "INSERT INTO planning (nme_planning, current_value_planning, final_value_planning, inital_date, final_date_planning, description) 
              VALUES ('" . $planning->getName() . "','" .
                $planning->getCurrentValue() . "','" .
                $planning->getFinalValue() . "','" .
                $planning->getInitialDate() . "','" .
                $planning->getFinalDate() . "','" .
                $planning->getdescription() . "')";
            return $query;
            //possui chave estrangeira, como setar o usuário logado no planning
        }
    }

    public function update($request)
    {
        $params = $request->get_params();

        foreach ($params as $key => $value) {
            $result = $this->connect()->query("UPDATE planning SET " . $key . " =  '" . $value . "' WHERE nme_planning = '" . $params["nme_planning"] . "'");
        }
        return $result;
    }

    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $result = $this->connect()->query("SELECT nme_planning, current_value_planning, final_value_planning, inital_date, final_date_planning, description FROM planning WHERE " . $crit);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($request)
    {
        $params = $request->get_params();

        $result = $this->connect()->query("DELETE FROM planning WHERE nme_planning = '" . $params["nme_planning"] . "'");
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

