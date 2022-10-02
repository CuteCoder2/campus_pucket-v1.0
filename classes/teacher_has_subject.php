<?php


class teacherSubject{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }


        public function newTeacherSubject($teacher_matriculation,$id_subject){


               $insert_teacher_subject = "INSERT INTO `campus_pucket`.`teacher_has_subject` (`teacher_matriculation`, `id_subject`) VALUES (?,?);";
               
               $prepare_insertion = $this->conn->prepare($insert_teacher_subject);
               
               $prepare_insertion->execute([$teacher_matriculation,$id_subject]);
               
               return true;
            
        }


        public function modifyTeacherSubject($id_subject,$teacher_matriculation){
            $modify_teacher_subject_smt = "UPDATE `campus_pucket`.`teacher_has_subject` SET `id_subject` = ? WHERE `teacher_matriculation` = ?";

            $prepare_modification = $this->conn->prepare($modify_teacher_subject_smt);

            $prepare_modification->execute([$id_subject,$teacher_matriculation]);

        }

        public function getAllTeacherSubject(){
            $select_stmt = "SELECT * FROM `campus_pucket`.`teacher_has_subject` WHERE 1";

            $executing_query = $this->conn->query($select_stmt);

            $retur_all_querie = $executing_query->fetchAll();

            return $retur_all_querie;
        }


        public function getAllTeacherSubjectByTeacherId($teacher_matriculation){
            $select_stmt = "SELECT * FROM `campus_pucket`.`teacher_has_subject` WHERE `teacher_has_subject`.`teacher_matriculation` = ?";

            $prepare_stm = $this->conn->prepare($select_stmt);

            $prepare_stm->execute([$teacher_matriculation]);

            $retur_all_querie = $prepare_stm->fetchAll();

            return $retur_all_querie;
        }





}

?>