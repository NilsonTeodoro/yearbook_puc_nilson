<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

    echo "Olá";
	$con = mysql_connect( 'localhost', 'daw', 'daw2014' ) ;
	mysql_select_db( 'daw_yearbook', $con );
	
	$cod_estados = mysql_real_escape_string( $_REQUEST['idEstado'] );
	$cidades = array();
	$sql = "select idCidade, nomeCidade from cidades where idEstado = $cod_estados order by nomeCidade";
	$res = mysql_query( $sql );
    
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$cidades[] = array(
			'idCidade'	=> $row['idCidade'],
			'nomeCidade' => (utf8_encode($row['nomeCidade'])),
		);
	}

	echo( json_encode( $cidades ) );