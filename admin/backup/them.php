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
 		if (isset($_POST["save"])){
 			$event = $_POST["event"];
			$date = $_POST["date"];
			$place = $_POST["place"];
			$sql = "
				INSERT INTO info (id, event, date, place)
				VALUES(null,'$event','$date','$place')
			";
			mysqli_query($con, $sql);
 		}
	?>

 
		   
        <h3> Thông tin thành viên</h3>
        <form method="POST" name="fr_update">
	        <table class="table">
	          <caption>Danh sách thành viên đã đăng ký</caption>
	          	<tr><td>Event : </td><td><input type="text" name="event" /></td></tr>
	          	<tr><td>Date : </td><td><input type="date" name="date" /></td></tr>
	          	<tr><td>Place : </td><td><input type="text" name="place" /></td></tr>
	         
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