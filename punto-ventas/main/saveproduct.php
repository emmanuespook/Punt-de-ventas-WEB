<?php
session_start();
include('../connect.php');
$a = $_POST['code'];
$b = nl2br($_POST['name']);
//$c = $_POST['exdate'];
$d = $_POST['price'];
$e = $_POST['supplier'];
$f = $_POST['qty'];
$g = $_POST['o_price'];
$h = $_POST['profit'];
$i = $_POST['gen'];
$j = $_POST['date_arrival'];
$k = $_POST['qty_sold'];
$l = $_POST['warehouse'];


// query
$sql = "INSERT INTO products (product_code,product_name,price,supplier,qty,o_price,profit,gen_name,date_arrival,qty_sold,warehouse) VALUES (:a,:b,:d,:e,:f,:g,:h,:i,:j,:k,:l)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l));
header("location: products.php");


?>