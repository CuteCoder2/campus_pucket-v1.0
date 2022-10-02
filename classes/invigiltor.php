<?php


require_once dirname(__FILE__)."/dbconnect.php";


class Invigiltor{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    
    }

    public function newInvigiltor($id_invigilator,$staff_matriculation,$teacher_matriculation){

        $insert_invilator = "INSERT INTO `campus_pucket`.`invigilator` (`id_invigilator`, `staff_matriculation`, `teacher_matriculation`) VALUES (?,?,?);";

        $prepre_new_invigilator = $this->conn->prepare($insert_invilator);

        $prepre_new_invigilator->execute([$id_invigilator,$staff_matriculation,$teacher_matriculation]);
        
        return true;
        
    }

    public function modifyInvigiltor($staff_matriculation,$teacher_matriculation,$id_invigilator){

        $modify_invigiltor = "UPDATE `campus_pucket`.`invigilator` SET `staff_matriculation` = ? , `teacher_matriculation` = ? WHERE `id_invigilator` = ?";

        $prepare_mofify = $this->conn->prepare($modify_invigiltor);

        $prepare_mofify->execute([$staff_matriculation,$teacher_matriculation,$id_invigilator]);

    }
}