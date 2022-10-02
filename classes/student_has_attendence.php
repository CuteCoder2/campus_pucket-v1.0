<?php


require_once dirname(__FILE__)."/dbconnect.php";


class attendanceHasPeriod{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    
    }

    public function newAttendencePeriod($student_matriculation,$id_attendence){

        $new_attendence_student = "INSERT INTO `campus_pucket`.`student_has_attendence` (`student_matriculation`,`id_attendence`) VALUES (?,?);";

        $prepare_new_attendance_student = $this->conn->prepare($new_attendence_student);

        $prepare_new_attendance_student->execute([$student_matriculation,$id_attendence]);
        return true;
    }




}