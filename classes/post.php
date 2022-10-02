<?php


class post{


    function  __construct(){
        require_once dirname(__FILE__)."/dbconnect.php";
        $dbcon = new DBconnect();
        
        $this->conn = $dbcon->connection();  
        
    }

    public function getPost(){
        try {
            $get_post = "SELECT * FROM  `campus_pucket`.`post` WHERE 1 ORDER BY `name` ASC;";

            $query_all_post = $this->conn->query($get_post);

           $fetching_post = $query_all_post->fetchAll();

            return $fetching_post;


        } catch (PDOException $er) {
            throw new Exception('No Post Found');
        }
    }


    public function newPost($id_post,$post_name,$privillage){

            try{
                $check_post = "SELECT * FROM  `campus_pucket`.`post` WHERE  `post`.`id_post` = ? AND `post`.`name` = ?;";
              
                $prepare_check = $this->conn->prepare($check_post);

                $prepare_check->execute([$id_post,$post_name]);

                $numPost = $prepare_check->rowCount();


                if ($numPost == 0){

                    
                    $insert_post = "INSERT INTO `campus_pucket`.`post` (`id_post`, `name`, `privillage`)  VALUES (?,?,?);";

                    $prepare_new_post = $this->conn->prepare($insert_post);
                    
                    $prepare_new_post->execute([$id_post,$post_name,$privillage]);
                    
                    echo "New Post Created";
                }else{
                    echo "Post Already Exsist";
                }

            }catch(PDOException $er){
                throw new Exception ("Unable toi Create New post");
            }
    }
}


// $post = new post();


// var_dump($post->getPost());
// $post->newPost("SAC","service academique","chef");

