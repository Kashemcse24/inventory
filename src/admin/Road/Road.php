<?php
namespace App\admin\Road;
use App\Connection;
use PDO;
use PDOException;


class Road extends Connection
{


  public $area_name = "";
  public $word_name = "";
  public $road_name = "";
  
  //private $data;


  public function set($data = array()){
      if(array_key_exists('area_name', $data)){
          $this->area_name = $data['area_name'];
      }

      if(array_key_exists('word_name', $data)){
        $this->word_name = $data['word_name'];
      }

       if(array_key_exists('road_name', $data)){
        $this->road_name = $data['road_name'];
      }
       return $this;
  }



  public function storeroad(){
    try{

    $stm = $this->con->prepare("INSERT INTO `road` (`area_name`, `word_name`, `road_name`) VALUES(:area_name, :word_name, :road_name)");
           $stm->bindParam(':area_name', $this->area_name, PDO::PARAM_STR);
            $stm->bindParam(':word_name', $this->word_name, PDO::PARAM_STR);
            $stm->bindParam(':road_name', $this->road_name, PDO::PARAM_STR);
            $stm->execute();
            //foreach ($this->$customerName as $customerName){
               //$stm->execute();
            //}

    if($stm){
      $_SESSION['msg'] = 'Road successfully inserted !!!';
      header('location: addroad.php');
    }else{
        echo "not inserted";
    }


  }catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }

  }



  public function index(){
       try {

           $stm =  $this->con->prepare("SELECT * FROM `road`");
           $stm->execute();
           return $stm->fetchAll(PDO::FETCH_ASSOC);

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }





public function editroad($id){

  try{

    $stm = $this->con->prepare("SELECT * FROM road WHERE id = :id");
    $stm->bindValue(':id', $id, PDO::PARAM_STR);
    $stm->execute();
    if($stm){
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

  }catch(PDOException $e){
    print "Error!:" .$e->getMessage() . "<br/>";
    die();
  }

}



public function deleteroad($id){
       try {
           $stm =  $this->con->prepare("DELETE FROM `road` WHERE id=:id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();

           if($stm){
                $_SESSION['delete'] = 'Road successfully Deleted !!!';
                header('location:addroad.php');
            }

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }

}


?>