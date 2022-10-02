

<?php

require_once dirname(__FILE__)."/dbconnect.php";


class parentStudent{
    
    private $conn;
    
    public function __construct(){
        
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function newParentStudent($student_matricule,$parent_tel){

        $insert_new_parentStudent = "INSERT INTO `campus_pucket`.`parent_has_student`
        (`student_matriculation`, `tel`) VALUES (?,?);";

        $prepare_insertion = $this->conn->prepare($insert_new_parentStudent);

        $prepare_insertion->execute([$student_matricule,$parent_tel]);
    }

    public function modifyParentStudent($new_student_matriculation,$new_tel,$student_matriculation,$tel){
        $modify_stmt = "UPDATE `campus_pucket`.`parent_has_student` SET `student_matriculation` = ? , `tel` =  ? WHERE `student_matriculation` = ? AND `tel` = ? ;";

        $prepare_update = $this->conn->prepare($modify_stmt);

        $prepare_update->execute([$new_student_matriculation,$new_tel,$student_matriculation,$tel]);

        return true;
    }



}





?>