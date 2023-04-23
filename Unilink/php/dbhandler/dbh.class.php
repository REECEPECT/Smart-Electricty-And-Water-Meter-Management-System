<?php
//responsible for DB connection
class Dbh{
    protected function connect(){
        try{
            $username = "root";
            $password = "";
            $dbh = new PDO("mysql:host=localhost;dbname=unilinkdb", $username, $password);
            return $dbh;
        }
        catch(PDOException $e){
            print"error!:". $e->getMessage(). "<br />";
            die();
        }
    }
}