<?php
namespace App\admin\Auth;
use App\Connection;
use PDO;
use PDOException;
class Auth extends Connection
{
    private $user;
    private $email;
    private $password;
    // public function set($data = array()){
    //     if(array_key_exists('user',$data)){
    //         $this->user = $data['user'];
    //     }
    //     if(array_key_exists('email',$data)){
    //         $this->email = $data['email'];
    //     }
    //     if(array_key_exists('password',$data)){
    //         $this->password = $data['password'];
    //     }
    //     return $this;
    // }

    // public function store(){
    //     try {

    //         $stm =  $this->con->prepare("INSERT INTO `registration`(`user`,`email`,`password`) 
    //                                     VALUES(:user,:email,:password)");
    //         $result =$stm->execute(array(
    //             ':user' => $this->user,
    //             ':email' => $this->email,
    //             ':password' => $this->password


    //         ));
    //         if($result){
    //             //$_SESSION['msg'] = 'successfully Registered !!!';
    //             header('location:login.php');
    //         }

    //     } catch (PDOException $e) {
    //         print "Error!: " . $e->getMessage() . "<br/>";
    //         die();
    //     }

    //    // $this->set();
    // }

    public function login(){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `users` where (user = :user OR email = :email) AND password = :password");
            $stm->bindValue(':user', $this->user, PDO::PARAM_STR);
            $stm->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stm->bindValue(':password', $this->password, PDO::PARAM_STR);
            $stm->execute();
            $users = $stm->fetch(PDO::FETCH_ASSOC);
            var_dump($users);
            if(!empty($users['id'])){
                $_SESSION['user'] = $users['user'];
                header('location: ../../../index.php');
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}