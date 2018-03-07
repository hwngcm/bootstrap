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
		    	$event = $_POST["event"];
		    	$date = $_POST["date"];
		    	$place = $_POST["place"];
		    	$sql = "INSERT INTO events (id, event, date, place) VALUES (null, '$event', '$date', '$place')";
		    	mysqli_query($con, $sql);
		    }
		?>

  <h3> Thông tin Event</h3>
  <form method="POST">
    <span>Event</span>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="event" placeholder="Event">
    </div>
    <span>Date</span>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      <input id="password" type="date" class="form-control" name="date" placeholder="Date">
    </div>
    <span>Place</span>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
      <input id="msg" type="text" class="form-control" name="place" placeholder="Place">
    </div>
    <br>
		<input type="submit" name="save" value="Lưu thông tin">
  </form>
  <a href="../user/index.php">Về trang sự kiện</a>
  <br>

</div>

</body>
</html>