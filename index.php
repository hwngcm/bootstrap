<?php
session_start();
require "db/dbCon.php";
?>

<?php 
// kiem tra dang nhap
if(isset($_POST["btnLogin"])){
    $un = $_POST["uname"] ;
    $pw = $_POST["psw"] ;

    $con = mysqli_connect('localhost', "root","","event");
    mysqli_set_charset($con, 'UTF8');
    $qr = "
    SELECT * FROM users
    WHERE username = '$un'
    AND password = '$pw'
    ";
    $user = mysqli_query($con,$qr);
    if(mysqli_num_rows($user)==1){
        //dang nhap dung
        $row = mysqli_fetch_array($user,MYSQLI_ASSOC);
        $_SESSION["id"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        $_SESSION["idGroup"] = $row['idGroup'];
    }
}
 ?>


 <?php
if(isset($_POST["btnThoat"])){
    unset($_SESSION["id"]);
    unset($_SESSION["username"]);
    unset($_SESSION["Name"]);
    unset($_SESSION["idGroup"]);
} 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>boostrap</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
  }
  .container {
      padding: 80px 120px;
  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #f1f1f1;
  }
  .carousel-inner img {
      -webkit-filter: grayscale(90%);
      filter: grayscale(90%); /* make all photos black and white */ 
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .nav-tabs li a {
      color: #777;
  }
  #googleMap {
      width: 100%;
      height: 400px;
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
  }  
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 1;
  }
  /* mau xam nhat */
  .navbar li a, .navbar .navbar-brand { 
      color: #2c2c2f !important;
  }
  .navbar-nav li a:hover {
      background-color: #f2f2f2 !important;
      color: #222266 !important;
  }
  .navbar-nav li.active a {
      color: #222266 !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }

/* login  */ 
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
	<script src="js/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>

	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage"> THE G2 COMPANY </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#band">NHÂN VẬT</a></li>
        <li><a href="#tour">SỰ KIỆN</a></li>
        <li><a href="#contact">LIÊN HỆ</a></li>
        <li>
          
          <?php 
        if( !isset($_SESSION["id"]) ){
          ?>
          <button id="bt" onclick="document.getElementById('dk').style.display='block'" style="width:auto;">ĐĂNG KÍ</button>
          <?php
          }
         ?>

        </li>

        <!-- <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Merchandise</a></li>
            <li><a href="#">Extras</a></li>
            <li><a href="#">Media</a></li> 
          </ul>
        </li> -->
        <li>
        <?php 
        if( !isset($_SESSION["id"]) ){
          ?>
          <button id="bt" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">ĐĂNG NHẬP</button>
          <?php
          }else{
            require "formHello.php";
          }
         ?>
       </li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/1.jpg" alt="New York" width="1200" height="700">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>The atmosphere in New York is lorem ipsum.</p>
        </div>      
      </div>

      <div class="item">
        <img src="images/2.jpg" alt="Chicago" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago - A night we won't forget.</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="images/3.jpg" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
          <h3>LA</h3>
          <p>Even though the traffic was a mess, we had the best time playing at Venice Beach!</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <h3>CÁC DIỄN GIẢ NỔI TIẾNG</h3>
  <p><em>We love music!</em></p>
  <p>We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Autumn Patroneir</strong></p><br>
      <a href="#demo1" data-toggle="collapse">
        <img src="images/sp1.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo1" class="collapse">
        <p>Author, entrepreneur, philanthropist </p>
        <p>Loves drummin'</p>
        <p>Member since 1988</p>
      </div>
    </div>

    <div class="col-sm-4">
      <p class="text-center"><strong>Joe Gastby</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="images/sp2.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo2" class="collapse">
        <p>Author, public speaker</p>
        <p>Loves drummin'</p>
        <p>Member since 1988</p>
      </div>
    </div>

    <div class="col-sm-4">
      <p class="text-center"><strong>Vaz Defeo</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="images/sp3.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo3" class="collapse">
        <p> alternative medicine advocate</p>
        <p>Loves math</p>
        <p>Member since 2005</p>
      </div>
    </div>
  </div>
</div>

<!-- Container (TOUR Section) -->
<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center">SỰ KIỆN SẮP DIỄN RA</h3>
    <p class="text-center">Lorem ipsum we'll play you some music.<br> Remember to book your tickets!</p>

    <p>
      1) Toute personne a droit à l'éducation. L'éducation doit être gratuite, au moins en ce qui concerne l'enseignement élémentaire et fondamental. L'enseignement élémentaire est obligatoire. L'enseignement technique et professionnel doit être généralisé; l'accès aux études supérieures doit être ouvert en pleine égalité à tous en fonction de leur mérite.
    </p>
      <p>
      2) L'éducation doit viser au plein épanouissement de la personnalité humaine et au renforcement du respect des droits de l'homme et des libertés fondamentales. Elle doit favoriser la compréhension, la tolérance et l'amitié entre toutes les nations et tous les groupes raciaux ou religieux, ainsi que le développement des activités des Nations Unies pour le maintien de la paix.
      <p>
      3) Les parents ont, par priorité, le droit de choisir le genre d'éducation à donner à leurs enfants. </p>
      <p align="center" style="">
        <?php 
        if( !isset($_SESSION["id"]) ){
          ?>
         <button style="background-color:white; opacity: 0.5 ; font: 400 15px/1.8 Lato, sans-serif" onclick="myFunction()">ĐĂNG KÍ THAM GIA</button> 

        <script>
        function myFunction() {
        alert("Mời bạn đăng nhập!");
        }
        </script>
          <?php
          }else{
            require "./user/dangki.php";
          }
         ?>
      </p>

  </div>
  
</div>

<!-- Container (Contact Section) -->
<div align="center" id="contact" class="container">
  <h3 class="text-center">Liên hệ</h3>
  <p class="text-center"><em>Hãy liên hệ chúng tôi theo thông tin bên dưới!</em></p>

      <p>Fan? Drop a note.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Chicago, US</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: mail@mail.com</p>


  <!-- <div class="row">
    <div class="col-md-4">
      <p>Fan? Drop a note.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Chicago, US</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: mail@mail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div> -->
  <br>
  <h3 class="text-center">From The Blog</h3>  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Mike</a></li>
    <li><a data-toggle="tab" href="#menu1">Chandler</a></li>
    <li><a data-toggle="tab" href="#menu2">Peter</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h2>Mike Ross, Manager</h2>
      <p>Man, we've been on the road for some time now. Looking forward to lorem ipsum.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h2>Chandler Bing, Guitarist</h2>
      <p>Always a pleasure people! Hope you enjoyed it as much as I did. Could I BE.. any more pleased?</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h2>Peter Griffin, Bass player</h2>
      <p>I mean, sometimes I enjoy the show, but other times I enjoy other things.</p>
    </div>
  </div>
</div>



<!-- Login Form --> 
    <!-- Button to open the modal login form -->


<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="">
    <div class="imgcontainerLogin">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
    </div>

    <div class="containerLogin">
      <label for="uname"><b>Tên tài khoản</b></label>
      <input type="text" placeholder="Mời nhập tên đăng nhập" name="uname" id="uname" required>

      <label for="psw"><b>Mật khẩu</b></label>
      <input type="password" placeholder="Mời nhập mật khẩu" name="psw" id="psw" required>
        
      <button name="btnLogin" class="btnLog" id="btnLogin" type="submit">Đăng nhập</button>
      <input type="checkbox" checked="checked"> Nhớ mật khẩu
    </div>

    <div class="containerLogin" style="background-color:#f1f1f1">
      <button class="btnLog" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Hủy bỏ</button>
      <span class="psw">Quên <a href="#">Mật khẩu</a></span>
    </div>
  </form>
</div>


<!-- Đăng kí -->
<div id="dk" class="modal">
  
  <?php
    $con = mysqli_connect('localhost', "root","","event");
    mysqli_set_charset($con, 'UTF8');
    if (isset($_POST["btnReg"]) && $_POST["psw"] === $_POST["repsw"] ){
      $name = $_POST["uname"];
      $pw = $_POST["psw"];
      $sql = "
        INSERT INTO users (id, username, password, idGroup)
        VALUES(null,'$name','$pw',0 )
      ";
      mysqli_query($con, $sql);

    }else if(isset($_POST["btnReg"]) && $_POST["psw"] != $_POST["repsw"]){
      ?>

        <script type="text/javascript">
          alert("đăng kí không thành công. Mời đăng kí lại!");
        </script>

      <?php
    }
  ?>


  <form class="modal-content animate" method="post" action="">
    <div class="imgcontainerLogin">
      <span onclick="document.getElementById('dk').style.display='none'" class="close" title="Close Modal">&times;</span>
      <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
    </div>

    <div class="containerLogin">
      <label for="uname"><b>Tên đăng nhập</b></label>
      <input type="text" placeholder="Mời nhập tên đăng nhập" name="uname" id="uname" required>

      <label for="psw"><b>Mật khẩu</b></label>
      <input type="password" placeholder="Mời nhập mật khẩu" name="psw" id="psw" required>

      <label for="psw"><b>Nhập lại mật khẩu</b></label>
      <input type="password" placeholder="Mời nhập lại mật khẩu" name="repsw" id="psw" required>
        
      <button name="btnReg" class="btnLog" id="btnLogin" type="submit">Đăng kí</button>
     
    </div>

    <div class="containerLogin" style="background-color:#f1f1f1">
      <button class="btnLog" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Hủy bỏ</button>
      <span class="psw">Quên <a href="#">Mật khẩu</a></span>
    </div>
  </form>
</div>




<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<!-- Add Google Maps -->
  <div>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14898.357243850181!2d105.79226987302778!3d21.009093576142586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca120613f6f%3A0x11aab8152a382220!2zVHJ1bmcgSG_DoCwgQ-G6p3UgR2nhuqV5LCBIYW5vaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1511152019876" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<!-- 
<div id="googleMap">

  </div>

<script>
function myMap() {
var myCenter = new google.maps.LatLng(41.878114, -87.629798);
var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Bootstrap Theme Made By <a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">www.w3schools.com</a></p> 
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>

   


    

</body>
</html>