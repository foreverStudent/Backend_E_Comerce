<?php
class Ecomerce {
	private $cnx="";
	private $t="";//tipo
	private $h="";//host
	private $u="";//user
	private $p="";//password
	private $b="";//db
	private $r="";//puerto
	
	
	function __construct(){
		include_once('config.php');
		$this->h=$config['svr'];
		$this->u=$config['usr'];
		$this->p=$config['pas'];
		$this->b=$config['bas'];
		$this->t=$config['tip'];
		$this->r=$config['pue'];
		$this->cnx = '';
	}


	function conectar(){
		$this->cnx = mysqli_connect($this->h,$this->u,$this->p,$this->b) or die('GG!!!');
	}


	function consultar($sql=''){
		$this->conectar();
		$tempo = mysqli_query($this->cnx, $sql);
			while($fila = mysqli_fetch_assoc($tempo)){
				$data[]=$fila;				
			}
			mysqli_free_result($tempo);
			mysqli_close($this->cnx);
			return $data;
	}


	function ejecutar($sql=""){
		$this->conectar();
				$x=mysqli_query($this->cnx, $sql);
				mysqli_close($this->cnx);
				return $x;
	}


	function desconectar(){
		mysqli_close($this->cnx);
	}
}
?>