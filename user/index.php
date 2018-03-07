<?php
ob_start();
session_start();

require "../db/dbCon.php";
require "../db/quantri.php"

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.container {
    
    width: 100%;
    height: 100%;
    background-color: #d4d3d3;
    padding: 20px;
    
}

.listWrap {
    
    height: 800px;
    width: 1000px;
    
}

.list {
    
    list-style: none;
    margin: 0;
    padding: 0;
    display: table;
    white-space: nowrap;
    width: 100%;
    
}

.list li {
    
    background-color: #f0f0f0;
    display: table-row;
    color: #5c5c5c;

}

.list li:nth-child(odd) {
    
    background-color: #f2f2f2;
    display: table-row;
    font-size: 9pt;
    color: #5c5c5c;

}

.list li:nth-child(odd):hover {
    
    background-color: #dadada;

}

.list li:nth-child(even) {
    
    background-color: #e8e8e8;
    display: table-row;
    font-size: 9pt;
    color: #5c5c5c;

}

.list li:nth-child(even):hover {
    
    background-color: #dadada;

}

.list li:nth-child(1) span:first-child {
    
    border-top-left-radius: 6px;
    
}

.list li:nth-child(1) span:last-child {
    
    border-top-right-radius: 6px;
    
}


.list li:nth-child(1) {
    
    background-color: #201c2b;
    text-transform: uppercase;
    font-size: 8pt;
    font-weight: bold;
    color: #b8b5c0;

    
}

.list li:nth-child(1):hover {
    

    
}



.list li:nth-child(1) span {
    
    border-bottom: 2px solid #7d5bbe;
    padding: 14px;
    
}

.list span {
    
    text-align: left;
    display: table-cell;
    padding: 6px;
    vertical-align: middle;
    
}


.list span:nth-child(2) {
    
    
}


/* bt bang dang ki */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}


#bt {
      font-family: Montserrat, sans-serif;
      padding: 15px 12px;
      margin-bottom: 0;
      background-color: #fff;
      border: 0;
      font-size: 12px !important;
      letter-spacing: 4px;
      opacity: 1;
  }


  #bt:hover {
    background-color: #f2f2f2 !important;
      color: #222266 !important;
  }
  #bt:active  {
      color: #222266 !important;
      background-color: #29292c !important;
  }

/* Set a style for all buttons */
.btnLog {
    background-color: #2d2d30;

    width: 100%;
    cursor: pointer;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.containerLogin {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

	</style>
</head>
<body>
	<div align="center" class="container">

    <div class="listWrap">
    
        <ul class="list">
        
            <li>
                <span>ID</span>
                <span>Event</span>
                <span>Ngày</span>
                <span>Địa điểm</span>
                <span>Actions</span>
            </li>
            
           <?php
        $event = DanhSachEvent();
        while($row_event = mysqli_fetch_array($event,MYSQLI_ASSOC)){
            ob_start();
        ?>

            <li>
                <span>{id}</span>
                <span>{event}</span>
                <span>{date}</span>
                <span>{place}</span>
                <span>
                	<button id="bt" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Đăng kí</button>
                    <!-- <div class="btn-group btn-group-xs" role="group" aria-label="...">
                        <button type="button" class="btn btn-default">Đăng kí</button>
                    </div> -->
                </span>

    

            </li>

            <?php
        $s = ob_get_clean();
        $s = str_replace("{id}", $row_event{"id"},$s);
        $s = str_replace("{event}", $row_event{"event"},$s);
        $s = str_replace("{date}", $row_event{"date"},$s);
        $s = str_replace("{place}", $row_event{"place"},$s);
        echo $s;
        }
        ?>
        </ul>
        <a href="../index.php">Về trang chủ</a>
    </div>

</div>


<!-- bang dang ki -->
<div id="id01" class="modal">
  
<?php
		$con = mysqli_connect('localhost', "root","","event");
 		mysqli_set_charset($con, 'UTF8');
 		if (isset($_POST["btnReg"])){
 			$name = $_POST["name"];
			$country = $_POST["country"];
			$event = $_POST["event"];
			$joinDate = $_POST["joinDate"];
			$sql = "
				INSERT INTO info (id_info, name, country, event, joinDate)
				VALUES(null,'$name','$country','$event', '$joinDate' )
			";
			mysqli_query($con, $sql);
 		}
	?>

  <form class="modal-content animate" method="post" action="">
    <div class="imgcontainerLogin">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
    </div>

    <div class="containerLogin">
      <label for="name"><b>Tên người tham dự</b></label>
      <input type="text" placeholder="Mời nhập tên " name="name" id="name" required>

      <label for="country"><b>Country</b></label>
      <input type="text" placeholder="Mời nhập country" name="country" id="country" required>

      <label for="event"><b>Event</b></label>
      <input type="text" placeholder="Mời nhập Event" name="event" id="event" required>

      <label for="joinDate"><b>Ngày tham gia</b></label> <br/>
      <input style="width: 100%;height: 50px" type="date" placeholder="Mời chọn ngày tham dự" name="joinDate" id="joinDate" required>
        
      <button name="btnReg" class="btnLog" id="btnReg" type="submit">Đăng kí</button>
      
    </div>

    <div class="containerLogin" style="background-color:#f1f1f1">
      <button class="btnLog" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Hủy bỏ</button>
    </div>
  </form>
</div>

<script>
	$( document ).ready(function() {
    
    initEvents();
    
});

function initEvents() {
    
    $(".list").hover(function(){
        
        $(".list li:first span").stop().animate({borderWidth: "5", backgroundColor: "#3f3659", color: "#e5e3e8"},{duration: 170, complete: function() {}} ); 
        
    }, function () {
        
        $(".list li:first span").stop().animate({borderWidth: "2", backgroundColor: "#201c2b", color: "#b8b5c0"},{duration: 170, complete: function() {}} ); 

    });
    
}

function animateTable(e) { 
    
    
    
    
}
</script>

<script src="http://code.jquery.com/color/jquery.color-2.1.2.min.js" integrity="sha256-H28SdxWrZ387Ldn0qogCzFiUDDxfPiNIyJX7BECQkDE=" crossorigin="anonymous"></script>
</body>
</html>