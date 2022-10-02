<?php


class Classes{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function getAllClasses(){
        try {
            $get_class = "SELECT * FROM  `campus_pucket`.`class` WHERE 1;";

            $query_all_get_class = $this->conn->query($get_class);

           $fetching_get_class = $query_all_get_class->fetchAll();

            return $fetching_get_class;


        } catch (PDOException $er) {
            throw new Exception('No Exam Found');
        }
    }


    public function newClass($class_name,$id_section){

            try{
                    $insert_class = "INSERT INTO `campus_pucket`.`class` (`class_name`, `id_section`) VALUES (?,?);
                    ";

                    $prepare_new_class = $this->conn->prepare($insert_class);
                    
                    $prepare_new_class->execute([$class_name,$id_section]);
                    
                return true;
                
            }catch(PDOException $er){
                throw new Exception ("Unable to Create New class");
            }
    }

    public function getClassById($class_name){
        $select_class = "SELECT * FROM  `campus_pucket`.`class` WHERE 1 AND  `class`.`class_name` = ?";

        $preparestmt = $this->conn->prepare($select_class);

        $preparestmt->execute([$class_name]);

        $get_class = $preparestmt->fetchAll();

        return $get_class;
    }

}

//  