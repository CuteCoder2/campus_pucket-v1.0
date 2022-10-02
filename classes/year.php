<?php


require_once dirname(__FILE__)."/dbconnect.php";



class year{

    private $conn;


    function __construct(){
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    /***
     * METHOD TO CREATE NEW SCHOOL YEAR
     */

    public function newYear($yearStart,$yearEnd){

        $check_stmt = "SELECT * from `ampus_pucket`.`year` WHERE `year`.`start` = ? AND `year`.`end` = ?;";

        $prepre_check_stmt = $this->conn->prepare($check_stmt);


       $prepre_check_stmt->execute([$yearStart,$yearEnd]);

        $numyear = $prepre_check_stmt->rowCount();

       if($numyear != 0){
           echo "this year already exisit";
       }else{

        $id_year = $yearStart."/".$yearEnd;
        $createNewYear = "INSERT INTO `campus_pucket`.`year` (`school_year`, `start`, `end`) VALUES (?,?,?);";

        $prepre_create_stmt = $this->conn->prepare($createNewYear);

        $prepre_create_stmt->execute([$id_year,$yearStart,$yearEnd]);

        $update_all_student = "UPDATE `campus_pucket`.`student` SET `status`= 'inactive' ; WHERE `status`= 'active' ;";

        $this->conn->query($update_all_student);
        return true ;
       }
    }


     /***
     * METHOD TO CREATE MODIFY SCHOOL YEAR
     */

     public function modifyYear($school_year,$yearStart,$yearEnd){

            $modifyYear = "UPDATE `campus_pucket`.`year` SET `start` = ?, `end` = ? WHERE (`school_year` = ?);";

            $prepre_modify_stmt = $this->conn->prepare($modifyYear);

            if($prepre_modify_stmt->execute([$yearStart,$yearEnd,$school_year])){
                echo "School year modified";
                echo $school_year ."<br>";
                echo $yearStart ."<br>";
                echo $yearEnd ."<br>";
            }else{
                echo "failed to modify SchoolYear";
            }

     }

     public function getLastTwoYear(){
         $get_last_two_year = "SELECT * from `campus_pucket`.`year` WHERE 1 ORDER BY `year`.`start` DESC  LIMIT 2;";

         $executing = $this->conn->query($get_last_two_year);

         $fetching_result = $executing->fetchAll();

         return $fetching_result;
     }

     public function getLastYear(){
         $get_last_year = "SELECT * from `campus_pucket`.`year` WHERE 1 ORDER BY `year`.`start` DESC  LIMIT 1;";

         $executing = $this->conn->query($get_last_year);

         $fetching_result = $executing->fetchAll();

         return $fetching_result;
     }


}

?>