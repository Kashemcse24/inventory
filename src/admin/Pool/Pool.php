<?php
namespace App\admin\Pool;
use App\Connection;
use PDO;
use PDOException;


class Pool extends Connection
{


  public $area_name = "";
  public $word_name = "";
  public $road_name = "";
  public $pool_name = "";
  
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

        if(array_key_exists('pool_name', $data)){
        $this->pool_name = $data['pool_name'];
      }
       return $this;
  }



  public function storepool(){
    try{

    $stm = $this->con->prepare("INSERT INTO `pool` (`area_name`, `word_name`, `road_name`, `pool_name`) VALUES(:area_name, :word_name, :road_name, :pool_name)");
           $stm->bindParam(':area_name', $this->area_name, PDO::PARAM_STR);
            $stm->bindParam(':word_name', $this->word_name, PDO::PARAM_STR);
            $stm->bindParam(':road_name', $this->road_name, PDO::PARAM_STR);
            $stm->bindParam(':pool_name', $this->pool_name, PDO::PARAM_STR);
            $stm->execute();
            //foreach ($this->$customerName as $customerName){
               //$stm->execute();
            //}

    if($stm){
      $_SESSION['msg'] = 'Data successfully inserted !!!';
      header('location: addpool.php');
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

           $stm =  $this->con->prepare("SELECT * FROM `pool`");
           $stm->execute();
           return $stm->fetchAll(PDO::FETCH_ASSOC);

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }





public function editpool($id){

  try{

    $stm = $this->con->prepare("SELECT * FROM pool WHERE id = :id");
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



public function deletepool($id){
       try {
           $stm =  $this->con->prepare("DELETE FROM `pool` WHERE id=:id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
           $stm->execute();

           if($stm){
                $_SESSION['delete'] = 'Data successfully Deleted !!!';
                header('location:addpool.php');
            }

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }

  
  
}


?>