<?php 
include_once('class/ecomerce_conexion.php');
if(isset($_GET["id"])){
$sql= "SELECT * FROM customer WHERE id_customer = '".$_GET["id"]."'";
$cnx = new Ecomerce;
$result = $cnx->consultar($sql);
}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/foundation.css"/>
	<link rel="stylesheet" type="text/css" href="css/normalize.css"/>
</head>
<body>
	<div class="row">
<form name="f1" method="post" action="customer_grabar.php">
<?php if(isset($_GET["id"])) { ?>
Nombre: <input type="text" name="txtnom" value="<?php echo $result[0]['name_customer']; ?>"><br/>
Direccion: <input type="text" name="txtdir" value="<?php echo $result[0]['address_customer']; ?>"><br/>
Numero: <input type="text" name="txtnum" value="<?php echo $result[0]['phone_customer']; ?>"><br/>
E-mail: <input type="email" name="txtcor" value="<?php echo $result[0]['email_customer']; ?>"><br/>
	<input type='hidden' name='accion' value='<?php echo $_GET["accion"] ?>'>
	<input type='hidden' name='id' value='<?php echo $_GET["id"] ?>'>
<?php } else { ?>
Nombre: <input type="text" name="txtnom"><br/>
Direccion: <input type="text" name="txtdir"><br/>
Numero: <input type="text" name="txtnum"><br/>
E-mail: <input type="email" name="txtcor"><br/>
<input type='hidden' name='accion' value='<?php echo $_GET["accion"] ?>'>
<?php } ?>
<input class="button" type="submit" name="cmdGrabar" value="Grabar">
</form>
</div>
</body>
</html>