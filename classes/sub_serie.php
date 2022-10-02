<?php


class subSeries{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function getSubSerie(){
        try {
            $get_serie = "SELECT * FROM  `campus_pucket`.`sub_serie`,`campus_pucket`.`certification` WHERE 1 AND `sub_serie`.`id_certificate` = `certification`.`id_certificate`;";

            $query_all_serie = $this->conn->query($get_serie);

           $fetching_serie = $query_all_serie->fetchAll();

            return $fetching_serie;

        } catch (PDOException $er) {
            // throw $er;
            throw new Exception('No sub Section Found');
        }
    }


    public function newSubSerie($sub_serie_id,$sub_serieName,$series_id,$subseriimg,$about_sub_serie,$id_certificate){
    
        try{
                    $insert_serie = "INSERT INTO `campus_pucket`.`sub_serie` (`id_sub_serie`, `sub_serie_name`, `id_series`, `sub_serie_img`, `about_serie`,`id_certificate`) VALUES (?,?,?,?,?,?)";

                    $prepare_new_serie = $this->conn->prepare($insert_serie);
                    
                    $prepare_new_serie->execute([$sub_serie_id,$sub_serieName,$series_id,$subseriimg,$about_sub_serie,$id_certificate]);

                    return true;

            }catch(PDOException $er){
                echo $er;
                throw new Exception ("Unable toi Create New Sub Serie");
            }
    }

    public function getSubSerieById($serie_id){
        try {
            $get_serie = "SELECT * FROM  `campus_pucket`.`sub_serie`,`campus_pucket`.`certification` WHERE 1 AND `id_sub_serie` = ?  AND `sub_serie`.`id_certificate` = `certification`.`id_certificate`;";

            $prepare_get_serie = $this->conn->prepare($get_serie);

            $prepare_get_serie->execute([$serie_id]);

           $fetching_serie = $prepare_get_serie->fetchAll();

            return $fetching_serie;


        } catch (PDOException $er) {
            echo $er;
            throw new Exception('No sub Section Found');
        }
    }



}