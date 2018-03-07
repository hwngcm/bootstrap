<?php
ob_start();
session_start();
if( !isset($_SESSION["id"]) || $_SESSION["idGroup"]==0 ){
	header("location:../index.php");
}

require "../db/dbCon.php";
require "../db/quantri.php"

?>

<?php
$id = $_GET["id"];
settype($id, "int");
$row_event = suaEvent($id);

?>


<?php
require_once("../db/dbCon.php");
 if(isset($_POST["btnSua"])){
 	// $con = mysqli_connect('localhost', "root","","event");
 	// mysqli_set_charset($con, 'UTF8');
	$name = $_POST["name"];
	$country = $_POST["country"];
	$event = $_POST["event"];
	$joinDate = $_POST["joinDate"];
	$qr = "
		UPDATE  info SET
		name = '$name',
		country = '$country',
		event = '$event',
		joinDate = '$joinDate' 
		WHERE id_info = '$id' 
	";
	mysqli_query($con,$qr);
	header("location:abc.php");
 }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
<form id="form1" name="form1" method="post" action="">
        <table width="500" border="1">
          <tbody>
            <tr>
              <td colspan="2">Sửa Event</td>
              <input type="hidden" name="id_info" value="<?php echo $id; ?>">
            </tr>

            <tr>
              <td>Name</td>
              <td><input value="<?php echo $row_event["name"] ?>" type="text" name="name" id="name" /></td>
            </tr>
            <tr>
              <td>Country</td>
              <td><input value="<?php echo $row_event["country"] ?>" type="text" name="country" id="country" /></td>
            </tr>
            <tr>
              <td>Event</td>
              <td><input value="<?php echo $row_event["event"] ?>" type="text" name="event" id="event" /></td>
            </tr>
            <tr>
              <td>Join Date</td>
              <td><input value="<?php echo $row_event["joinDate"] ?>" type="date" name="joinDate" id="joinDate" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="button" name="btnSua" id="btnSua" value="Sửa" /></td>
            </tr>
          </tbody>
        </table>
      </form>


</body>
</html>