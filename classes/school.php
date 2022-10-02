<?php


require_once dirname(__FILE__)."/dbconnect.php";


class school{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    
    }

    public function school_table(){
        $add_stmt = "CREATE TABLE IF NOT EXISTS `school` (
            `school_id` VARCHAR(225) NOT NULL,
            `school_name` VARCHAR(225) NOT NULL,
            `abbrevation` VARCHAR(225) NOT NULL,
            `school_logo` VARCHAR(225) NOT NULL,
            `moto` VARCHAR(225) NOT NULL,
            `date_created` DATE NOT NULL,
            `propitor` VARCHAR(225)  NOT NULL,
            `describtion` TEXT NOT NULL,
            `website` VARCHAR(225) NOT NULL,
            `dbname` VARCHAR(225) NOT NULL
            )";

            $this->conn->query($add_stmt);
            return true;
    }

    public function addTable($id_school,$school_name,$school_logo,$moto,$date_created,$propitor,$describtion,$website,$dbname){
        $insert_stm = "INSERT INTO `campus_pucket`.`school` (`school_id`,`school_name`,`abbrevation`,`school_logo`,`moto`,`date_created`,`propitor`,`describtion`,`website`,`dbname`) VALUES (?,?,?,?,?,?,?,?,?) ;";

        $pre_insert_stm = $this->conn->prepare($insert_stm);
        
        $pre_insert_stm->execute([$id_school,$school_name,$school_logo,$moto,$date_created,$propitor,$describtion,$website,$dbname]);
        return true;
    }

    public function getSchool(){
        $select_sch_stmt = "SELECT * FROM `campus_pucket`.`school` WHERE 1";
        
        $select = $this->conn->query($select_sch_stmt);

        $return_all = $select->fetchAll();

        return $return_all;
    }



}