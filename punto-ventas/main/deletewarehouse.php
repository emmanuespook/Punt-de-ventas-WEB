<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM warehouse WHERE warehouse_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>