<?php 
session_start();

require("config.php");
extract($_REQUEST);

if(isset($accion))
{
	if($accion == 1)
	{
		$_SESSION['confirma'] = $_POST;
		$firma_cadena = _API_KEY."~".$merchantId."~".$referenceCode."~".$amount."~".$currency;
		//echo $firma_cadena;
		$salida = array("continuar" => 1,
						"firma"=>md5($firma_cadena),
						"firma2"=>$firma_cadena);

	}
}
echo json_encode($salida);
?>