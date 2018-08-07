<?php
namespace App\admin\Distributor;
// if(!isset($_SESSION)){
//     session_start();
//  }
use App\Connection;
use PDO;
use PDOException;


class Distributor extends Connection
{
    
    private $user_name ="";
    private $name ="";
    private $stock_out;
    private $product_quantity;
    private $id = "";
    
    public function set($data = array()){
            if(array_key_exists('user_name', $data)){
                $this->user_name = $data['user_name'];
            }

            if(array_key_exists('name', $data)){
                $this->name = $data['name'];
            }

            if(array_key_exists('product_quantity', $data)){
                $this->product_quantity = $data['product_quantity'];
            }

            if(array_key_exists('stock_out', $data)){
                $this->stock_out = $data['stock_out'];
            }


            // if(array_key_exists('id', $data)){
            //  $this->id = $data['id'];
            // }
             return $this;
    }


    public function storedistributor(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            //$product_quantity = filter_var($_POST['product_quantity'], FILTER_SANITIZE_STRING);
            $stock_out = filter_var($_POST['stock_out'], FILTER_SANITIZE_STRING);
           
            //$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

            try {



        $stm =  $this->con->prepare("INSERT INTO `distribute`(`user_name`,`name`,`product_quantity`,`stock_out`) 
                                        VALUES(:user_name, :name, :product_quantity, :stock_out)");
         $result =$stm->execute(array(
             ':user_name' => $this->user_name,
             ':name' => $this->name,
             ':product_quantity' => $this->product_quantity,
             ':stock_out' => $this->stock_out
           
             //':id' => $this->id,

         ));
        if($result){
           // $_SESSION['msg'] = 'Product successfully Inserted !!!';
            header('location:adddistributor.php');
       
        }else{ echo "Data not Inserted";};

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
            
        }

    }



    //End distributor adddd



    public function index(){
       try {

           $stm =  $this->con->prepare("SELECT * FROM `distribute`");
           $stm->execute();
           return $stm->fetchAll(PDO::FETCH_ASSOC);

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }


//End distributor history show


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


    public function editdistributor($id){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `distribute` WHERE id = :id");
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



    public function deletedistributor($id){
         try {

            $stm =  $this->con->prepare("DELETE FROM `distribute` WHERE id = :id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();
            if($stm){
                $_SESSION['delete'] = 'Product successfully Deleted !!!';
                header('location:adddistributor.php');
                
            }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


     public function updateuser(){
        try {

            $stmt = $this->con->prepare("UPDATE `distribute` SET `name` = :name, `mobile` = :mobile, `email` = :email, `address` = :address, `org_name` = :org_name, `password` =:password, `cpassword` = :cpassword WHERE `id` = :id;");
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