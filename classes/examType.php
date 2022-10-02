<?php


class ExamType{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function getExamType(){
        try {
            $get_exam_type = "SELECT * FROM  `campus_pucket`.`exam_type` WHERE 1;";

            $query_all_examget_exam_type = $this->conn->query($get_exam_type);

           $fetching_examget_exam_type = $query_all_examget_exam_type->fetchAll();

            return $fetching_examget_exam_type;


        } catch (PDOException $er) {
            throw new Exception('No subject Found');
        }
    }


    public function newExamType($exam_type){

            try{
                $check_exam_type = "SELECT * FROM  `campus_pucket`.`exam_type` WHERE `exam_type`.`exam_type_name` = ?;";
              
                $prepare_check = $this->conn->prepare($check_exam_type);

                $prepare_check->execute([$exam_type]);

                $numsubject = $prepare_check->rowCount();


                if ($numsubject == 0){

                    
                    $insert_subject = "INSERT INTO `campus_pucket`.`exam_type` (`exam_type_name`) VALUES (?);";

                    $prepare_new_subject = $this->conn->prepare($insert_subject);
                    
                    $prepare_new_subject->execute([$exam_type]);
                    
                    echo "New exam type Created";
                }else{
                    echo "exam type Already Exsist";
                }
                
            }catch(PDOException $er){
                throw $er;
                throw new Exception ("Unable to Create New exam type");
            }
    }

}


// $examtype = new ExamType();
// $examtype->newExamType("second sequence");
// var_dump($examtype->getExamType());

