<?php

require_once dirname(__FILE__)."/dbconnect.php";


class student{
    
    private $conn;
     
    public function __construct(){
        

        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  

    }


    public function getAllActiveStudent(){
        $get_all_stmt = "SELECT * FROM `campus_pucket`.`student`,`campus_pucket`.`year`,`campus_pucket`.`section` ,`campus_pucket`.`class`,`campus_pucket`.`sub_serie`,`campus_pucket`.`campus` WHERE `student`.`status` = 'active' AND `student`.`class_name` = `class`.`class_name` AND `student`.`id_sub_serie` = `sub_serie`.`id_sub_serie` AND `student`.`id_campus` = `campus`.`id_campus` AND`student`.`school_year` = `year`.`school_year` AND `student`.`id_section` = `section`.`id_section` ORDER BY `register_date` DESC;";

        $query = $this->conn->query($get_all_stmt);

        $fetch_student_all_stmt = $query->fetchAll();

        return $fetch_student_all_stmt;
    }

    public function getAllClassActiveStudent($class_name){
        $get_all_stmt = "SELECT * FROM `campus_pucket`.`student`,`campus_pucket`.`section`,`campus_pucket`.`year` ,`campus_pucket`.`class`,`campus_pucket`.`sub_serie`,`campus_pucket`.`campus` WHERE `student`.`status` = 'active' AND `student`.`class_name` = `class`.`class_name` AND `student`.`id_sub_serie` = `sub_serie`.`id_sub_serie` AND `student`.`id_campus` = `campus`.`id_campus` AND `student`.`id_section` = `section`.`id_section` AND `student`.`school_year` = `year`.`school_year` AND `student`.`class_name`= ? ORDER BY `register_date` DESC";

        $prepare_stmt = $this->conn->prepare($get_all_stmt);
        
        $prepare_stmt->execute([$class_name]);

        $fetching_all_class_active_student = $prepare_stmt->fetchAll();

        return $fetching_all_class_active_student;
    }

    public function getAllNewStudent(){

        $new_student_stmt = "SELECT * FROM `campus_pucket`.`student`,`campus_pucket`.`section` ,`campus_pucket`.`year` ,`campus_pucket`.`class`,`campus_pucket`.`sub_serie`,`campus_pucket`.`campus` WHERE `student`.`status` = 'active' AND `student`.`class_name` = `class`.`class_name` AND `student`.`id_sub_serie` = `sub_serie`.`id_sub_serie` AND `student`.`id_campus` = `campus`.`id_campus` AND `student`.`id_section` = `section`.`id_section` AND `student`.`school_year` = `year`.`school_year` AND  date(`register_date`)  BETWEEN (`start` ) AND ( `end` ) AND date(now()) BETWEEN (`start`) AND ( `end`)  ORDER BY `register_date` DESC;";

        $query = $this->conn->query($new_student_stmt);

        $get_all_new_student = $query->fetchAll();

        return $get_all_new_student;
    }
    
    public function getAllClassNewStudent($class_name){

        $new_student_stmt = "SELECT * FROM `campus_pucket`.`student` ,`campus_pucket`.`year`,`campus_pucket`.`class` WHERE `student`.`school_year` = `year`.`school_year`
        AND `class`.`class_name` = `student`.`class_name` AND  date(`register_date`)  BETWEEN (`start` ) AND ( `end` ) 
        AND date(now()) BETWEEN (`start`) AND ( `end`);";

        $prepare_stmt = $this->conn->prepare($new_student_stmt);

        $prepare_stmt->execute([$class_name]);
        $get_all_new_student = $prepare_stmt->fetchAll();

        return $get_all_new_student;
    }

    public function getAllStudent(){
        $get_all_stmt = "SELECT * FROM `campus_pucket`.`student` WHERE 1";

        $query = $this->conn->query($get_all_stmt);

        $fetch_student_all_stmt = $query->fetchAll();

        return $fetch_student_all_stmt;
    }
    

    public function addNewStudent($matriculation,$fname,$oname,$lname,$image_path,$tel,$sex,$DOB,$POB,$nationality,$resident,$religion,$marital_status,$email,$fee,$class,$series,$sub_serie,$campus,$school_year,$id_section){

   
   try {    

    $insert_student_smt = "INSERT INTO `campus_pucket`.`student` (`matriculation`, `fname`, `oname`, `lname`, `picture`, `tel`, `sex`, `DOB`, `POB`, `nationality`, `resident`, `religion`, `marital_status`, `email`, `fee`, `class_name`, `id_series`, `id_sub_serie`, `id_campus`, `school_year`,`id_section`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        
    $prepre_new_student = $this->conn->prepare($insert_student_smt);

    $prepre_new_student->execute([$matriculation,$fname,$oname,$lname,$image_path,$tel,$sex,$DOB,$POB,$nationality,$resident,$religion,$marital_status,$email,$fee,$class,$series,$sub_serie,$campus,$school_year,$id_section]);

    return true;

} catch (PDOException $er) {

        throw new Exception ($er);
    }
}


public function modifyStudent($fname,$oname,$lname,$image_path,$tel,$sex,$DOB,$POB,$nationality,$resident,$religion,$marital_status,$email,$fee,$class,$series,$sub_serie,$campus,$school_year,$matriculation){

   
    try {    
        
        $this->conn->query("start transaction");
        
        
        $modify_student_smt = "UPDATE `campus_pucket`.`student`  SET  `fname` = ?, `oname` = ?, `lname` = ?, `picture` = ?, `tel` = ?, `sex` = ?, `DOB` = ?, `POB` = ?, `nationality` = ?, `resident` = ?, `religion` = ?, `marital_status` = ?, `email` = ?, `fee` = ?, `class_name` = ?, `id_series` = ?, `id_sub_serie` = ?, `id_campus` = ?, `school_year` = ? WHERE `matriculation` = ?;";
        $prepre_nmodify_student = $this->conn->prepare($modify_student_smt);
        
        
        $prepre_nmodify_student->execute([$fname,$oname,$lname,$image_path,$tel,$sex,$DOB,$POB,$nationality,$resident,$religion,$marital_status,$email,$fee,$class,$series,$sub_serie,$campus,$school_year,$matriculation]);

    }catch(PDOException $er){
        throw new Exception ($er);

    }

} 


    public function deleteStudent($matriculation){
            $delete_student = "UPDATE `campus_pucket`.`student` SET `student`.`status` = 'inactive' WHERE `student`.`matriculation` = ?;";

            $prepare_delete_student = $this->conn->prepare($delete_student);

            $prepare_delete_student->execute([$matriculation]);
    }


    public function getStudentByMatriculation($matriculation){
            $select_student = " SELECT * FROM  `campus_pucket`.`student`,`campus_pucket`.`series`,`campus_pucket`.`sub_serie`,`campus_pucket`.`section`,`campus_pucket`.`campus` WHERE `student`.`matriculation` = ? AND `student`.`id_series` = `series`.`id_series` AND `student`.`id_sub_serie` =  `sub_serie`.`id_sub_serie` AND `section`.`id_section` = `student`.`id_section` AND `student`.`id_campus` = `campus`.`id_campus` ORDER BY `register_date` DESC;";

            $prepare_select_student = $this->conn->prepare($select_student);

            $prepare_select_student->execute([$matriculation]);

            $student = $prepare_select_student->fetchAll();

            return $student ;
    }

    public function getStudentParent($parent_tel){
        $get_student_parent_stmt = " SELECT * FROM `campus_pucket`.`parent_has_student` INNER JOIN `campus_pucket`.`student` ON `student`.`matriculation` = `parent_has_student`.`student_matriculation`  WHERE `parent`.`tel` = ?;";

        $prepare_student_parent = $this->conn->prepare($get_student_parent_stmt);

        $prepare_student_parent->execute([$parent_tel]);

        $get_info = $prepare_student_parent->fetchAll();

        return $get_info ;
    }

}