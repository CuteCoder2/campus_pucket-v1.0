<?php


class campus{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function getCampus(){
        try {
            $get_campus = "SELECT * FROM  `campus_pucket`.`campus` WHERE 1;";

            $query_all_campus = $this->conn->query($get_campus);

           $fetching_campus = $query_all_campus->fetchAll();

            return $fetching_campus;


        } catch (PDOException $er) {
            throw new Exception('No Post Found');
        }
    }


}
