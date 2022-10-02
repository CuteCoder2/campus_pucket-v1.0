<?php


class period{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function getPeriod(){
        try {
            $get_period = "SELECT * FROM  `campus_pucket`.`period` WHERE 1;";

            $query_all_period = $this->conn->query($get_period);

           $fetching_period = $query_all_period->fetchAll();

            return $fetching_period;


        } catch (PDOException $er) {
            throw new Exception('No Period Found');
        }
    }


    public function newPeriod($start,$end){

            try{
                $check_period = "SELECT * FROM  `campus_pucket`.`period` WHERE  `period`.`start` = ? AND `period`.`end` = ?;";
              
                $prepare_check = $this->conn->prepare($check_period);

                $prepare_check->execute([$start,$end]);

                $numperiod = $prepare_check->rowCount();


                if ($numperiod == 0){

                    
                    $insert_period = "INSERT INTO `campus_pucket`.`period` (`start`, `end`) VALUES (?,?);";

                    $prepare_new_period = $this->conn->prepare($insert_period);
                    
                    $prepare_new_period->execute([$start,$end]);
                    
                    echo "New Period Created";
                }else{
                    echo "Period Already Exsist";
                }

            }catch(PDOException $er){
                throw new Exception ("Unable toi Create New period");
            }
    }

    public function modifyPeriod($start,$end,$id_period){

        $update_period = "UPDATE `campus_pucket`.`period` SET `period`.`start` = ?, `period`.`end` = ? WHERE `period`.`id_period` = ?;";

        $prepare_update = $this->conn->prepare($update_period);

       if( $prepare_update->execute([$start,$end,$id_period])){
           
        echo "Period Updated";
    }else{
           echo "Period couldn't be  Updated";

       }
    }
}


$period = new Period();

$period->newPeriod("10:00","11:00");

var_dump($period->getPeriod());
