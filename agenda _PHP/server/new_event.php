<?php
require( 'conector.php' );
session_start();

if ( isset( $_SESSION[ 'username' ] ) ) {
	$con = new ConectorBD();
	if ( $con->initConexion( 'agenda' ) == "OK" ) {
		$data[ 'titulo' ] = '"' . $_POST[ 'titulo' ] . '"';
		$data[ 'start_date' ] = '"' . $_POST[ 'start_date' ] . '"';
		$data[ 'end_date' ] = '"' . $_POST[ 'end_date' ] . '"';
		$data[ 'start_hour' ] = '"' . $_POST[ 'start_hour' ] . '"';
		$data[ 'end_hour' ] = '"' . $_POST[ 'end_hour' ] . '"';
		$data[ 'fk_usuario' ] = '"' . $_SESSION[ 'username' ] . '"';
		if ( $_POST[ 'allDay' ] == "true" ) {
			$data[ 'allDay' ] = 1;
		} else {
			$data[ 'allDay' ] = 0;
		}

		if ( $con->insertData( 'eventos', $data ) ) {
			$response[ 'msg' ] = "OK";
		} else {
			$response[ 'msg' ] = "No se pudo añadir el registro";
		}
	} else {
		$response[ 'msg' ] = "No se ha podido establecer conexión con el servidor";
	}
} else {
	$response[ 'msg' ] = "Debe iniciar sesión";
}
echo json_encode( $response );

?>