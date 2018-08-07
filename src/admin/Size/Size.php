<?php
namespace App\admin\Size;
if(!isset($_SESSION)){
    session_start();
 }
use App\Connection;
use PDO;
use PDOException;


class Size extends Connection
{
    
    private $size_code ="";
    private $size0="" ;
    private $size1="";
    private $size2="" ;
    private $size3="" ;
    private $size4="" ;
    private $size5="" ;
    private $size6="" ;
    private $size7="" ;
    private $size8="" ;
    private $size9="" ;
    private $size10="" ;
    private $id = "";
    
    public function set($data = array()){
            if(array_key_exists('size_code', $data)){
                $this->size_code = $data['size_code'];
            }
            if(array_key_exists('size0', $data)){
                $this->size0 = $data['size0'];
            }
             if(array_key_exists('size1', $data)){
                $this->size1 = $data['size1'];
            }
             if(array_key_exists('size2', $data)){
                $this->size2 = $data['size2'];
            }
             if(array_key_exists('size3', $data)){
                $this->size3 = $data['size3'];
            }
             if(array_key_exists('size4', $data)){
                $this->size4 = $data['size4'];
            }
             if(array_key_exists('size5', $data)){
                $this->size5 = $data['size5'];
            }
             if(array_key_exists('size6', $data)){
                $this->size6 = $data['size6'];
            }
             if(array_key_exists('size7', $data)){
                $this->size7 = $data['size7'];
            }
             if(array_key_exists('size8', $data)){
                $this->size8 = $data['size8'];
            }
             if(array_key_exists('size9', $data)){
                $this->size9 = $data['size9'];
            }
             if(array_key_exists('size10', $data)){
                $this->size10 = $data['size10'];
            }


       
             return $this;
    }


    public function storesize(){

        //if($_SERVER['REQUEST_METHOD'] == 'POST'){
           // $size_code = filter_var($_POST['size_code'], FILTER_SANITIZE_STRING);

           // $size = filter_var($_POST['size'], FILTER_SANITIZE_STRING);
            
            //$size = $_POST['size'] = implode(', ',$_POST['size']);
           

            try {



        $stm =  $this->con->prepare("INSERT INTO `size`(`size_code`, `size0`, `size1`, `size2`, `size3`, `size4`, `size5`, `size6`, `size7`, `size8`, `size9`, `size10`) 
                                   VALUES(:size_code, :size0, :size1, :size2, :size3, :size4, :size5, :size6, :size7, :size8, :size9, :size10)");
         $result =$stm->execute(array(
             ':size_code' => $this->size_code,
             ':size0' => $this->size0,
             ':size1' => $this->size1,
             ':size2' => $this->size2,
             ':size3' => $this->size3,
             ':size4' => $this->size4,
             ':size5' => $this->size5,
             ':size6' => $this->size6,
             ':size7' => $this->size7,
             ':size8' => $this->size8,
             ':size9' => $this->size9,
             ':size10' => $this->size10
             //':id' => $this->id

         ));
        if($result){
            $_SESSION['msg'] = 'Size successfully Inserted !!!';
            header('location:addsize.php');
       
        }else{ echo "Data not Inserted";};

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
            
        }

    //}



    //End color adddd



    public function index(){
       try {

           $stm =  $this->con->prepare("SELECT * FROM `size`");
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


    public function editsize($id){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `size` WHERE id = :id");
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



    public function deletesize($id){
         try {

            $stm =  $this->con->prepare("DELETE FROM `size` WHERE id = :id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();
            if($stm){
                $_SESSION['delete'] = 'Size successfully Deleted !!!';
                header('location:addsize.php');
                
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