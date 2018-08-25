<?php 
include_once('class/ecomerce_conexion.php');
$cnx = new Ecomerce;

if(isset($_POST['cmdGrabar'])){
	if($_POST['accion'] == 'e'){

		$sql = "UPDATE customer SET `name_customer` = '"
		.$_POST['txtnom']. "', `address_customer` = '"
		.$_POST['txtdir']. "', `phone_customer` = '"
		.$_POST['txtnum']. "', `email_customer` = '"
		.$_POST['txtcor']. "' 
		WHERE id_customer = ".$_POST['id']."" ;

		$result = $cnx->ejecutar($sql);
		header ('location: customer.php');

	} else if ($_POST['accion'] == 'a'){ 

		$sql = "INSERT INTO customer (`name_customer`, `phone_customer`, `email_customer`, `address_customer`, `status_customer`, `date_added`) values ('"
		.$_POST['txtnom']. "', '"
		.$_POST['txtnum']. "', '"
		.$_POST['txtcor']. "', '"
		.$_POST['txtdir']. "', '1', CURRENT_TIME());";

		$result = $cnx->ejecutar($sql);
		header ('location: customer.php');

	} else { echo 'OPCION INCORRECTA'; }
}