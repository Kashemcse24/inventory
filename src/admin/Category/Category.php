<?php
namespace App\admin\Category;
if(!isset($_SESSION)){
    session_start();
 }
use App\Connection;
use PDO;
use PDOException;


class Category extends Connection
{
    
    private $category_name ="";
    private $id = "";
    
    public function set($data = array()){
            if(array_key_exists('category_name', $data)){
                $this->category_name = $data['category_name'];
            }


            // if(array_key_exists('id', $data)){
            //  $this->id = $data['id'];
            // }
             return $this;
    }


    public function storecategory(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $category_name = filter_var($_POST['category_name'], FILTER_SANITIZE_STRING);
        
           
            //$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

            try {



        $stm =  $this->con->prepare("INSERT INTO `category`(`category_name`) 
                                        VALUES(:category_name)");
         $result =$stm->execute(array(
             ':category_name' => $this->category_name
            
           
             //':id' => $this->id,

         ));
        if($result){
            $_SESSION['msg'] = 'Category successfully Inserted !!!';
            header('location:addcategory.php');
       
        }else{ echo "Data not Inserted";};

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
            
        }

    }



    //End category adddd



    public function index(){
       try {

           $stm =  $this->con->prepare("SELECT * FROM `category`");
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


    public function editcategory($id){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `category` WHERE id = :id");
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



    public function deletecategory($id){
         try {

            $stm =  $this->con->prepare("DELETE FROM `category` WHERE id = :id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();
            if($stm){
                $_SESSION['delete'] = 'Category successfully Deleted !!!';
                header('location:addcategory.php');
                
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