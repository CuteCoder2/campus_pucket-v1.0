<?php


class identifiyer{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function setInvoiceNumber(){

        $num_month_invoice = "SELECT * FROM `campus_pucket`.`payment` WHERE MONTH(`payment`.`date`) = MONTH(NOW()) AND YEAR(`payment`.`date`) = YEAR(NOW())";

        $prepre_invoice_num = $this->conn->query($num_month_invoice);

        $query_num = $prepre_invoice_num->rowCount();

        $num = $query_num + 1;

        $date = date("ym");
        
        $invoice_number = $date."-".$num;

       return $invoice_number;
    }

    public function setStudentMatricultion($id_sub_serie,$school_year,$fname,$lname){
        $student_num = "SELECT * FROM `campus_pucket`.`student` WHERE `student`.`id_sub_serie` = ? AND `student`.`school_year` = ? ";
      
        $prepre_student_num = $this->conn->prepare($student_num);
      
        $prepre_student_num->execute([$id_sub_serie,$school_year]);
      
        $numrow = $prepre_student_num->rowCount();

       $num = $numrow + 1;
      
      
       $matriculation = strtoupper(substr($fname,0,1).substr($lname,0,1).$id_sub_serie.date("y").($num));

      return $matriculation;
    }

    public function setStaffMatricultion($fname,$lname,$post,){

        $staff_matriculation = "ST".date("d").$post.date("m").substr($fname,0,1).substr($lname,0,1).date("y");
        
        $select_staf = "SELECT * FROM `campus_pucket`.`staff` WHERE year(`register_date`) = year(now()) AND month(`register_date`) = month(now()) AND day(`register_date`) = day(now());";

        $prepre_gen_mat = $this->conn->query($select_staf);

        $get_all_identical_mat = $prepre_gen_mat->fetchAll();

        $num = count($get_all_identical_mat);

        $num = $num + 1;
        
        $matriculation = strtoupper($num.$staff_matriculation);

       return $matriculation;
    }

    public function setTeacherMatricultion($fname,$lname){
    
        $tea_mat = " SELECT * FROM `campus_pucket`.`teacher` WHERE year(`register_date`) = year(now()) AND month(`register_date`) = month(now()) AND day(`register_date`) = day(now()) ;";

        $executing_query =  $this->conn->query($tea_mat);

        $getting_all = $executing_query->fetchAll();

        $num = count($getting_all);

        $matri = "TP".$num.date("y").substr($fname,0,1).date("m").substr($lname,0,1).date("d");

        $matriculation = strtoupper($matri);

        return $matriculation;
    }


}



