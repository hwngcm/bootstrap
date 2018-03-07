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




	</style>
</head>
<body>
	<div align="center" class="container">

    <div class="listWrap">
    
        <ul class="list">
        
            <li>
                <span>ID</span>
                <span>Name</span>
                <span>Country</span>
                <span>Event</span>
                <span>Join Date</span>
                <span>Actions</span>
            </li>

            <?php
        $event = DanhSachThongTin();
        while($row_event = mysqli_fetch_array($event,MYSQLI_ASSOC)){
            ob_start();
        ?>

            <li>
                <span>{id_info}</span>
                <span>{name}</span>
                <span>{country}</span>
                <span>{event}</span>
                <span>{joinDate}</span>
                <span>
                    <!-- <div class="btn-group btn-group-xs" role="group" aria-label="...">
                        <button type="button" class="btn btn-default">Edit</button>
                        <button type="button" class="btn btn-default" disabled>Delete</button>
                    </div> -->
                    <a href="editEvent.php?id={id_info}">Sửa |</a> <a href="xoaEvent.php?id={id_info}">Xóa |</a> <a href="addEvent.php">Thêm sự kiện</a>
                </span>
            </li>

            <?php
        $s = ob_get_clean();
        $s = str_replace("{id_info}", $row_event{"id_info"},$s);
        $s = str_replace("{name}", $row_event{"name"},$s);
        $s = str_replace("{country}", $row_event{"country"},$s);
        $s = str_replace("{event}", $row_event{"event"},$s);
        $s = str_replace("{joinDate}", $row_event{"joinDate"},$s);
        echo $s;
        }
        ?>

<!--             <li>
                <span>23</span>
                <span>Harry Giles</span>
                <span>4341</span>
                <span><span class="label label-warning">Manager</span></span>
                <span>
                    <div class="btn-group btn-group-xs" role="group" aria-label="...">
                        <button type="button" class="btn btn-default">Edit</button>
                        <button type="button" class="btn btn-default" disabled>Delete</button>
                    </div>
                </span>
                <span></span>
            </li>
            -->
        </ul>
        <a href="../index.php">Về trang chủ</a>
    </div>

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