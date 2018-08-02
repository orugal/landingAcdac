<?php
//var_dump($_SESSION['confirma']);
/*
 * Funcionamiento de las categorias de la página de cupcakes store
 * @author Farez Prieto
 * @date 03 de marzo 2016
 */
//phpinfo();
ini_set("display_errors", 1);
session_start();
require("config.php");
require("conexion.php");
global $db;
extract($_GET);
extract($_SESSION['confirma']);
//var_dump($_GET);
$ApiKey = _API_KEY;
$merchant_id = $_SESSION['confirma']['merchantId'];
$referenceCode = $_SESSION['confirma']['referenceCode'];
$TX_VALUE = $_GET['TX_VALUE'];
$New_value = number_format($TX_VALUE, 1, '.', '');
$currency = $_SESSION['confirma']['currency'];
$transactionState = $_GET['transactionState'];
$firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$amount~$currency";
$firmacreada = md5($firma_cadena);
//echo $firmacreada;
$firma = $_SESSION['confirma']['signature'];
$reference_pol = $_GET['reference_pol'];
$cus = $_GET['cus'];
$extra1 = $_SESSION['confirma']['description'];
$pseBank = $_GET['pseBank'];
$lapPaymentMethod = $_GET['lapPaymentMethod'];
$transactionId = $_GET['transactionId'];
if ($_GET['transactionState'] == 4 ) {
$estadoTx = "Transacción aprobada";
}
else if ($_GET['transactionState'] == 6 ) {
$estadoTx = "Transacción rechazada";
}
else if ($_GET['transactionState'] == 104 ) {
$estadoTx = "Error";
}
else if ($_GET['transactionState'] == 7 ) {
$estadoTx = "Transacción pendiente";
}
else {
$estadoTx=$_GET['mensaje'];
}
//confirma istransaccion para no volverlo a inrgresar
$queryIdTrans = $db->GetAll(sprintf("SELECT * FROM landing where transactionId = '%s'",$transactionId));
//actualizo en la base de datos
if(count($queryIdTrans) == 0)
{
	$queryUpdate	=	sprintf("INSERT INTO landing (buyerFullName,
													  documento,
													  shippingAddress,
													  shippingCity,
													  pais,
													  buyerEmail,
													  amount,
													  estadoTx,
													  transactionId,
													  reference_pol,
													  referenceCode,
													  tx_value,
													  currency,
													  descripcion,
													  entidad,
													  fecha) VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s') ",
													  $buyerFullName,
													$documento,
													$shippingAddress,
													$shippingCity,
													$pais,
													$buyerEmail,
													$amount,
												    $estadoTx,
													$transactionId,
													$reference_pol,
													$referenceCode,
													$TX_VALUE,
													$currency,
													$extra1,
													$lapPaymentMethod,date("Y-m-d H:i:s"));
	
	//echo $queryUpdate;
	//die("dfdfdf");
	//actualizo
	$result        =  $db->Execute($queryUpdate);
}
//var_dump($_SESSION['confirma']);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Donaciones</title>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.min.css">
</head>
<body>

	<div class="container-fluid">
		<div class="container central">
			<div class="row">
				<div class="col col-lg-2"></div>
				<div class="col col-lg-8">
						<div class="row">

							<div class="col col-lg-12">
								<img src="images/logo.png" width="30%"><br><br><br><br>
							</div>
							<div class="col col-lg-8">
								<h1 class="titulo1">Gracias</h1>
								<h2 class="titulo2">por tu donación!!.</h2><br>
								<p>
									<span class="subTexto">Con tu aporte lograremos que nuestros aviadores colombianos fortalezcan las alas de sus derechos.</span><br><br>
								</p>
							</div>
							<div class="col col-lg-12">
								<?php
						if (strtoupper($firma) != strtoupper($firmacreada)) {
						?>
							<h2>Resumen Transacción</h2>
							<table class="table">
							<tr>
							<td>Estado de la transaccion</td>
							<td><?php echo $estadoTx; ?></td>
							</tr>
							<tr>
							<tr>
							<td>ID de la transaccion</td>
							<td><?php echo $transactionId; ?></td>
							</tr>
							<tr>
							<td>Referencia de la venta</td>
							<td><?php echo $reference_pol; ?></td> 
							</tr>
							<tr>
							<td>Referencia de la transaccion</td>
							<td><?php echo $referenceCode; ?></td>
							</tr>
							<tr>
							<?php
							if($pseBank != null) {
							?>
								<tr>
								<td>cus </td>
								<td><?php echo $cus; ?> </td>
								</tr>
								<tr>
								<td>Banco </td>
								<td><?php echo $pseBank; ?> </td>
								</tr>
							<?php
							}
							?>
							<tr>
							<td>Valor total</td>
							<td>$<?php echo number_format($TX_VALUE); ?></td>
							</tr>
							<tr>
							<td>Moneda</td>
							<td><?php echo $currency; ?></td>
							</tr>
							<tr>
							<td>Descripción</td>
							<td><?php echo ($extra1); ?></td>
							</tr>
							<tr>
							<td>Entidad:</td>
							<td><?php echo ($lapPaymentMethod); ?></td>
							</tr><!-- 
							<tr>
								<td colspan="2" align="center">
									<a href="<?php echo _DOMINIO ?>pedidos" class="btn btn-skin">Ver mis pedidos</a>
								</td>
							</tr> -->
							</table>
						<?php
						}
						else
						{
						?>
							<h1>Error validando firma digital.</h1>
						<?php
						}
						?>
							</div>
						</div>
				</div>
				<div class="col col-lg-2"></div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
</body>
</html>