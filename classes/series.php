<?php


class series{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function getSeries(){
        try {
            $get_series = "SELECT * FROM  `campus_pucket`.`series` WHERE 1;";

            $query_all_series = $this->conn->query($get_series);

           $fetching_series = $query_all_series->fetchAll();

            return $fetching_series;


        } catch (PDOException $er) {
            throw new Exception('No Section Found');
        }
    }

    public function getSeriesById($serie_id){
        try {
            $get_series = "SELECT * FROM  `campus_pucket`.`series` WHERE 1 AND `series`.`id_series` = ?;";

            $prepre_get_series = $this->conn->Prepare($get_series);


            $prepre_get_series ->execute([$serie_id]);

           $fetching_series = $prepre_get_series->fetchAll();

            return $fetching_series;


        } catch (PDOException $er) {
            throw new Exception('No Section Found');
        }
    }


    public function newSeries($serie_id,$serieName){

            try{
                $check_series = "SELECT * FROM  `campus_pucket`.`series` WHERE  `series`.`id_series` = ? AND `series`.`series_name` = ?;";
              
                $prepare_check = $this->conn->prepare($check_series);

                $prepare_check->execute([$serie_id,$serieName]);

                $numSeries = $prepare_check->rowCount();


                if ($numSeries == 0){

                    
                    $insert_series = "INSERT INTO `campus_pucket`.`series` (`id_series`,`series_name`) VALUES (?,?);";

                    $prepare_new_series = $this->conn->prepare($insert_series);
                    
                    $prepare_new_series->execute([$serie_id,$serieName]);
                    
                    echo "New Serie Created";
                }else{
                    echo "Serie Already Exsist";
                }

            }catch(PDOException $er){
                throw new Exception ("Unable toi Create New Serie");
            }
    }
}



?>