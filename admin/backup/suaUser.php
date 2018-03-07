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
$row_user = chiTietUser($id);

?>

<?php
$con = mysqli_connect('localhost', "root","","boostrap");
 	mysqli_set_charset($con, 'UTF8');
 if(isset($_POST["btnSua"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$Name = $_POST["Name"];
	$address = $_POST["address"];
	$phoneNum = $_POST["phoneNum"];
	$Email = $_POST["Email"];
	echo $qr ="
		UPDATE  users SET
		username = '$username',
		password = '$password',
		Name = '$Name',
		address = '$address',
		phoneNum = '$phoneNum',
		Email = '$Email'
		WHERE id = '$id' 
	";
	mysqli_query($con,$qr);
	header("location:listUser.php");
 }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="layout.css"/>
</head>

</html>
<body>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td id="hangTieuDe">TRANG QUẢN TRỊ
    <div style="width: 200px ; float: right;"  >
      <div>Chào bạn <?php echo $_SESSION["username"] ?></div>
    </div>
    </td>
  </tr>
  <tr>
    <td id="hang2"> <?php require "menu.php" ?></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="">
        <table width="500" border="1">
          <tbody>
            <tr>
              <td colspan="2">Sửa User</td>
            </tr>
            <tr>
              <td>username</td>
              <td><input value="<?php echo $row_user["username"] ?>" type="text" name="username" id="username" /></td>
            </tr>
            <tr>
              <td>password</td>
              <td><input value="<?php echo $row_user["password"] ?>" type="text" name="password" id="password" /></td>
            </tr>
            <tr>
              <td>Name</td>
              <td><input value="<?php echo $row_user["Name"] ?>" type="text" name="Name" id="Name" /></td>
            </tr>
            <tr>
              <td>address</td>
              <td><input value="<?php echo $row_user["address"] ?>" type="text" name="address" id="address" /></td>
            </tr>
            <tr>
              <td>phoneNum</td>
              <td><input value="<?php echo $row_user["phoneNum"] ?>" type="text" name="phoneNum" id="phoneNum" /></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><input value="<?php echo $row_user["phoneNum"] ?>" type="text" name="Email" id="Email" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="button" name="btnSua" id="btnSua" value="Sửa" /></td>
            </tr>
          </tbody>
        </table>
      </form>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>