<?php


require_once dirname(__FILE__)."/dbconnect.php";


class Note{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    
    }

    
    public function newNote($id_note,$mark,$grade,$id_subject,$teachaer_matriculation,$student_matriculation,$class,$id_axam,$school_year){
        $new_note_stmt = "INSERT INTO `campus_pucket`.`note` (`id_note`, `mark`, `grade`, `id_subject`, `teacher_matriculation`, `student_matriculation`, `class_name`, `id_exam`,`school_year`) VALUES (?,?,?,?,?,?,?,?,?);";

        $prepare_new_note = $this->conn->prepare($new_note_stmt);

        $prepare_new_note->execute([$id_note,$mark,$grade,$id_subject,$teachaer_matriculation,$student_matriculation,$class,$id_axam,$school_year]);

        
        
    }

    public function modifyNote($new_mrk,$school_year,$class,$teachaer_matriculation,$id_subject){ 
        
        $update_rank = "UPDATE `campus_pucket`.`note` SET `mark` = ? WHERE  `school_year` = ? AND `class_name` = ? AND `teacher_matriculation` = ?  AND `id_subject` = ?";
        
        $prepare_all_ranking = $this->conn->prepare($update_rank);
        
        $prepare_all_ranking->execute([$new_mrk,$school_year,$class,$teachaer_matriculation,$id_subject]);
            
    }

    
    
    public    function rank($school_year,$class,$teachaer_matriculation,$id_subject){
        
        $rank_selection = "SELECT * FROM `campus_pucket`.`note` WHERE  `school_year` = ? AND `class_name` = ? AND `teacher_matriculation` = ?  AND `id_subject` = ? ORDER BY `mark` DESC;";
        
        $prepare_all_rank_selection = $this->conn->prepare($rank_selection);
        
        $prepare_all_rank_selection->execute([$school_year,$class,$teachaer_matriculation,$id_subject]);
        
        $get_all_ranking = $prepare_all_rank_selection->fetchAll();
        
        // var_dump($get_all_ranking);
        // echo count($get_all_ranking);
    for($i = 1; $i<count($get_all_ranking); $i++){
            
        echo $i.'<br>';

        $update_rank = "UPDATE `campus_pucket`.`note` SET `rank` = $i WHERE  `school_year` = ? AND `class_name` = ? AND `teacher_matriculation` = ?  AND `id_subject` = ?";
        
        $prepare_all_ranking = $this->conn->prepare($update_rank);
        
        $prepare_all_ranking->execute([$school_year,$class,$teachaer_matriculation,$id_subject]);
            
            
        }
        
        }
        


}

$note = new note();

// $note->newNote('6',18,'A','phy','tet','pi20','sixieme','20firstsec','2020/2021');
$note->rank('2020/2021','sixieme','tet','phy');