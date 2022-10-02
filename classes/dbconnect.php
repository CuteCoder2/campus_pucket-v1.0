<?php


class DBconnect {

    private $dbhost = "localhost";
    private $dbname = "campus_pucket";
    private $dbuser = "root";
    private $dbpass = "";

    public function connection(){

        try {
        
            $conn = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname, $this->dbuser,$this->dbpass);
           
            return $conn;
        
        } catch (PDOException $er) {
            return "UNABLE TO ESTBLISH A CONNECTION WITH THE SERVER";
        }
    }


}




?>