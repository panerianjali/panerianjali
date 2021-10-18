<?php
session_start();
$id = $_SESSION['emp_id'];
include 'includeClass.php';
$Obj = new ConnectionPDO();


$row = $Obj->SelectById("employee", $id);
echo '<pre>';
print_r($row);


?>


<?php

session_start();
$id = $_SESSION['emp-id'];
include 'includeClass.php';
$Obj=new ConnectionPDO();

$row = $Obj->SelectById("employee",$id);
echo '<pre>';
print_r($row);


?>

<?php
session_start();
$id = $_SESSION['emp_id'];
include 'includeClass.php';
$Obj= new ConnectionPDO();

$row =$Obj->SelectById("employee",$id);
echo '<pre>';
print_r($row);



?>


