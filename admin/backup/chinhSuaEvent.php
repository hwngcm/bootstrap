<?php
ob_start();
session_start();
if( !isset($_SESSION["id"]) || $_SESSION["idGroup"]==0 ){
    header("location:../index.php");
}

require "../db/dbCon.php";
require "../db/quantri.php"

?>


<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Thông tin thành viên</title>
 
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
  </head>
 
  <body>
    <div class="container">
      <div class="row">
      	<?php
		    $con = mysqli_connect('localhost', "root","","event");
 			mysqli_set_charset($con, 'UTF8');
 
		    if (isset($_POST["save"])) {
		    	$id_info = $_POST["id_info"];
		    	$name = $_POST["name"];
		    	$country = $_POST["country"];
		    	$event = $_POST["event"];
		    	$joinDate = $_POST["joinDate"];
		    	$sql = "update info set name = '$name', country = '$country', event = '$event', joinDate = '$joinDate'  where id_info = $id_info";
		    	mysqli_query($con, $sql);
		    }
 
		    $id_info = "";
		    $name = "";
		    $country = "";
		    $event = "";
		    $joinDate= "";
		    if (isset($_GET["id"])) {
		    	//thực hiện việc lấy thông tin user
		    	$id_info = $_GET["id"];
		    	$sql = "select * from info where id_info = $id_info";
		    	$query = mysqli_query($con, $sql);
		    	while ( $data = mysqli_fetch_array($query,MYSQLI_ASSOC) ) {
		    		$name = $data["name"];
		    		$country = $data["country"];
		    		$event = $data["event"];
		    		$joinDate = $data["joinDate"];
		    	}
		    }
		?>
        <h3> Thông tin thành viên</h3>
        <form method="POST" name="fr_update">
	        <table class="table">
	          <caption>Danh sách thành viên đã đăng ký</caption>
	          	<input type="hidden" name="id_info" value="<?php echo $id_info; ?>">
	          	<tr><td>Tên : </td><td><input type="text" name="name" value="<?php echo $name; ?>" /></td></tr>
	          	<tr><td>Country : </td><td><input type="text" name="country" value="<?php echo $country; ?>"/></td></tr>
	          	<tr><td>Event : </td><td><input type="text" name="event" value="<?php echo $event; ?>"/></td></tr>
	          	<tr><td>Join Date : </td><td><input type="date" name="joinDate" value="<?php echo $joinDate; ?>"/></td></tr>
	          	<!-- <tr>
	          		<td>Cấp độ : </td>
	          		<td>
	          			<select name="level">
	          				<option value="1" <?php echo ($level == 1)?"selected":""; ?>>Administrator</option>
	          				<option value="2" <?php echo ($level == 2)?"selected":""; ?>>Member</option>
	          			</select>
	          		</td>
	          	</tr> -->
	          	<tr><td colspan="2"><input type="submit" name="save" value="Lưu thông tin"></td></tr>
	        </table>
        </form>

        <a href="./index.php">Về trang quản lý</a>

      </div>
 
    </div><!-- /.container -->
 
 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  
 
</body></html>