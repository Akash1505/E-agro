<?php
	require 'session.php';
	require 'core.php';
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Profile</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>	.back{
	background-image: url("images/background.jpg");
	background-size: cover;
	height: 700px;
}</style>
  </head>
  <body>


<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>  
				  <a class="navbar-brand" href="index.php">E-Agro</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  
					
				   
				  </ul>
				  <?php
				  if(loggedin())
				  {
					  ?>
				  <ul class="nav navbar-nav navbar-right">
						<li ><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="browseadd.php"><span class="glyphicon glyphicon-eye-open"></span> Buy Products</a></li>
					    <li class="active"><a href="contact.php"><span class="glyphicon glyphicon-phone-alt"></span> Contact us</a></li>
						<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>

				   
				  </ul>
				  <?php
				  }
				  else
				  {
					?>
				<ul class="nav navbar-nav navbar-right">
						<li ><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="browseadd.php"><span class="glyphicon glyphicon-eye-open"></span> Buy Products</a></li>
					    <li class="active"><a href="contact.php"><span class="glyphicon glyphicon-phone-alt"></span> Contact us</a></li>

				   
				  </ul>
				  <?php
				  }
				  ?>

				</div>
			  </div>
<div class="back">

<br><br>
<div class="container">
<div class="container" > 
<div class="row"> 
<div class="col-sm-6 col-md-6 col-md-offset-3"> 
<div class="panel panel-primary">
<div class="panel panel-body">




	<center><div class="col-xs-12" style="font-family:'Lobster' ,cursive;color:green;background-color:light-blue;"><h1>My Profile</h1></div>
	<div class="col-xs-12" style="font-family:'Lobster',cursive;color:black"><h3>Name: Subhash    Apsingkar</h3></div>
	
	<div class="col-xs-12" style="font-family:'Lobster',cursive;color:black"><h3>Mail ID: subhashapsingkar@gmail.com <br></h3></div>
	<div class="col-xs-12" style="font-family:'Lobster',cursive;color:black"><h3>Contact No:7744055812<br></h3></div><br>  
								
</div></div></div></div></div></div></nav>
