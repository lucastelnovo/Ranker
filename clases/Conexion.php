<?php

class Conexion {
	
	private $ip;
	private $user;
	private $passwd;
	private $base;
	private $conexion;
	
	public function __construct($unaIp, $unUser, $unaPasswd, $unaBase) {
		$this->ip = $unaIp;
		$this->user = $unUser;
		$this->passwd = $unaPasswd;
		$this->base = $unaBase;
	}
	
	public function conectar() {
		
		$this->conexion = mysql_connect ( $this->ip, $this->user, $this->passwd ) or die ( "Problemas en la conexion" );
		
		mysql_select_db ( $this->base, $this->conexion ) or die ( "Problemas en la selección de la base de datos" );
	
	}
	
	public function consultar($unaConsulta) {
		
		$registros = mysql_query ( $unaConsulta, $this->conexion ) or die ( "Problemas en el select: " . mysql_error () );
		return $registros;
	
	}
	
	public function desconectar() {
		
		mysql_close ( $this->conexion );
	
	}

}

?>