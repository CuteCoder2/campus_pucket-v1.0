<?php


require_once dirname(__FILE__)."/dbconnect.php";


class attendanceHasSubject{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    
    }

    public function newAttendenceSubject($id_attendence,$id_subject){

        $new_attendence_subject = "INSERT INTO `campus_pucket`.`attendence_has_subject` (`id_attendence`, `id_subject`) VALUES (?,?);";

        $prepare_new_attendance_subject = $this->conn->prepare($new_attendence_subject);

        $prepare_new_attendance_subject->execute([$id_attendence,$id_subject]);
        return true;
    }




}