<?php


class certification{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function newCertification($id_certificate,$certificate_name,$duration){
       
    try{
       $insert_certi = "INSERT INTO `certification` (`id_certificate`, `certificate_name`, `duration`) VALUES
        (  ?,?,?,?),";

        $prepare_insertion = $this->conn->prepare($insert_certi);

        $prepare_insertion->excute([$id_certificate,$certificate_name,$duration]);
    }catch(PDOException $er){
        throw New Exception("No cetificate Found");
    }
    }

    public function getAllCertificate(){

    try{
        $select_all_certfication = "SELECT * FROM `campus_pucket`.`certification` WHERE 1";

        $excute_stmt = $this->conn->query($select_all_certfication);

        $get_all_result = $excute_stmt->fetchAll();

        return $get_all_result;

    }catch(PDOException $er){
        throw New Exception("No cetificate Found");
    }
}

    public function getCertificateBYId($id_certificate){

    try{
        $select_all_certfication = "SELECT * FROM `campus_pucket`.`certificate` WHERE 1";

        $excute_stmt = $this->conn->prepare($select_all_certfication);

        $excute_stmt->excute([$id_certificate]);

        $get_all_result = $excute_stmt->fetchAll();

        return $get_all_result;

    }catch(PDOException $er){
        throw New Exception("No cetificate Found");
    }

    }

    public function modifyCertificate($certificate_name,$duration,$id_certificate){
        try{

            $udate_stmt = "UPDATE `campus_pucket`.`certification` SET `certificate_name` = ? , `duration` = ? WHERE `id_certificate` = ?";

            $prepare_stmt = $this->conn->prepare($udate_stmt);
            
            $prepare_stmt->execute([$certificate_name,$duration,$id_certificate]);
            
            return true;
        }catch(PDOException $er){
            throw New Exception("unable to modify cetificate");
        }
    }

}