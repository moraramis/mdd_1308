<?php

class userModel {
    private $db;

    public function __construct($dsn, $user, $pass){
        try{
            $this->db = new \PDO($dsn, $user, $pass);
        }
        catch (\PDOException $e){
            var_dump($e);
        }
    }

    public function getinfo(){
        $statement = $this->db->prepare("
        SELECT userId, homeZipcode
        FROM users
        WHERE (homeZipcode IS NOT NULL)
        ");
        try{
            if ($statement->execute()){
                $rows = $statement->fetchALL(\PDO::FETCH_ASSOC);
                return $rows;
            }
        }
        catch (\PDOException $e){
            echo "We had a problem. Try again.";
            var_dump($e);
        }
        return array();
    }

    public function getLocationDetails($id){
        $statement = $this->db->prepare("
        SELECT zipcode, state, city, latitude, longitude
        FROM zipcodes
        WHERE zipcode = :z_Id
        ");
        try{
            if($statement->execute(array(":z_Id"=>$id))){
                $rows = $statement->fetchALL(\PDO::FETCH_ASSOC);
                return $rows;
            }
        }
        catch (\PDOException $e){
            echo "We had a problem. Try again.";
            var_dump($e);
        }
        return array();
    }



}