<?php
require( 'conector.php' );
session_start();
if ( isset( $_SESSION[ 'username' ] ) ) {
	$con = new ConectorBD();
	if ( $con->initConexion( 'agenda' ) == 'OK' ) {
		$data[ 'start_date' ] = '"' . $_POST[ 'start_date' ] . '"';
		$data[ 'end_date' ] = '"' . $_POST[ 'end_date' ] . '"';
		$data[ 'start_hour' ] = '"' . $_POST[ 'start_hour' ] . '"';
		$data[ 'end_hour' ] = '"' . $_POST[ 'end_hour' ] . '"';
		if ( $con->actualizarRegistro( 'eventos', $data, 'id=' . $_POST[ 'id' ] ) ) {
			$response[ 'msg' ] = 'OK';
		} else {
			$response[ 'msg' ] = "No se puedo actualizar el registro";
		}
	} else {
		$response[ 'msg' ] = "No se ha podido establecer la conexión con el servidor";
	}
} else {
	$response[ 'msg' ] = "Debe iniciar sesión";
}
echo json_encode( $response );
?>