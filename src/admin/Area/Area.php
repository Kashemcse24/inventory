<?php
namespace App\admin\Area;
use App\Connection;
use PDO;
use PDOException;


class Area extends Connection
{
    
    private $area_name ="";
   
    private $id = "";
    
    public function set($data = array()){
            if(array_key_exists('area_name', $data)){
                $this->area_name = $data['area_name'];
            }

            // if(array_key_exists('id', $data)){
            //  $this->id = $data['id'];
            // }
             return $this;
    }


    public function storearea(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $area_name = filter_var($_POST['area_name'], FILTER_SANITIZE_STRING);
            
            //$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

            try {


        $stm =  $this->con->prepare("INSERT INTO `area`(`area_name`) 
                                        VALUES(:area_name)");
         $result =$stm->execute(array(
             ':area_name' => $this->area_name,
             
             //':id' => $this->id,

         ));
        if($result){
            $_SESSION['msg'] = 'Area successfully Inserted !!!';
            header('location:addarea.php');
       
        }

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
            
        }

    }



    public function index(){
       try {

           $stm =  $this->con->prepare("SELECT * FROM `area`");
           $stm->execute();
           return $stm->fetchAll(PDO::FETCH_ASSOC);

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }
   

    public function editarea($id){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `area` WHERE id = :id");
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



    public function deletearea($id){
         try {

            $stm =  $this->con->prepare("DELETE FROM `area` WHERE id = :id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();
            if($stm){
                $_SESSION['delete'] = 'Area successfully Deleted !!!';
                header('location:addarea.php');
                
            }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


     public function updateuser(){
        try {

            $stmt = $this->con->prepare("UPDATE `users` SET `name` = :name, `mobile` = :mobile, `email` = :email, `address` = :address, `org_name` = :org_name, `password` =:password, `cpassword` = :cpassword WHERE `id` = :id;");
            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':mobile', $this->mobile, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':address', $this->address, PDO::PARAM_STR);
            $stmt->bindValue(':org_name', $this->org_name, PDO::PARAM_STR);
            $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
            $stmt->bindValue(':cpassword', $this->cpassword, PDO::PARAM_STR);
            $stmt->bindValue(':id', $this->id, PDO::PARAM_STR);
            $stmt->execute();
            // if($stmt){
            //     $_SESSION['update'] = 'Data successfully Updated !!!';
            //      header('location:manageuser.php');
            //     //echo 'data updated successfully';
            // }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }





     

}


?>