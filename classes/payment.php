<?php


require_once dirname(__FILE__)."/dbconnect.php";


class payment{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    
    }

    public function newPayment($id_payment,$amount,$student_matriculation,$staff_matriculation,$motif,$payment_method,$id_campus,$school_year,$class_name,$student_fee){


        $payment_stmt = " INSERT INTO `campus_pucket`.`payment`
        (`id_payment`, `amount`, `student_matriculation`, `staff_matriculation`, `id_motif`, `id_payment_method`, `id_campus`,`school_year`, `class_name`) VALUES (?,?,?,?,?,?,?,?,?);";

        $prepare_payment = $this->conn->prepare($payment_stmt);

        $prepare_payment->execute([$id_payment,$amount,$student_matriculation,$staff_matriculation,$motif,$payment_method,$id_campus,$school_year, $class_name]);


        
        if(
            $motif == 2 OR $motif == 3 OR $motif == 4 OR $motif == 5 OR $motif == 6 OR $motif == 7
        ){
            $fee_left = (int)$student_fee - $amount;
            
            $update_student_fee = "UPDATE `campus_pucket`.`student` SET `fee` = ? WHERE `student`.`matriculation` = ?";

            $prepare_update = $this->conn->prepare($update_student_fee);

            $prepare_update->execute([$fee_left,$student_matriculation]);

            return true;

        }

         return true;
    }

    public function modifyPayment($amount,$student_matriculation,$staff_matriculation,$motif,$payment_method,$id_campus,$id_payment,$school_year){
      
      $modify_payment = " UPDATE `campus_pucket`.`payment`
        SET  `amount` = ?, `student_matriculation` = ?, `id_motif` = ?, `id_payment_method` = ?, `id_campus` ,`school_year` = ? WHERE `id_payment` = ?";

        $prepare_modify_payment = $this->conn->prepare($modify_payment);

        $prepare_modify_payment->execute([$amount,$student_matriculation,$staff_matriculation,$motif,$payment_method,$id_campus,$id_payment,$school_year]);
        return true;
    }


    public function getPaymentTransaction($school_year,$date_start){

        $get_payment = "SELECT * FROM  `campus_pucket`.`payment`,`campus_pucket`.`staff`, `campus_pucket`.`student` , `campus_pucket`.`year`,`campus_pucket`.`motif`, `campus_pucket`.`payment_method` , `campus_pucket`.`campus` WHERE `payment`.`student_matriculation` = `student`.`matriculation` AND  `payment`.`staff_matriculation` = `staff`.`matriculation` AND  `payment`.`id_motif` = `motif`.`id_motif` AND `payment`.`id_payment_method` = `payment_method`.`id_payment_method` AND `payment`.`id_campus` = `campus`.`id_campus` AND `payment`.`school_year` = `year`.`school_year` AND `year`.`school_year` = ? AND `payment`.`date` BETWEEN ? AND NOW();";

        $prepare_get_payment = $this->conn->prepare($get_payment);

        $prepare_get_payment->execute([$school_year,$date_start]);

        $get_all_payment_done = $prepare_get_payment->fetchAll();

        return $get_all_payment_done ;
    }

    public function getStudentPayment($school_year,$student_matriculation){

        $get_payment = "SELECT * FROM  `campus_pucket`.`payment`,`campus_pucket`.`staff`, `campus_pucket`.`student` , `campus_pucket`.`year`,`campus_pucket`.`motif`,
        `campus_pucket`.`payment_method` , `campus_pucket`.`campus`,`campus_pucket`.`sub_serie`,`campus_pucket`.`class` WHERE `payment`.`student_matriculation` = `student`.`matriculation` AND 
        `payment`.`staff_matriculation` = `staff`.`matriculation` AND  `payment`.`id_motif` = `motif`.`id_motif` AND
        `payment`.`id_payment_method` = `payment_method`.`id_payment_method` AND `payment`.`id_campus` = `campus`.`id_campus` AND `sub_serie`.`id_sub_serie` = `student`.`id_sub_serie`  AND `payment`.`school_year` = `year`.`school_year` AND `class`.`class_name` = `payment`.`class_name` AND  `year`.`school_year` = ? AND `student`.`matriculation` = ?;
       ";

        $prepare_get_payment = $this->conn->prepare($get_payment);

        $prepare_get_payment->execute([$school_year,$student_matriculation]);

        $get_all_payment_done = $prepare_get_payment->fetchAll();

        return $get_all_payment_done ;

    }

    public function getStaffPaymentDone($school_year,$date_start,$staff_matriculation){
        
        $get_payment = "SELECT * FROM  `campus_pucket`.`payment`,`campus_pucket`.`staff`, `campus_pucket`.`student` , `campus_pucket`.`year`,`campus_pucket`.`motif`, `campus_pucket`.`payment_method` , `campus_pucket`.`campus` WHERE `payment`.`student_matriculation` = `student`.`matriculation` AND  `payment`.`staff_matriculation` = `staff`.`matriculation` AND  `payment`.`id_motif` = `motif`.`id_motif` AND `payment`.`id_payment_method` = `payment_method`.`id_payment_method` AND `payment`.`id_campus` = `campus`.`id_campus` AND `payment`.`school_year` = `year`.`school_year` AND `year`.`school_year` = ? AND `payment`.`date` BETWEEN ? AND NOW(); AND `staff`.`matriculation` = ?";

        $prepare_get_payment = $this->conn->prepare($get_payment);

        $prepare_get_payment->execute([$school_year,$date_start,$staff_matriculation]);

        $get_all_payment_done = $prepare_get_payment->fetchAll();

        return $get_all_payment_done ;

    }

}