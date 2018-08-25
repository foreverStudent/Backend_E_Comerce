<?php 
include_once('class/ecomerce_conexion.php');
$sql= 'SELECT * FROM customer';
$cnx = new Ecomerce;
$result = $cnx->consultar($sql);
if(isset($_GET['id'])){
	$strdel = "DELETE FROM customer WHERE id_customer = ".$_GET['id']."";
	if($cnx->ejecutar($strdel)){
		header('location: customer.php');
	} else echo ('Hubo un error al borrar');
}
//concat_ws(' ','paterno','materno','nombre') AS 'alumno'
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="css/foundation.css"/>
	<link rel="stylesheet" type="text/css" href="css/normalize.css"/>
	<script src="js/foundation/foundation.js"></script>
</head>
<body>
<table border="1" width="100%">
	<thead>
		<tr>
			<th width="5%">ID</th>
			<th width="30%">CLIENTE</th>
			<th width="15%">DIRECCION</th>
			<th width="15%">NUMERO</th>
			<th width="25%">CORREO</th>
			<th width="5%">EDIT</th>
			<th width="5%">DELETE</th>
		</tr>
	</thead>	
		<tbody id="userData">
			<h1> <a href="customer_nuevo.php?accion=a"> Agregar </a></h1>
			<?php if(!empty($result)): foreach($result as $customer): ?>
				<tr>
					<td><?php echo $customer['id_customer']; ?></td>
					<td><?php echo $customer['name_customer']; ?></td>
					<td><?php echo $customer['address_customer']; ?></td>
					<td><?php echo $customer['phone_customer']; ?></td>
					<td><?php echo $customer['email_customer']; ?></td>
					<td><a href="customer_nuevo.php?accion=e&id=<?php echo $customer['id_customer']; ?>">Editar</a></td>
					<td><a onclick="return confirm('Esta seguro de borrar?')"
						href="customer.php?id=<?php echo $customer['id_customer']; ?>">Borrar</a></td>
				</tr>
			<?php endforeach; else: ?>
				<tr><td colspan="4">Mensaje(s) no encontrado(s)......</td></tr>
			<?php endif; ?>
		</tbody>
</table>
</body>
</html>