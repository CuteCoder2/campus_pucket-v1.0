

<?php

require_once dirname(__FILE__)."/dbconnect.php";


class studentAchieve{
    
    private $conn;
    
    public function __construct(){
        
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function newAchieve($id_achieve,$school_year,$class,$student_matricule){

        $insert_Student_achieve = "INSERT INTO `campus_pucket`.`achieve_student` (`id_achieve`,`school_year`, `class_name`, `matriculation`) VALUES (?,?,?,?);";

        $prepare_insertion = $this->conn->prepare($insert_Student_achieve);

        $prepare_insertion->execute([$id_achieve,$school_year,$class,$student_matricule]);
    }

    public function modifyAchieve($new_school_year,$new_class_name,$school_year,$matriculation){


        $update_stmt = "UPDATE `campus_pucket`.`achieve_student` SET `school_year` = ?, `class_name` = ? WHERE `school_year` = ? AND `matriculation` = ?;";

        $prepare_update = $this->conn->prepare($update_stmt);

        $prepare_update->execute([$new_school_year,$new_class_name,$school_year,$matriculation]);

        return true ;
    }

    public function getStudentAchieve($matriculation){

        $get_achieve = "SELECT * FROM `campus_pucket`.`achieve_student` WHERE  `matriculation` = ?";

        $prepare_stmt = $this->conn->prepare($get_achieve);
        $prepare_stmt->execute([$matriculation]);
        $all_student_achieve = $prepare_stmt->fetchAll();

        return $all_student_achieve;

    }



}


