<?php


require_once dirname(__FILE__)."/dbconnect.php";


class attendanceHasSubject{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    
    }

    public function newTeacherAttendence($teacher_matriculation,$id_attendence){

        $new_attendence_teacher = "INSERT INTO `campus_pucket`.`teacher_has_attendence` (`teacher_matriculation`,`id_attendence`) VALUES (?,?);";

        $prepare_new_attendance_teacher = $this->conn->prepare($new_attendence_teacher);

        $prepare_new_attendance_teacher->execute([$teacher_matriculation,$id_attendence]);
        return true;
    }




}