<?php
ob_start();
session_start();
if( !isset($_SESSION["id"]) || $_SESSION["idGroup"]==0 ){
	header("location:../index.php");
}

require "../db/dbCon.php";
require "../db/quantri.php"

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
    <td><table width="600" border="1">
      <tbody>
        <tr>
          <td colspan="9">Danh Sách người dùng</td>
          </tr>
        <tr>
          <td>ID</td>
          <td>Username</td>
          <td>Password</td>
          <td>Tên</td>
          <td>Địa chỉ</td>
          <td>SĐT</td>
          <td>Email</td>
          <td>IDGroup</td>
          <td><a href="themUser.php">Thêm</a></td>
        </tr>
        <?php
		$user = DanhSachUser();
		while($row_user = mysqli_fetch_array($user,MYSQLI_ASSOC)){
			ob_start();
		?>
        <tr>
          <td>{id}</td>
          <td>{username}</td>
          <td>{password}</td>
          <td>{Name}</td>
          <td>{address}</td>
          <td>{phoneNum}</td>
          <td>{Email}</td>
          <td>{idGroup}</td>
          <td><a href="suaUser.php?id={id}">Sửa</a> - <a href="xoaUser.php?id={id}">Xóa</a></td>
        </tr>
        <?php
		$s = ob_get_clean();
		$s = str_replace("{id}", $row_user{"id"},$s);
		$s = str_replace("{username}", $row_user{"username"},$s);
		$s = str_replace("{password}", $row_user{"password"},$s);
		$s = str_replace("{Name}", $row_user{"Name"},$s);
		$s = str_replace("{address}", $row_user{"address"},$s);
		$s = str_replace("{phoneNum}", $row_user{"phoneNum"},$s);
		$s = str_replace("{Email}", $row_user{"Email"},$s);
		$s = str_replace("{idGroup}", $row_user{"idGroup"},$s);
		echo $s;
		}
		?>
      </tbody>
    </table></td>
  </tr>
</table>
</body>