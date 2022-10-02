<?php


class subject{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function getAllSubject(){
        try {
            $get_subject = "SELECT * FROM  `campus_pucket`.`subject` WHERE 1 ORDER BY `subject_name` ASC;";

            $query_all_subject = $this->conn->query($get_subject);

           $fetching_subject = $query_all_subject->fetchAll();

            return $fetching_subject;


        } catch (PDOException $er) {
            echo $er;
            // throw new Exception('No subject Found');
        }
    }


    public function newSubject($id_subject,$subject_name,$coifficient){

            try{
                $check_subject = "SELECT * FROM  `campus_pucket`.`subject` WHERE `subject`.`id_subject` = ?;";
              
                $prepare_check = $this->conn->prepare($check_subject);

                $prepare_check->execute([$id_subject]);

                $numsubject = $prepare_check->rowCount();


                if ($numsubject == 0){

                    
                    $insert_subject = "INSERT INTO `campus_pucket`.`subject` (`id_subject`, `name`, `coifficient`)  VALUES (?,?,?);";

                    $prepare_new_subject = $this->conn->prepare($insert_subject);
                    
                    $prepare_new_subject->execute([$id_subject,$subject_name,$coifficient]);
                    
                    echo "New subject Created";
                }else{
                    echo "Subject Already Exsist";
                }
                
            }catch(PDOException $er){
                throw $er;
                throw new Exception ("Unable to Create New subject");
            }
    }

    public function modifySubject($id_subject,$subject_name,$coifficient){

            try{
            
                $update_subject = "UPDATE `campus_pucket`.`subject` SET `subject`.`name` =  ? , `subject`.`coifficient` = ? WHERE `subject`.`id_subject` = ? ;";

                $prepare_update = $this->conn->prepare($update_subject);
        
                if($prepare_update->execute([$subject_name,$coifficient,$id_subject])){
                    
                    echo "Subject Modified";
                    
                }else{
                    
                    echo "Could not Modify Subject";
                }

            
            
            }catch(PDOException $er){
                // throw new Exception ("Unable to modify subject");
            }

    }
}

// $subject = new subject();

// $subject->modifySubject("MATH","mathematics",5);

// $subject->newSubject("PHY","physics",5);

// var_dump($subject->getSubject());
