<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['cperson'];
$d = $_POST['contact'];

// query
$sql = "INSERT INTO warehouse (warehouse_nickname,warehouse_address,warehouse_contact,contact_person) VALUES (:a,:b,:c,:d)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d));
header("location: warehouse.php");


?>