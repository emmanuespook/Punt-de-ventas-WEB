<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM warehouse WHERE warehouse_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditwarehouse.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Editar Almacén</h4></center><hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Nombre Almacén : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['warehouse_nickname']; ?>" /><br>
<span>Direccion : </span><input type="text" style="width:265px; height:30px;" name="address" value="<?php echo $row['warehouse_address']; ?>" /><br>
<span>Persona Contacto : </span><input type="text" style="width:265px; height:30px;" name="cperson" value="<?php echo $row['contact_person']; ?>" /><br>
<span>Telefono: </span><input type="text" style="width:265px; height:30px;" name="contact" value="<?php echo $row['warehouse_contact']; ?>" /><br>
<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Guardar Cambios</button>
</div>
</div>
</form>
<?php
}
?>