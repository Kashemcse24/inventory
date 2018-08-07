<?php
namespace App\admin\producttype;
if(!isset($_SESSION)){
    session_start();
 }
use App\Connection;
use PDO;
use PDOException;


class producttype extends Connection
{
    
    private $product_type ="";
    private $id = "";
    
    public function set($data = array()){
            if(array_key_exists('product_type', $data)){
                $this->product_type = $data['product_type'];
            }


            // if(array_key_exists('id', $data)){
            //  $this->id = $data['id'];
            // }
             return $this;
    }


    public function storeproducttype(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $product_type = filter_var($_POST['product_type'], FILTER_SANITIZE_STRING);
        
           
            //$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

            try {



        $stm =  $this->con->prepare("INSERT INTO `product_type`(`product_type`) 
                                        VALUES(:product_type)");
         $result =$stm->execute(array(
             ':product_type' => $this->product_type
            
           
             //':id' => $this->id,

         ));
        if($result){
            $_SESSION['msg'] = 'Product type successfully Inserted !!!';
            header('location:addproducttype.php');
       
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

           $stm =  $this->con->prepare("SELECT * FROM `product_type`");
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


    public function editproducttype($id){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `product_type` WHERE id = :id");
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



    public function deleteproducttype($id){
         try {

            $stm =  $this->con->prepare("DELETE FROM `product_type` WHERE id = :id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();
            if($stm){
                $_SESSION['delete'] = 'Producttype successfully Deleted !!!';
                header('location:addproducttype.php');
                
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