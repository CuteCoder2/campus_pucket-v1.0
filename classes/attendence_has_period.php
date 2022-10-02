<?php


require_once dirname(__FILE__)."/dbconnect.php";


class attendanceHasPeriod{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    
    }

    public function newAttendencePeriod($id_attendence,$id_period){

        $new_attendence_period = "INSERT INTO `campus_pucket`.`attendence_has_subject` (`id_attendence`, `id_period`) VALUES (?,?);";

        $prepare_new_attendance_period = $this->conn->prepare($new_attendence_period);

        $prepare_new_attendance_period->execute([$id_attendence,$id_period]);
        return true;
    }




}