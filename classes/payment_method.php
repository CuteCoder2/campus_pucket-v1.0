<?php
require_once dirname(__FILE__)."/dbconnect.php";


class paymentMethod{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    
    }

    public function addPaymentMethod($payment_method){
        
        $payment_method_stmt = "INSERT INTO `campus_pucket`.`payment_method` (`method`) 
        VALUES (?)";
        
        $prepare_payment_method = $this->conn->prepare($payment_method_stmt);

        $prepare_payment_method->execute([$payment_method]);

    }

    public function getPaymentMethod(){
        $get_payment_method_stmt = "SELECT * FROM `campus_pucket`.`payment_method` WHERE 1";
    
        $query_get_payment = $this->conn->query($get_payment_method_stmt);

        $fetching_all_payment_method = $query_get_payment->fetchAll();
        
        return $fetching_all_payment_method;
    
    
    }


    public function modifyaddPaymentMethod($payment_method){
        $modify_payment_method_stmt = "UPDATE `campus_pucket`.`payment_method` SET `methodcol` = ? WHERE `id_payment_method` = ?";
        
        $prepare_modify_payment_method = $this->conn->prepare($modify_payment_method_stmt);

        $prepare_modify_payment_method->execute([$payment_method]);
    }
    
}