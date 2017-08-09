<?php
require( 'conector.php' );
session_start();

if ( isset( $_SESSION[ 'username' ] ) ) {
	$con = new ConectorBD();
	if ( $con->initConexion( 'agenda' ) == "OK" ) {
		if ( $con->eliminarRegistro( 'eventos', 'id =' . $_POST[ 'id' ] ) ) {
			$response[ 'msg' ] = "OK";
		} else {
			$response[ 'msg' ] = "No se pudo eliminar el registro";
		}
	} else {
		$response[ 'msg' ] = "No se ha podido establecer conexión con la base de datos";
	}
} else {
	$response[ 'msg' ] = "Debe iniciar sesión";
}
echo json_encode( $response );

?>