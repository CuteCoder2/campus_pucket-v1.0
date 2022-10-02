<?php


class section{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function getSection(){
        try {
            $get_section = "SELECT * FROM  `campus_pucket`.`section` WHERE 1;";

            $query_all_section = $this->conn->query($get_section);

           $fetching_sections = $query_all_section->fetchAll();

            return $fetching_sections;


        } catch (PDOException $er) {
            throw new Exception('No Section Found');
        }
    }


    public function newSection($sectionName){

            try{
                $check_section = "SELECT * FROM  `campus_pucket`.`section` WHERE  `section`.`section_name` = ?";
              
                $prepare_check = $this->conn->prepare($check_section);

                $prepare_check->execute([$sectionName]);

                $numSection = $prepare_check->rowCount();


                if ($numSection == 0){

                    
                    $insert_section = "INSERT INTO `campus_pucket`.`section` (`section_name`) VALUES (?);";

                    $prepare_new_section = $this->conn->prepare($insert_section);
                    
                    $prepare_new_section->execute([$sectionName]);
                    
                    echo "New Section Created";
                }else{
                    echo "Section Already Exsist";
                }

            }catch(PDOException $er){
                throw new Exception ("Unable toi Create New Section");
            }
    }
}

