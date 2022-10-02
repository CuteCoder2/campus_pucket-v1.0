<?php


class Exam{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function getExam(){
        try {
            $get_exam = "SELECT * FROM  `campus_pucket`.`exam` WHERE 1;";

            $query_all_get_exam = $this->conn->query($get_exam);

           $fetching_get_exam = $query_all_get_exam->fetchAll();

            return $fetching_get_exam;


        } catch (PDOException $er) {
            throw new Exception('No Exam Found');
        }
    }


    public function newExam($exam_id,$start,$ends,$school_year,$id_type_exam){

            try{
                $check_exam = "SELECT * FROM  `campus_pucket`.`exam` WHERE `exam`.`id_exam` = ? AND `exam`.`start` = ? AND `exam`.`ends` = ? AND  `exam`.`school_year` = ? AND `exam`.`id_exam_type` = ?;";
              
                $prepare_check = $this->conn->prepare($check_exam);

                $prepare_check->execute([$exam_id,$start,$ends,$school_year,$id_type_exam]);

                $numexam = $prepare_check->rowCount();


                if ($numexam == 0){
                    
                    $insert_exam = "INSERT INTO `campus_pucket`.`exam` (`id_exam`, `start`, `ends`, `school_year`, `id_exam_type`) VALUES (?,?,?,?,?);
                    ";

                    $prepare_new_exam = $this->conn->prepare($insert_exam);
                    
                    $prepare_new_exam->execute([$exam_id,$start,$ends,$school_year,$id_type_exam]);
                    
                    echo "New exam Created";
                }else{
                    echo " exam Already Exsist";
                }
                
            }catch(PDOException $er){
                throw $er;
                throw new Exception ("Unable to Create New exam");
            }
    }

}


// $exam = new Exam();

// $exam->newExam("2020sec","2020-08-8","2020-08-20","2020/2021",1);

// var_dump($exam->getExam());