<?php
include_once "datebase/dbConnection.php";
include_once "model/Request.php";
include_once "controller/Validate/UserValidate.php";

class UserController
{
    private $requiredParameters = [
        "name" ,"lastName","email","pass","gender","birthdate"
    ];

    private function connect()
    {
        $db = new connection("localhost","gerenciador_financeiro","root","");
        return $db->getConnection();

    }

    public function register($request)
    {
        $params = $request->get_params();
        $user = new user($params["nme_user"],
            $params["last_nme_user"],
            $params["email_user"],
            $params["pass_user"],
            $params["gender_user"],
            $params["birthdate_user"]);

        return $this->connect()->query($this->generateInsertQuery($user));

    }

    private function generateInsertQuery($user)
    {
        $query =  "INSERT INTO user (nme_user, last_nme_user, email_user, gender_user,  birthdate_user, pass_user) VALUES ('".$user->getName()."','".
            $user->getLastName()."','".
            $user->getEmail()."','".
            $user->getGender()."','".
            $user->getBirthdate()."','".
            $user->getPassword()."')";

        return $query;
    }


    public function update($request)
    {
        $params = $request->get_params();
        
        foreach ($params as $key => $value) {
            $result = $this->connect()->query("UPDATE user SET " . $key . " =  '" . $value . "' WHERE email_user = teste@teste'"); // . $params["email_user"] . "'"
        }
        return $result;
    }

    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);
        
        $result = $this->connect()->query("SELECT nme_user, last_nme_user, email_user, gender_user, birthdate_user, pass_user FROM user WHERE " . $crit);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($request)
    {
        $params = $request->get_params();
        
        $result = $this->connect()->query("DELETE FROM user WHERE email_user = teste@teste'"); // . $params["email_user"] . "'"
        return $result;
    }

    private function generateCriteria($params)
    {
        $criteria = "";
        foreach($params as $key => $value)
        {
            $criteria = $criteria.$key." LIKE '%".$value."%' OR ";
        }
        return substr($criteria, 0, -4);
    }


}
