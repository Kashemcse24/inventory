<?php
namespace App\admin\Color;
if(!isset($_SESSION)){
    session_start();
 }
use App\Connection;
use PDO;
use PDOException;


class Color extends Connection
{
    
    private $color_name ="";
    private $id = "";
    
    public function set($data = array()){
            if(array_key_exists('color_name', $data)){
                $this->color_name = $data['color_name'];
            }


            // if(array_key_exists('id', $data)){
            //  $this->id = $data['id'];
            // }
             return $this;
    }


    public function storecolor(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $color_name = filter_var($_POST['color_name'], FILTER_SANITIZE_STRING);
        
           
            //$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

            try {



        $stm =  $this->con->prepare("INSERT INTO `color`(`color_name`) 
                                        VALUES(:color_name)");
         $result =$stm->execute(array(
             ':color_name' => $this->color_name
            
           
             //':id' => $this->id,

         ));
        if($result){
            $_SESSION['msg'] = 'Color successfully Inserted !!!';
            header('location:addcolor.php');
       
        }else{ echo "Data not Inserted";};

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
            
        }

    }



    //End color adddd



    public function index(){
       try {

           $stm =  $this->con->prepare("SELECT * FROM `color`");
           $stm->execute();
           return $stm->fetchAll(PDO::FETCH_ASSOC);

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }





// public function viewproduct($id){
//         try {

//             $stm =  $this->con->prepare("SELECT * FROM `product` WHERE id = :id");
//             $stm->bindValue(':id', $id, PDO::PARAM_STR);
//             $stm->execute();
//             if($stm){
//                 return $stm->fetch(PDO::FETCH_ASSOC);
//             }else{

//             }

//         } catch (PDOException $e) {
//             print "Error!: " . $e->getMessage() . "<br/>";
//             die();
//         }
//     }


    public function editcolor($id){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `color` WHERE id = :id");
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



    public function deletecolor($id){
         try {

            $stm =  $this->con->prepare("DELETE FROM `color` WHERE id = :id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();
            if($stm){
                $_SESSION['delete'] = 'Color successfully Deleted !!!';
                header('location:addcolor.php');
                
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