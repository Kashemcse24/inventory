<?php

namespace App;
use PDO;
use PDOException;
class Connection
{
    protected $con;
    private $user = 'root';
    private $pass = '';
    public function __construct(){
        try {
            $this->con = new PDO('mysql:host=localhost;dbname=inventory', $this->user, $this->pass);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


}