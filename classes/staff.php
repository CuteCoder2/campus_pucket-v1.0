<?php


class staff{

    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function getAllStaf(){

        $get_all_staff = "SELECT * FROM `campus_pucket`.`staff`,`campus_pucket`.`post`,`campus_pucket`.`service` WHERE 1 AND `staff`.`id_post` = `post`.`id_post` AND `service`.`id_service` = `post`.`id_service` AND `staff`.`status` = 'active' ORDER BY `register_date` ASC";

        $query_all = $this->conn->query($get_all_staff);

        $all_staf = $query_all->fetchAll();

        return $all_staf;
    }

    public function getStaffByMatriculation($matriculation){

        $get_staff = "SELECT * FROM `campus_pucket`.`staff`,`campus_pucket`.`campus`,`campus_pucket`.`post`,`campus_pucket`.`section` WHERE `staff`.`matriculation` = ? AND `campus`.`id_campus` = `staff`.`id_campus` AND  `staff`.`id_post` = `post`.`id_post` AND `section`.`id_section` = `staff`.`id_section` ;";

        $prepare_get = $this->conn->prepare($get_staff);

        $prepare_get->execute([$matriculation]);

       $staff_info = $prepare_get->fetchAll();

       return $staff_info;

    }

    public function staffLogin($matriculation,$password){

        $get_staff = "SELECT * FROM `campus_pucket`.`staff`,`campus_pucket`.`staff_has_post`,`campus_pucket`.`post` WHERE `staff`.`matriculation` = ? AND `staff`.`password` = ? AND `staff_has_post`.`matriculation` = `staff`.`matriculation` AND  `staff_has_post`.`id_post` = `post`.`id_post`";

        $prepare_get = $this->conn->prepare($get_staff);

        $prepare_get->execute([$matriculation,$password]);

       $staff_info = $prepare_get->fetchAll();

       return $staff_info;

    }


    public function newStaff($matriculation, $fname,$oname, $lname, $picture, $tel, $sex, $DOB, $POB, $nationality, $resident, $religion, $marital_status, $email,$post, $id_campus,$id_section){

        try{

            $this->conn->query("START TRANSACTION");
            
            $insert_staff = "INSERT INTO `campus_pucket`.`staff` (`matriculation`, `fname`, `oname`,`lname`, `picture`, `tel`, `sex`, `DOB`, `POB`, `nationality`, `resident`, `religion`, `marital_status`, `email`, `id_campus`,`id_post` `id_section`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            
            $prepare_new_staff = $this->conn->prepare($insert_staff);
            
            $prepare_new_staff->execute([$matriculation, $fname,$oname,$lname, $picture, $tel, $sex, $DOB, $POB, $nationality, $resident, $religion, $marital_status, $email,$id_campus,$post,$id_section]);
            
            $this->conn->query("COMMIT");

            return true;
            
        }catch(PDOException $er){
            $this->conn->query("ROLLBACK");
            // throw new Exception($er);

        }
        
    }


}



?>