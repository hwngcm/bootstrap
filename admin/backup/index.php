<?php
ob_start();
session_start();
if( !isset($_SESSION["id"]) || $_SESSION["idGroup"]==0 ){
	header("location:../index.php");
}

require "../db/dbCon.php";
require "../db/quantri.php";

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="layout.css"/>
</head>

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
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>