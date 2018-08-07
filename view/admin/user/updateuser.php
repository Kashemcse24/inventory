 <?php
 session_start();
  include_once '../../../vendor/autoload.php';
  $user = new App\admin\User\User();
  $user->updateuser($_GET['id']);
  

  
 ?>