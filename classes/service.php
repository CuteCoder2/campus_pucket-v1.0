<?php


require_once dirname(__FILE__)."/dbconnect.php";


class service{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    }

    public function getAllpost(){
        $get_allpost = "SELECT * FROM `campus_pucket`.`service` WHERE 1;";

        $query_stmt = $this->conn->query($get_allpost);

        $fetching_all_post = $query_stmt->fetchAll();

        return $fetching_all_post;
    }
}