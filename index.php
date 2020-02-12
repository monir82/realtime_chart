<?php
$connection=mysqli_connect("localhost","id12482989_ecgvalue","12345","id12482989_ecg"); //servername,username,password,database_name
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT password FROM admin WHERE username='$username'"; 
	$result=mysqli_query($connection,$sql);
	$pass=mysqli_fetch_array($result,MYSQLI_NUM);
	if($password===$pass[0]){
	    header('Location:main.php');
	    
	}
	else {
	    echo "<script type='text/javascript'>alert('Incorrect Password,Try again');</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="icon.png">
  <title>LOG IN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		td,th{
			text-align:center;
		}
		img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
		    display:none;
		    
		}
		body{
			background-image: url('a.jpg');
			background-size: cover;
			background-attachment: fixed;
			background-repeat: no-repeat;
			color:white;
			/*background-size: 100% 100%;*/
		}
		#all{
			/*background-color:blue;*/
			position: absolute;
			transform: translate(-50%,-50%);
			text-align:center;
			top: 46%;
			left: 50%;
			width: 60%;
			height: 400px;
			color: white;
		}
		input{
			border-radius: 6px;
			background-color: white;
			width: 50%;
			height: 40px;
		}
		label{
			font-weight: bold;
			font-size: 15px;
		}
	</style>
</head>
<body>
	<div class="container" id="all">
		<br>
		<br>
		<br>
		<br>
		<h1>WELCOME BACK,Admin</h1>
		<form method="POST" action="index.php" autocomplete="off">
			<label>USERNAME</label><br>
			<input type="text" name="username" required><br><br>
			<label>PASSWORD</label><br>
			<input type="password" name="password" required><br><br>
			<input type="submit" name="submit" style="width: 10%;">
		</form>
	</div>
</body>
