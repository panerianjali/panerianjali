<?php

use conne as GlobalConne;

class conne
    {
        private $conn;

        public function __construct()
        {
            $this->conn=mysqli_connect("localhost","root","","student");
            if($this->conn){

                echo "connection successfully";
            }
            else {
                echo "connection error";
            }
        }
        public function insert($fname,$lname,$mobileno)
        {
            try {
                $query="INSERT INTO employee(fname,lname,mobileno)values('$fname','$lname','$mobileno')";
                $data=mysqli_query($this->conn,$query);
            } catch (Exception $e) {
                throw $e;
                
            }
        }

        
    }
    $obj= new conne();
    if (isset($_POST['msg'])) {

        $dataInsert =$obj->insert($_POST['fname'],$_POST['lname'],$_POST['mobileno']);
        header('location:insert1.php');
        echo 'inserted';



    }


?>
