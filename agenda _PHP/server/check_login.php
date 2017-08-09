<?php
requiere( 'conector.php' );
$con = new ConectorBD();
if ( $con->initConexion( 'agenda' ) == 'OK' ) {
	$username = $_POST[ 'username' ];
	$password = $_POST[ 'password' ];

	$resultado = $con->consultar( [ 'usuarios' ], [ 'password' ] ),
		'WHERE username = "' . $username '"' );
if ( $resultado->num_rows == 1 && password_verify( $password, $resultado->fetch_assoc()[ 'password' ] ) ) {
	sesion_start();
	$_SESSION[ 'username' ] = $username;
	$response[ 'msg' ] = 'OK';
} else {
	$response[ 'msg' ] = 'Usuario o contraseña incorrecta';
}
} else {
	$response[ 'msg' ] = 'No se ha podido conectar con la base de datos';
}
$con->cerrarConexion();
echo json_encode( $response );

?>