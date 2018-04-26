<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];

// query
$sql = "UPDATE warehouse 
        SET warehouse_nickname=?, warehouse_address=?, warehouse_contact=?, contact_person=?
		WHERE warehouse_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$id));
header("location: warehouse.php");

?>