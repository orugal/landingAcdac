<?php 
session_start();
require("config/configuracion.php");
include('config/conexion.php');
//$_SESSION['confirma'] = $_GET;
extract($_GET);
$queryUpdate = sprintf("update landing SET estTrans='%s',codigoResp='%s' WHERE referenceCode='%s'",$state_pol,$response_code_pol,$response_message_pol,$reference_pol);
$resp = $db->Execute($queryUpdate);
?>