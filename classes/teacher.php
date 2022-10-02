
<?php

require_once dirname(__FILE__)."/dbconnect.php";


class teacher{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();  
            
    }

    public function getAllActiveTeacher(){
        $get_active_teacher_stmt = "SELECT * FROM `campus_pucket`.`teacher`,`campus_pucket`.`teacher_has_subject`,`campus_pucket`.`subject` WHERE `teacher`.`status` = 'active' AND `teacher`.`matriculation` = `teacher_has_subject`.`teacher_matriculation` AND `subject`.`id_subject` = `teacher_has_subject`.`id_subject` ;";

        $query = $this->conn->query($get_active_teacher_stmt);

        $fetch_all_teacher = $query->fetchAll();


        return $fetch_all_teacher;
    }

    public function getAllTeacher(){
        $get_active_teacher_stmt = "SELECT * FROM `campus_pucket`.`teacher`,`campus_pucket`.`teacher_has_subject`,`campus_pucket`.`subject` WHERE `teacher`.`matriculation` = `teacher_has_subject`.`teacher_matriculation` AND `subject`.`id_subject` = `teacher_has_subject`.`id_subject`";

        $query = $this->conn->query($get_active_teacher_stmt);

        $fetch_all_teacher = $query->fetchAll();


        return $fetch_all_teacher;
    }
    public function getTeacherLimit($num){
        $get_active_teacher_stmt = "SELECT * FROM `campus_pucket`.`teacher`,`campus_pucket`.`teacher_has_subject`,`campus_pucket`.`subject` WHERE `teacher`.`matriculation` = `teacher_has_subject`.`teacher_matriculation` AND `subject`.`id_subject` = `teacher_has_subject`.`id_subject` LIMIT $num";

        $query = $this->conn->query($get_active_teacher_stmt);

        $fetch_all_teacher = $query->fetchAll();


        return $fetch_all_teacher;
    }

    public function getTeacherBymatriculation($teacher_matriculation){
        $get_by_matriculation = "SELECT * FROM `campus_pucket`.`teacher`,`campus_pucket`.`teacher_has_subject`,`campus_pucket`.`subject` WHERE `teacher`.`matriculation` = `teacher_has_subject`.`teacher_matriculation` AND `subject`.`id_subject` = `teacher_has_subject`.`id_subject` AND `teacher`.`matriculation` = ?";

        $prepare_get = $this->conn->prepare($get_by_matriculation);

        $prepare_get->execute([$teacher_matriculation]);

        $fetching_all = $prepare_get->fetchAll();

        return $fetching_all;
    }

    public function newTeacher($matriculation,$fname,$oname,$lname,$picture,$tel,$sex,$DOB,$POB,$nationality,$resident,$religion,$marital_status,$email){
        $insert_new_teacher = "INSERT INTO `campus_pucket`.`teacher` (`matriculation`, `fname`,
        `oname`, `lname`, `picture`, `tel`, `sex`, `DOB`, `POB`, `nationality`, 
       `resident`, `religion`, `marital_status`, `email`) VALUES 
       (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

       $prepare_insertion = $this->conn->prepare($insert_new_teacher);


      $prepare_insertion->execute([$matriculation,$fname,$oname,$lname,$picture,$tel,$sex,$DOB,$POB,$nationality,$resident,$religion,$marital_status,$email]);
    
    }

    public function modifyTeacher($fname,$oname,$lname,$picture,$tel,$sex,$DOB,$POB,$nationality,$resident,$religion,$marital_status,$email,$matriculation){
        $modify_teacher = "UPDATE `campus_pucket`.`teacher` SET `fname` = ?,
        `oname`, `lname` = ?, `picture` = ?, `tel` = ?, `sex` = ?, `DOB` = ?, `POB` = ?, `nationality` = ?, 
       `resident` = ?, `religion` = ?, `marital_status` = ?, `email = ?` WHERE `matriculation` = ?";

       $prepare_modification = $this->conn->prepare($modify_teacher);

       $prepare_modification->execute([$fname,$oname,$lname,$picture,$tel,$sex,$DOB,$POB,$nationality,$resident,$religion,$marital_status,$email,$matriculation]);

    }

    public function deleteTeacher($matriculation){

        $delete_teacher_stmt = "UPDATE `campus_pucket`.`teacher` SET `teacher`.`status` = 'inactive' WHERE `teacher`.`matriculation` = ?";

        $prepare_deletion = $this->conn->prepare($delete_teacher_stmt);

        $prepare_deletion->execute([$matriculation]);

    }


}



?>