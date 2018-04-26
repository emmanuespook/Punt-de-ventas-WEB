<?php
session_start();
$warehouse=$_SESSION['SESS_WARE'];
$position=$_SESSION['SESS_LAST_NAME'];
//////////
$invoice=$_GET['invoice'];
include('../connect.php');
$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$cname=$row['name'];
$invoice=$row['invoice_number'];
$date=$row['date'];
$cash=$row['due_date'];
$cashier=$row['cashier'];

$pt=$row['type'];
$am=$row['amount'];
if($pt=='cash'){
$cash=$row['due_date'];
$amount=$cash-$am;
}
}
//////
if($warehouse=="Freemex"){
?>
<html>
<head>
<?php require_once ('auth.php');?>
<title>FREEMEX-STORE</title>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      .sidebar-nav {
        padding: 50px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>



 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</script>
<body>

<?php include('navfixed.php');?>
<?php


if($position=='cashier') {
?>
    <div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
             <div class="well sidebar-nav">
                 <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Menú </a></li> 
			<li class="active"><a href="sales.php?id=cash&invoice"><i class="icon-shopping-cart icon-2x"></i> Ventas</a>  </li>             
			<!--<li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Productos</a>                                     </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i> Clientes</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Provedores</a>                                    </li>
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i>Reporte de Ventas</a>                </li>
			<li><a href="sales_inventory.php"><i class="icon-table icon-2x"></i> Inventorio de Productos</a>                </li>-->
				<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Hora: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				
				</ul> 
<?php
}
if($position=='admin') {
?>
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
             <div class="well sidebar-nav">
                 <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Menú </a></li> 
			<li class="active"><a href="sales.php?id=cash&invoice"><i class="icon-shopping-cart icon-2x"></i> Ventas</a>  </li>             
			<li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Productos</a>                                     </li>
			<!--<li><a href="customer.php"><i class="icon-group icon-2x"></i> Clientes</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Provedores</a>                                    </li>-->
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i>Reporte de Ventas</a>                </li>
			<li><a href="sales_inventory.php"><i class="icon-table icon-2x"></i> Inventorio de Productos</a>                </li>
				<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Hora: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				
				</ul>  
<?php } ?>
          </div><!--/.well -->
        </div><!--/span-->
		

    <div class="span10">
	<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><button class="btn btn-default"><i class="icon-arrow-left"></i> Regresar a Ventas</button></a>
<div class="content" id="content">
<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
	<div style="width: 100%; height: 190px;" >
	<div style="width: 100%; float: left;">
	 <div style="width:100%;">
	     <style>
	         #log{
	            width:130px;
	            border-radius:30%;
	            position:absolute;
	         }
	     </style>
        <img id="log" src="images/freemex.jpeg">
	   <center>   
    	   <p style="font:bold 35px 'Aleo'; margin-bottom:0;">COMERCIALIZADORA <br> FREEMEX</p> 
    	   Santa Cruz Acalpixca
    	   <br>
    	   Ciudad de México,CDMX
    	   <p style="font:bold 20px 'Aleo'; margin-top:0;">NOTA DE VENTA</p>
        </center>  
	 </div>
	
	
	<div>
	<?php
	$resulta = $db->prepare("SELECT * FROM customer WHERE customer_name= :a");
	$resulta->bindParam(':a', $cname);
	$resulta->execute();
	for($i=0; $rowa = $resulta->fetch(); $i++){
	$address=$rowa['address'];
	$contact=$rowa['contact'];
	}
	?>
	</div>
	</div><br>
	<div style="width: 100%; float: left; height: 70px;">
	<table cellpadding="3" cellspacing="0" style="font-family: arial; font-size: 20px;text-align:left;width : 30%;">

		<tr>
			<td>No. Or:</td>
			<td><?php echo $invoice ?></td>
		</tr>
		<tr>
			<td>Fecha :</td>
			<td><?php echo $date ?></td>
		</tr>
	</table>
	
	</div>
	<div class="clearfix"></div>
	<br>
	<br>
	<div style="width:100%; font-family: arial;  font-size:20px; margin-bottom:0;">
	    Estimado cliente esta cotización esta realizada en base a las políticas de la empresa el precio distribuidor es DETERMINADO por DEFAULT.
	</div>
	</div>
	<br>
	<div style="width: 100%; margin-top:180px;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 17px;	text-align:left;" width="100%">
		<thead>
			<tr>
				<th width="90"> Producto</th>
				<th> Caracteristica(s) </th>
				<th> Piezas </th>
				<th> Precio </th>
				<!--<th> Descuento </th>-->
				<th> Monto </th>
			</tr>
		</thead>
		<tbody>
			
				<?php
					$id=$_GET['invoice'];
					$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
					$result->bindParam(':userid', $id);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
				?>
				<tr class="record">
				<td><?php echo $row['product_code']; ?></td>
				
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['qty']; ?></td>
				<td>
				<?php
				$ppp=$row['price'];
				
				//$pp1= formatMoney($ppp, true);
				echo "$".$ppp;
				?>
				</td>
				<!--<td>
				<?php
				$ddd=$row['discount'];
				echo "$".$ddd;
				//echo formatMoney($ddd, true);
				?>
				</td>-->
				<td>
				<?php
				$dfdf=$row['amount'];
				echo "$".$dfdf;
				//echo formatMoney($dfdf, true);
				?>
				</td>
				</tr>
				<?php
					}
				?>
			
				<tr>
					<td colspan="3" style=" text-align:right;"><strong style="font-size: 12px;">Total: &nbsp;</strong></td>
					<td colspan="1"><strong style="font-size: 12px;">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $rowas = $resultas->fetch(); $i++){
					$fgfg=$rowas['sum(amount)'];
					echo "$".$fgfg;
					//echo formatMoney($fgfg, true);
					}
					?>
					</strong></td>
				</tr>
				<?php if($pt=='cash'){
				?>
				<tr>
					<td colspan="3"style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">Dinero en Efectivo:&nbsp;</strong></td>
					<td colspan="1"><strong style="font-size: 12px; color: #222222;">
					<?php
					echo "$".$cash;
					//echo formatMoney($cash, true);
					?>
					</strong></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="3" style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">
					<font style="font-size:20px;">
					<?php
					if($pt=='cash'){
					echo 'Cambio:';
					}
					if($pt=='credit'){
					echo 'Due Date:';
					}
					?>&nbsp;
					</strong></td>
					<td colspan="1"><strong style="font-size: 15px; color: #222222;">
					<?php
					function formatMoney($number, $fractional=false) {
						if ($fractional) {
							$number = sprintf('%.2f', $number);
						}
						while (true) {
							$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
							if ($replaced != $number) {
								$number = $replaced;
							} else {
								break;
							}
						}
						return $number;
					}
					if($pt=='credit'){
					echo "$".$cash;
					}
					if($pt=='cash'){
					echo "$".$amount;    
					//echo formatMoney($amount, true);
					}
					?>
					</strong></td>
				</tr>
			
		</tbody>
	</table>
	
	</div>
	<br>
	<div style="width:100%; font-family: arial;  font-size:20px">
	    El envió se hace inmediatamente siempre y cuando el área de cobranzas haya corroborado el pago. Es necesario solicitar el número de guía.
	</div>
	<br>
	<div style="width:40%; font-size:1.15em; border:solid 1px; margin-top:50px;">
	    <p style="margin:0;margin-left:5px; margin-right:5px;">El presente documento avala la garantía del producto Entregado. Es necesario guardar el documento enviado. Para la verificación de IMEI y la aprovación de la garantía.</p>
	</div>
	<br><br>
	<div style="width:100%; font-size:1.15em; margin-top:25px;">
	    <center><table style="width:80%; text-align:center;">
	        <tr>
	            <td style="width:40%">FIRMA DEL CLIENTE</td>
	            <td style="width:20%"></td>
	            <td style="width:40%">FIRMA DE FREEMEX</td>
	        </tr>
	        <tr>
	            <td><br>_________________</td>
	            <td></td>
	            <td><br>_________________</td>
	        </tr>
	        <tr>
	            <td></td>
	            <td></td>
	            <td><center>Entrego <br>Nombre y Firma</center></td>
	        </tr>
	    </table></center>
	</div>
	</div>
	</div>
	</div>
	
	
<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Imprimir</button></a>
		</div>

</div>
</div>


<?php }else if($warehouse!="Freemex"){ ?>


<html>
<head>
<?php require_once ('auth.php');?>
<title>FREEMEX-STORE</title>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      .sidebar-nav {
        padding: 50px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>



 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</script>
<body>

<?php include('navfixed.php');?>
<?php

if($position=='cashier') {
?>
    <div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
             <div class="well sidebar-nav">
                 <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Menú </a></li> 
			<li class="active"><a href="sales.php?id=cash&invoice"><i class="icon-shopping-cart icon-2x"></i> Ventas</a>  </li>             
			<!--<li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Productos</a>                                     </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i> Clientes</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Provedores</a>                                    </li>
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i>Reporte de Ventas</a>                </li>
			<li><a href="sales_inventory.php"><i class="icon-table icon-2x"></i> Inventorio de Productos</a>                </li>-->
				<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Hora: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				
				</ul> 
<?php
}
if($position=='admin') {
?>
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
             <div class="well sidebar-nav">
                 <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Menú </a></li> 
			<li class="active"><a href="sales.php?id=cash&invoice"><i class="icon-shopping-cart icon-2x"></i> Ventas</a>  </li>             
			<li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Productos</a>                                     </li>
			<!--<li><a href="customer.php"><i class="icon-group icon-2x"></i> Clientes</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Provedores</a>                                    </li>-->
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i>Reporte de Ventas</a>                </li>
			<li><a href="sales_inventory.php"><i class="icon-table icon-2x"></i> Inventorio de Productos</a>                </li>
				<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Hora: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				
				</ul>  
<?php } ?>
          </div><!--/.well -->
        </div><!--/span-->
	
        <div class="span10">
	<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><button class="btn btn-default"><i class="icon-arrow-left"></i> Regresar a Ventas</button></a>

<div class="content" id="content">
<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
	<div style="width: 50%; height: 190px;" >
	<div style="width: 375px; float: left;">
	<center><div style="font:bold 25px 'Aleo';">Recibo de Compra<br>
	<?php echo $warehouse; ?>	<br>	<br></div>
	</center>
	<div>
	<?php
	$resulta = $db->prepare("SELECT * FROM customer WHERE customer_name= :a");
	$resulta->bindParam(':a', $cname);
	$resulta->execute();
	for($i=0; $rowa = $resulta->fetch(); $i++){
	$address=$rowa['address'];
	$contact=$rowa['contact'];
	}
	?>
	</div>
	</div><br>
	<div style="width: 136px; float: left; height: 70px;">
	<table cellpadding="3" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">

		<tr>
			<td>No. Or:</td>
			<td><?php echo $invoice ?></td>
		</tr>
		<tr>
			<td>Fecha :</td>
			<td><?php echo $date ?></td>
		</tr>
	</table>
	
	</div>
	<div class="clearfix"></div>
	</div>
	<div style="width: 40%; margin-top:-70px;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;	text-align:left;" width="100%">
		<thead>
			<tr>
				<th width="90"> Producto</th>
				<th> Categoria </th>
				<th> Piezas </th>
				<th> Precio </th>
				<!--<th> Descuento </th>-->
				<th> Monto </th>
			</tr>
		</thead>
		<tbody>
			
			
				<?php
					$id=$_GET['invoice'];
					$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
					$result->bindParam(':userid', $id);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
			
				?>
				<tr class="record">
				<td><?php echo $row['product_code']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['qty']; ?></td>
				<td>
				<?php
				$ppp=$row['price'];
				echo "$".$ppp;
				//echo formatMoney($ppp, true);
				?>
				</td>
				<!--<td>
				<?php
				$ddd=$row['discount'];
				echo "$".$ddd;
				//echo formatMoney($ddd, true);
				?>
				</td>-->
				<td>
				<?php
				$dfdf=$row['amount'];
				echo "$".$dfdf;
				//echo formatMoney($dfdf, true);
				?>
				</td>
				</tr>
				<?php
					}
				?>
			
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 12px;">Total: &nbsp;</strong></td>
					<td colspan="1"><strong style="font-size: 12px;">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $rowas = $resultas->fetch(); $i++){
					$fgfg=$rowas['sum(amount)'];
					echo "$".$fgfg;
					//echo formatMoney($fgfg, true);
					}
					?>
					</strong></td>
				</tr>
				<?php if($pt=='cash'){
				?>
				<tr>
					<td colspan="4"style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">Dinero en Efectivo:&nbsp;</strong></td>
					<td colspan="1"><strong style="font-size: 12px; color: #222222;">
					<?php
					echo "$".$cash;
					//echo formatMoney($cash, true);
					?>
					</strong></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">
					<font style="font-size:20px;">
					<?php
					if($pt=='cash'){
					echo 'Cambio:';
					}
					if($pt=='credit'){
					echo 'Due Date:';
					}
					?>&nbsp;
					</strong></td>
					<td colspan="1"><strong style="font-size: 15px; color: #222222;">
					<?php
					function formatMoney($number, $fractional=false) {
						if ($fractional) {
							$number = sprintf('%.2f', $number);
						}
						while (true) {
							$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
							if ($replaced != $number) {
								$number = $replaced;
							} else {
								break;
							}
						}
						return $number;
					}
					if($pt=='credit'){
					echo "$".$cash;
					}
					if($pt=='cash'){
					echo "$".$amount;
					//echo formatMoney($amount, true);
					}
					?>
					</strong></td>
				</tr>
			
		</tbody>
	</table>
	
	</div>
	</div>
	</div>
	</div>
<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Imprimir</button></a>
		</div>

</div>
</div>

<?php } ?>
