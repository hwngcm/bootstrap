<?php
ob_start();
session_start();
if( !isset($_SESSION["id"]) || $_SESSION["idGroup"]==0 ){
    header("location:../index.php");
}

require "../db/dbCon.php";
require "../db/quantri.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
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

  <h3> Thông tin người đăng kí</h3>
  <form method="POST">
  	<input type="hidden" name="id_info" value="<?php echo $id_info; ?>">
    <span>Name</span>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="name" value="<?php echo $name; ?>">
    </div>
    <span>Country</span>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
      <input id="password" type="text" class="form-control" name="country" value="<?php echo $country; ?>">
    </div>
    <span>Event</span>
    <div class="input-group">
      <span class="input-group-addon">Text</span>
      <input id="msg" type="text" class="form-control" name="event" value="<?php echo $event; ?>">
    </div>
    <span>Join Date</span>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      <input id="password" type="date" class="form-control" name="joinDate" value="<?php echo $joinDate; ?>">
    </div>
    <br>
		<input type="submit" name="save" value="Lưu thông tin">
  </form>
  <a href="./index.php">Về trang quản lý</a>
  <br>

</div>

</body>
</html>