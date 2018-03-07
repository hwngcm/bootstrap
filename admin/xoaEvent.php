<?php
ob_start();
session_start();
if( !isset($_SESSION["id"]) || $_SESSION["idGroup"]==0 ){
	header("location:../index.php");
}

require "../db/dbCon.php";
require "../db/quantri.php";

?>

<?php
$id = $_GET["id"];
settype($id, "int");
	$con = mysqli_connect('localhost', "root","","event");
  	mysqli_set_charset($con, 'UTF8');
	$qr = "
	DELETE FROM info
	WHERE id_info = '$id'
	";
	mysqli_query($con,$qr);
	header("location:index.php");
?>
