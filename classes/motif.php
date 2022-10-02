<?php


require_once dirname(__FILE__)."/dbconnect.php";


class paymentMotif{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    
    }

    public function addPaymentMotif($payment_motif){
        $payment_motif_stmt = "INSERT INTO `campus_pucket`.`motif` (`motif`) 
        VALUES (?)";
        
        $prepare_payment_motif = $this->conn->prepare($payment_motif_stmt);

        $prepare_payment_motif->execute([$payment_motif]);
    }

    public function getPaymentMotif(){
        $get_payment_motif_stmt = "SELECT * FROM `campus_pucket`.`motif` WHERE 1";
    
        $query_get_payment = $this->conn->query($get_payment_motif_stmt);

        $fetching_all_payment_motif = $query_get_payment->fetchAll();
        
        return $fetching_all_payment_motif;
    
    
    }


    public function modifyaddPaymentMotif($payment_motif){
        $modify_payment_motif_stmt = "UPDATE `campus_pucket`.`motif` SET `motif` = ? WHERE `id_motif` = ?";
        
        $prepare_modify_payment_motif = $this->conn->prepare($modify_payment_motif_stmt);

        $prepare_modify_payment_motif->execute([$payment_motif]);
    }
    
}