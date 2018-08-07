<?php
namespace App\admin\User;
 if(!isset($_SESSION)){
    session_start();
 }
use App\Connection;
use PDO;
use PDOException;


class User extends Connection
{
    
    private $name ="";
    private $mobile ="";
    private $email ="";
    private $user_name ="";
    private $password="";
    private $user_type ="";
    private $id = "";
    
    public function set($data = array()){
            if(array_key_exists('name', $data)){
                    $this->name = $data['name'];
            }

            if(array_key_exists('mobile', $data)){
                $this->mobile = $data['mobile'];
            }

            if(array_key_exists('email', $data)){
                $this->email = $data['email'];
            }


            if(array_key_exists('user_name', $data)){
                $this->user_name = $data['user_name'];
            }

                if(array_key_exists('user_type', $data)){
                $this->user_type = $data['user_type'];
            }

                if(array_key_exists('password', $data)){
                $this->password = $data['password'];
            }

            // if(array_key_exists('id', $data)){
            //  $this->id = $data['id'];
            // }
             return $this;
    }


    public function store(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
            $user_type = filter_var($_POST['user_type'], FILTER_SANITIZE_STRING);
            $password = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING)) ;
            //$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

            try {



        $stm =  $this->con->prepare("INSERT INTO `users`(`name`,`mobile`,`email`,`user_name`, `user_type`, `password`) 
                                        VALUES(:name,:mobile, :email, :user_name, :user_type, :password)");
         $result =$stm->execute(array(
             ':name' => $this->name,
             ':mobile' => $this->mobile,
             ':email' => $this->email,
             ':user_name' => $this->user_name,
             ':user_type' => $this->user_type,
             ':password' => $this->password,
             //':id' => $this->id,

         ));
        if($result){
            $_SESSION['msg'] = 'Data successfully Inserted !!!';
            header('location:manageuser.php');
       
        }

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
            
        }

    }


    public function index(){
       try {

           $stm =  $this->con->prepare("SELECT * FROM `users`");
           $stm->execute();
           return $stm->fetchAll(PDO::FETCH_ASSOC);

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }


public function viewuser($id){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `users` WHERE id = :id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();
            if($stm){
                return $stm->fetch(PDO::FETCH_ASSOC);
            }else{

            }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    public function edituser($id){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `users` WHERE id = :id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();
            if($stm){
                return $stm->fetch(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }



    public function deleteuser($id){
         try {

            $stm =  $this->con->prepare("DELETE FROM `users` WHERE id = :id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();
            if($stm){
                $_SESSION['delete'] = 'Data successfully Deleted !!!';
                header('location:manageuser.php');
                
            }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


     public function updateuser(){
        try {

            $stmt = $this->con->prepare("UPDATE `users` SET `name` = :name, `email` = :email, `user_name` = :user_name, `password` =:password, `mobile` = :mobile,  `user_type` = :user_type   WHERE `id` = :id;");
            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':user_name', $this->user_name, PDO::PARAM_STR);
            $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
            $stmt->bindValue(':mobile', $this->mobile, PDO::PARAM_STR);
            $stmt->bindValue(':user_type', $this->user_type, PDO::PARAM_STR);
            
            $stmt->bindValue(':id', $this->id, PDO::PARAM_STR);
            $stmt->execute();
             if($stmt){
                 $_SESSION['update'] = 'Data successfully Updated !!!';
                 header('location:manageuser.php');
                 echo 'data updated successfully';
             }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }





     

}


?>