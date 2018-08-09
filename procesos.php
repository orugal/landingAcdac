<?php 
session_start();

require("config.php");
extract($_REQUEST);

if(isset($accion))
{
	if($accion == 1)
	{

		$secretKey   =  '6LfQ5WcUAAAAAEhEL_SpbMFGNl4Kuq-9BUuQnWt1';
		$response	 =	$_POST['g-recaptcha-response'];
		$userIP		 =	$_SERVER['REMOTE_ADDR'];
		$urlVerifica =  "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
		$respuestaGoogle = json_decode(file_get_contents($urlVerifica));

		if($respuestaGoogle->success)
		{

			$_SESSION['confirma'] = $_POST;
			$firma_cadena = _API_KEY."~".$merchantId."~".$referenceCode."~".$amount."~".$currency;
			//echo $firma_cadena;
			$salida = array("continuar" => 1,
							"firma"=>md5($firma_cadena),
							"firma2"=>$firma_cadena);}
		else
		{
			$salida = array("continuar" => 0,
							"mensaje"=>"Debe confirmar que no es un robot");
		}

	}
}
echo json_encode($salida);
?>