<?php
namespace App\admin\Product;
if(!isset($_SESSION)){
    session_start();
 }
use App\Connection;
use PDO;
use PDOException;


class Product extends Connection
{
    
    private $name ="";
    private $category_name ="";
    private $product_type ="";
    private $color_name ="";
    private $product_size="";
    private $product_quentity ="";
    private $id = "";
    
    public function set($data = array()){
            if(array_key_exists('name', $data)){
                $this->name = $data['name'];
            }

            if(array_key_exists('category_name', $data)){
                $this->category_name = $data['category_name'];
            }

            if(array_key_exists('product_type', $data)){
                $this->product_type = $data['product_type'];
            }


            if(array_key_exists('color_name', $data)){
                $this->color_name = $data['color_name'];
            }

                if(array_key_exists('product_size', $data)){
                $this->product_size = $data['product_size'];
            }

                if(array_key_exists('product_quentity', $data)){
                $this->product_quentity = $data['product_quentity'];
            }

            // if(array_key_exists('id', $data)){
            //  $this->id = $data['id'];
            // }
             return $this;
    }


    public function store(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $category_name = filter_var($_POST['category_name'], FILTER_SANITIZE_STRING);
            $product_type = filter_var($_POST['product_type'], FILTER_SANITIZE_STRING);
            $color_name = filter_var($_POST['color_name'], FILTER_SANITIZE_STRING);
            $product_size = filter_var($_POST['product_size'], FILTER_SANITIZE_STRING);
            $product_quentity = md5(filter_var($_POST['product_quentity'], FILTER_SANITIZE_STRING)) ;
            //$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

            try {



        $stm =  $this->con->prepare("INSERT INTO `product`(`name`,`category_name`,`product_type`,`color_name`, `product_size`, `product_quentity`) 
                                        VALUES(:name,:category_name, :product_type, :color_name, :product_size, :product_quentity)");
         $result =$stm->execute(array(
             ':name' => $this->name,
             ':category_name' => $this->category_name,
             ':product_type' => $this->product_type,
             ':color_name' => $this->color_name,
             ':product_size' => $this->product_size,
             ':product_quentity' => $this->product_quentity
             //':id' => $this->id,

         ));
        if($result){
            $_SESSION['msg'] = 'Product successfully Inserted !!!';
            header('location: manageproduct.php');
       
        }else{ echo 'data not Inserted';}

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
            
        }

    }


    public function index(){
       try {

           $stm =  $this->con->prepare("SELECT * FROM `product`");
           $stm->execute();
           return $stm->fetchAll(PDO::FETCH_ASSOC);

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }



       public function total(){
       try {

           $stm =  $this->con->prepare("SELECT SUM(product_quentity) FROM `product`");
           $stm->execute();
           return $stm->fetchAll(PDO::FETCH_ASSOC);

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }


public function viewproduct($id){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `product` WHERE id = :id");
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


    public function editproduct($id){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `product` WHERE id = :id");
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



    public function deleteproduct($id){
         try {

            $stm =  $this->con->prepare("DELETE FROM `product` WHERE id = :id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();
            if($stm){
                $_SESSION['delete'] = 'Product successfully Deleted !!!';
                header('location:manageproduct.php');
                
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
            //     $_SESSION['update'] = 'Product successfully Updated !!!';
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