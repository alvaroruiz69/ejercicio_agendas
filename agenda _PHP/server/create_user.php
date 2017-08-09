<?php
require( 'conector.php' );
$con = new ConectorBD();
if ( $con->initConexion( 'agenda' ) == 'OK' ) {
	echo "Conexión exitosa";

	$data[ 0 ][ 'username' ] = '"alvaro@mail.cl"';
	$data[ 0 ][ 'password' ] = "'" . password_hash( "1234", PASSWORD_DEFAULT ) . "'";
	$data[ 0 ][ 'nombre' ] = '"alvaro ruiz"';
	$data[ 0 ][ 'fecha_nacimiento' ] = '"1981-05-11"';

	$data[ 1 ][ 'username' ] = '"fernando@mail.cl"';
	$data[ 1 ][ 'password' ] = "'" . password_hash( "12345", PASSWORD_DEFAULT ) . "'";
	$data[ 1 ][ 'nombre' ] = '"fernando rios"';
	$data[ 1 ][ 'fecha_nacimiento' ] = '"1983-04-16"';

	$data[ 2 ][ 'username' ] = '"venessa@mail.cl"';
	$data[ 2 ][ 'password' ] = "'" . password_hash( "123456", PASSWORD_DEFAULT ) . "'";
	$data[ 2 ][ 'nombre' ] = '"vanessa robledo"';
	$data[ 2 ][ 'fecha_nacimiento' ] = '"1989-01-10"';

	foreach ( $data as $key => $values ) {
		if ( $con->insertData( 'user', $values ) ) {
			echo "Se insertaron los datos correctamente";
		} else echo "Se produjo un error en la inserción";
	}

	$con->cerrarConexion();
} else {
	echo 'Se presente un error en la conexión';
}
?>