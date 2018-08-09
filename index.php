<?php 
require("config.php");
session_start();
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
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

	<div class="container-fluid">
		<div class="container central">
			<div class="row">
				<div class="col col-lg-2"></div>
				<div class="col col-lg-8">
						<div class="row">

							<div class="col col-lg-12 visible-lg visible-md">
								<img src="images/logo.png" width="30%"><br><br><br><br>
							</div>
							<div class="col col-lg-12 visible-xs visible-sm">
								<center><img src="images/logo.png" width="80%"><br><br></center>
							</div>
							<div class="col col-lg-8">
								<h1 class="titulo1">Por nuestro juramento</h1>
								<h2 class="titulo2">Nadie queda atrás.</h2><br><br>
								<p class="text-justify texto">
									<span class="subTexto">Con tu aporte lograremos que nuestros aviadores colombianos fortalezcan las alas de sus derechos.</span><br><br>

									Gracias a tu donación, brindaremos alivio y bienestar a los Pilotos y Copilotos Colombianos, quienes fueron injustamente despedidos tras ejercer su derecho a la huelga, siendo esta la más larga en la historia de la aviación mundial.<br><br>

									Nuestros pilotos de corazón se mantuvieron firmes y unidos en la defensa de mejores condiciones laborales, dignas y justas para ejercer su profesión, garantizando a su vez la Seguridad Aérea Colombiana
								</p>
							</div>
							<div class="col col-lg-4">
								<form id="formPago" method="post" action="https://gateway.payulatam.com/ppp-web-gateway/">
									 <div class="form-group">
									    <input type="text" class="form-control cajas" id="nombre" name="buyerFullName" placeholder="Nombre o razón social">
									 </div>
									 <div class="form-group">
									    <input type="text" class="form-control cajas" id="documento" name="documento" placeholder="Documento de identidad">
									 </div>
									 <div class="form-group">
									    <input type="text" class="form-control cajas" id="direccion" name="shippingAddress" placeholder="Dirección">
									 </div>
									 <div class="form-group">
									    <input type="text" class="form-control cajas" id="ciudad" name="shippingCity" placeholder="Ciudad">
									 </div>
									 <div class="form-group">
									    <input type="text" class="form-control cajas" id="pais" name="pais" placeholder="País">
									 </div>
									 <div class="form-group">
									    <input type="text" class="form-control cajas" id="email" name="buyerEmail" placeholder="Email">
									 </div>
									 <div class="form-group">
									    <input type="text" class="form-control cajas" id="valor" name="amount" placeholder="Valor donación">
									 </div>
									 <!-- ORIGINAL-->
									 <!-- merchantId : 740463-->
									 <!-- accountId : 50567-->

									 <!-- PRUEBAS-->
									 <!-- merchantId : 504715-->
									 <!-- accountId : 50567-->
									 <!-- apikey : 6benk3fl6ea8v6h8cgiiobhid9-->

									 <!-- para PAYU -->
									  <input name="merchantId" id="merchantId"    type="hidden"  value="<?php echo _MERCHANT_ID?>">
									  <input name="accountId"     type="hidden"  value="<?php echo _ACCOUNT_ID ?>" >
									  <input name="description"   type="hidden"  value="Donación"  >
									  <input name="referenceCode" id="referenceCode" type="hidden"  value="<?php echo _REFERENCE ?>" >
									  <!--<input name="amount"        type="hidden"  value="20000"   >-->
									  <input name="tax"           type="hidden"  value="0"  >
									  <input name="taxReturnBase" type="hidden"  value="0" >
									  <input name="currency" id="currency"    type="hidden"  value="COP" >
									  <input name="signature"  id="signature"   type="hidden"  value="0"  >
									  <input name="test"          type="hidden"  value="0" >
									  <!-- <input name="buyerEmail"    type="hidden"  value="test@test.com" > -->
									  <input name="responseUrl"    type="hidden"  value="<?php echo _LINK_RESP ?>" >
									  <input name="confirmationUrl"    type="hidden"  value="<?php echo _LINK_CONFIRM ?>" >
									  <center><div class="g-recaptcha" data-sitekey="6LfQ5WcUAAAAANYXMCxCBjE7q7PlnN5M220M2wtu"></div></center>
									  <button type="button" onclick="landing.sendForm();" class="btn btn-envia">HAZ TU DONACIÓN</button>
								</form>
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