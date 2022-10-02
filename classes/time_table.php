<?php

require_once dirname(__FILE__)."/dbconnect.php";


class timeTable{
    
    private $conn;
    
    public function __construct(){

        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }



    public function getTimeTableInstance($id_day,$school_year,$id_subject,$class_name,$id_period,$teacher_matriculation){

       $get_time_table_instance = "SELECT * FROM `campus_pucket`.`time_table` WHERE `id_day` = ? AND `school_year` = ? AND `id_subject` = ? AND `class_name` = ? AND `id_period` = ? AND `teacher_matriculation` = ?";

       $prepare_get_instance = $this->conn->prepare($get_time_table_instance);

       $prepare_get_instance->execute([$id_day,$school_year,$id_subject,$class_name,$id_period,$teacher_matriculation]);

       $fetchng_all_instance = $prepare_get_instance->fetchAll();

       return $fetchng_all_instance ;
        
    }

    public function getTimeTableInstanceById($id_time_table){

        $get_by_id = "SELECT * FROM `campus_pucket`.`time_table` WHERE `id_day` = ? ";
     
     $pre_get_by_id_stmt = $this->conn->prepare($get_by_id);

     $pre_get_by_id_stmt->execute([$id_time_table]);

     $fetching_get_stmt = $pre_get_by_id_stmt->fetchAll();

     return $fetching_get_stmt;

    }

    public function getAllClassTimeTable($school_year,$class_name){

        $get_class_time_table = "SELECT * FROM `campus_pucket`.`time_table` WHERE `school_year` = ? AND `class_name` = ? ;";

        $prepare_get_class_time_table = $this->conn->prepare($get_class_time_table);

        $prepare_get_class_time_table->execute([$school_year,$class_name]);

        $fetchng_all_class_time_table = $prepare_get_class_time_table->fetchAll();

        return $fetchng_all_class_time_table;
    }


    public function newTimeTable($id_time_table,$id_day,$school_year,$id_subject,$class_name,$id_period,$teacher_matriculation){

        $new_time_table = "INSERT INTO `campus_pucket`.`time_table` (`id_time_table`, `id_day`, `school_year`, `id_subject`, `class_name`, `id_period`, `teacher_matriculation`) VALUES (?,?,?,?,?,?,?);";

        $prepare_new_time_table = $this->conn->prepare($new_time_table);

        $prepare_new_time_table->execute([$id_time_table,$id_day,$school_year,$id_subject,$class_name,$id_period,$teacher_matriculation]);

        return true;
    }

    public function modifyTimeTableInstance($school_year,$id_subject,$class_name,$id_period,$teacher_matriculation,$id_day){

        $modify_time_table_instance = "UPDATE `campus_pucket`.`time_table` SET `school_year` = ? , `id_subject` = ? , `class_name` = ? , `id_period` = ? , `teacher_matriculation` = ? WHERE `id_day` = ?";
 
        $prepare_modify_instance = $this->conn->prepare($modify_time_table_instance);
 
        $prepare_modify_instance->execute([$school_year,$id_subject,$class_name,$id_period,$teacher_matriculation,$id_day]);
 
        return true ;
         
     }

}