<?php
require ('conectorBD.php');

$con = new ConectorBD('localhost', 'root', 'admin123');
if ($con -> initConexion('agenda') == 'OK') {
	for ($i = 1; $i <= 3; $i++) {
		$datos['nombre'] = "Usuario " . $i;
		$datos['email'] = "user" . $i . "@mail.cl";
		$datos['pass'] = password_hash("1234" . $i, PASSWORD_DEFAULT);
		$datos['nacimiento'] = date('Y-m-d');
		if ($con -> insertData('usuarios', $datos))
			echo "Se insertaron los datos correctamente del usuario " . $i . "<br/>";
		else
			echo "Se ha producido un error en la inserción " . $i . "<br/>";
	}
	$con -> cerrarConexion();
} else
	echo "Se presentó un error en la conexión";
?>
