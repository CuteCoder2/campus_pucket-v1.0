<?php

require_once dirname(__FILE__)."/dbconnect.php";


class parents{
    
    private $conn;
    
    public function __construct(){

        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function getAllActiveParent(){
        $get_all_active_parent = "SELECT * FROM `campus_pucket`.`student`,`campus_pucket`.`parent`,`campus_pucket`.`parent_has_student` WHERE `student`.`status` = 'active' AND `parent`.`tel` = `parent_has_student`.`tel` AND `parent_has_student`.`student_matriculation` = `student`.`matriculation`;";

        $querry_get_all_active_parent = $this->conn->query($get_all_active_parent);

        $fetch_all_queries = $querry_get_all_active_parent->fetchAll();

        return $fetch_all_queries;
    }


    public function newParent($parent_tel,$parent_fname,$parent_oname,$parent_lname,$parent_picture,$parent_sex,$parent_resident,$parent_email){
        $insert_parent = "INSERT INTO `campus_pucket`.`parent` (`tel`, `fname`, `oname`, `lname`, 
        `picture`, `sex`, `resident`, `email`)
         VALUES (?,?,?,?,?,?,?,?);";

         $prepare_parent = $this->conn->prepare($insert_parent);

         $prepare_parent->execute([$parent_tel,$parent_fname,$parent_oname,$parent_lname,$parent_picture,$parent_sex,$parent_resident,$parent_email]);

         return true;
         
    }


    public function modifyParent($parent_fname,$parent_oname,$parent_lname,$parent_picture,$parent_sex,$parent_resident,$parent_contct,$parent_email,$parent_tel){

        $modifyParent = "UPDATE `campus_pucket`.`parent`  SET `fname` = ?, `oname` = ?, `lname` = ?, 
        `picture` = ?, `sex` = ?, `resident` = ?, `contact` = ?, `email` = ? WHERE `TEL` = ?;";


        $prepre_modifiction = $this->conn->prepare($modifyParent);

        $prepre_modifiction->execute([$parent_fname,$parent_oname,$parent_lname,$parent_picture,$parent_sex,$parent_resident,$parent_contct,$parent_email,$parent_tel]);

    }

    public function getParentById($parent_tel){
        $get_stmt = "SELECT * FROM  `campus_pucket`.`parent` WHERE `parent`.`tel` = ? ;";

        $prepare_stmt = $this->conn->prepare($get_stmt);

        $prepare_stmt->execute([$parent_tel]);

        $get_all = $prepare_stmt->fetchAll();

        return $get_all;
    }


}
