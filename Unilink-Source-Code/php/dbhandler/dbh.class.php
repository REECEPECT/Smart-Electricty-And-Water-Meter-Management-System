<?php
//responsible for DB connection
class Dbh{
    protected function connect(){
        try{
            $username = "id20646125_unilink2023";
            $password = "jFUeC*uvgOx[671e";
            $dbh = new PDO("mysql:host=localhost;dbname=id20646125_unilink", $username, $password);
            return $dbh;
        }
        catch(PDOException $e){
            print"error!:". $e->getMessage(). "<br />";
            die();
        }
    }
}