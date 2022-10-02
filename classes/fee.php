<?php


class fee{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function newFee($fee){
        $fee_stmt = "INSERT INTO `campus_pucket`.`fee` ( `fee`) VALUES(?)";

        $prepare_fee = $this->conn->prepare($fee_stmt);

        $prepare_fee->excute([$fee]);

        return true;
    }

    public function getAllFee(){
        $select_stmt = "SELECT * FROM `campus_pucket`.`fee` WHERE 1";

        $executing = $querying_stmt = $this->conn->query($select_stmt);

        $get_all_result = $executing->fetchAll();

        return $get_all_result;
    }

    public function modifyFee($new_fee,$id_fee){
        $modify_stmt = "UPDATE `campus_pucket`.`fee` SET `fee` = ? WHERE `id_fee` = ?;";

        $prepare_fee_update = $this->conn->prepare($modify_stmt);

        $prepare_fee_update->excute([$new_fee,$id_fee]);
        
        return true;
    }
}