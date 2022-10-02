<?php
ob_start();
session_start();

require_once dirname(__DIR__)."../classes/dbconnect.php";

require_once dirname(__DIR__)."../classes/year.php";
// creating new object of connection to database
$dbconnection = new DBconnect();
// initialising connection function to variable 
$conn = $dbconnection->connection();


if($_SERVER['REQUEST_METHOD'] == "POST"){
 
    
    if (
    isset($_POST['matricultion']) 
    AND 
    !empty($_POST['matricultion'])
    AND 
    isset($_POST['password']) 
    AND 
    !empty($_POST['password'])
    ){

        $matricultion = $_POST['matricultion'];
        $password = $_POST['password'];

        try{

            $search_Staff = "SELECT * FROM `campus_pucket`.`staff`,`campus_pucket`.`post`,`campus_pucket`.`service`,`campus_pucket`.`campus` WHERE `staff`.`matriculation` = ?  AND `staff`.`password` = ? AND `post`.`id_post` = `staff`.`id_post` AND `post`.`id_service` = `service`.`id_service` AND `campus`.`id_campus` = `campus`.`id_campus` ;";

            $prepare_query = $conn->prepare($search_Staff);

            $prepare_query->execute([$matricultion,$password]);

            $num_rows = $prepare_query->rowCount();

            if($num_rows == 1){

                $result = $prepare_query->fetchAll();

                foreach($result as $row){

                    $_SESSION['matriculation'] = $row['staff_matriculation']; 
                    $_SESSION['id_campus'] = $row['id_campus']; 
                    $_SESSION['fname'] = $row['sta_fname']; 
                    $_SESSION['oname'] = $row['sta_oname']; 
                    $_SESSION['lname'] = $row['sta_lname']; 
                    $_SESSION['status'] = $row['status'];
                    $_SESSION['id_post'] = $row['id_post'];
                    $_SESSION['picture'] = $row['picture'];
                    $_SESSION['post name'] = $row['name'];
                    $_SESSION['service'] = $row['service'];
                    $_SESSION['privillage'] = $row['privillage_level'];
                    $_SESSION['campus_name'] = $row['campus_name'];
                    $_SESSION['location'] = $row['location'];
                    $_SESSION['tel'] = $row['tel'];
                    $_SESSION['school_name'] = $row['school_name'];
                }

                if($_SESSION['status'] == 'active'){
  
                switch ($_SESSION['service']) {

                    case 'Deciplinary Service':
                        header('location:../admin/home_dis.php');
                        break;
                        case 'Commercial Service':
                            header('location:../admin/home_com.php');
                        break;
                        case 'Accademic Service';
                            header("location:../admin/home_acad.php");
                        break;
                }

            }else{
                // header("location:../");
                echo "not working 1";
                }

            }else{
                echo $num_rows;
                echo "not working 2";
                // header("location:../");
            }
            
        }catch(PDOException $e){
            echo "not working 2";
            // header("location:../");
        }

    }else{

        echo "not working 4";
        // header("location:../");
    }
}

ob_end_flush();