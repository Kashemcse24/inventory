<?php
namespace App\admin\Word;
use App\Connection;
use PDO;
use PDOException;


class Word extends Connection
{
    
    private $area_name ="";
    private $word_name ="";
    private $id = "";
    
    public function set($data = array()){
            if(array_key_exists('area_name', $data)){
                $this->area_name = $data['area_name'];
            }

            if(array_key_exists('word_name', $data)){
                $this->word_name = $data['word_name'];
            }

    


            // if(array_key_exists('id', $data)){
            //  $this->id = $data['id'];
            // }
             return $this;
    }


    public function storeword(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $area_name = filter_var($_POST['area_name'], FILTER_SANITIZE_STRING);
            $word_name = filter_var($_POST['word_name'], FILTER_SANITIZE_STRING);
      
           
            //$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

            try {



        $stm =  $this->con->prepare("INSERT INTO `word`(`area_name`,`word_name`) 
                                        VALUES(:area_name, :word_name)");
         $result =$stm->execute(array(
             ':area_name' => $this->area_name,
             ':word_name' => $this->word_name
            
           
             //':id' => $this->id,

         ));
        if($result){
           $_SESSION['msg'] = 'Product successfully Inserted !!!';
            header('location: addword.php');
       
        }else{ echo "Data not Inserted";};

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
            
        }

    }




  public function index(){
       try {

           $stm =  $this->con->prepare("SELECT * FROM `word`");
           $stm->execute();
           return $stm->fetchAll(PDO::FETCH_ASSOC);

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }





public function editword($id){

  try{

    $stm = $this->con->prepare("SELECT * FROM word WHERE id = :id");
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



public function deleteword($id){
       try {
           $stm =  $this->con->prepare("DELETE FROM `word` WHERE id=:id");
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
           $stm->execute();

           if($stm){
                $_SESSION['delete'] = 'Data successfully Deleted !!!';
                header('location:addword.php');
            }

       } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
   }

  
  
}


?>