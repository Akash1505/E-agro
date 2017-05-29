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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Buy Products</title>
    <style>	.back{
	<!--background-image: url("images/jowar.jpg");-->
	background-size: cover;
	background-color:#009688;

	<!--height: 400px;-->
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
				  <ul class="nav navbar-nav">
					
					
					<!--<li><a href="searchad.php"><span class="glyphicon glyphicon-search"></span> Search Ad</a></li>
				   -->
				  </ul>
				  <?php
				  if(loggedin())
				  {
					  ?>
				  <ul class="nav navbar-nav navbar-right">
						<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="placead.php"><span class="glyphicon glyphicon-plus-sign"></span> Upload Product </a></li>
						<li class="active"><a href="browseadd.php"><span class="glyphicon glyphicon-eye-open"></span> Buy Product</a></li>
						<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
			
									   
				  </ul>
				  <?php
				  }
				  else
				  {
					  ?>
				  <ul class="nav navbar-nav navbar-right">
						<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li class="active"><a href="browseadd.php"><span class="glyphicon glyphicon-eye-open"></span> Buy Product</a></li>
					</ul>
				  <?php
					}
		
				?>
					  
				</div>
			  </div>
			
<div class="back">

<br><br><br><br><br>
<div class="container">
<div class="container" > 
<div class="row"> 
<div class="col-sm-6 col-md-6 col-md-offset-3"> 
<div class="panel panel-primary">
<div class="panel panel-body">


	  <center><div class="col-xs-12" style="font-family:'Lobster' ,cursive;color:blue;background-color:light-blue;"><h1>View Products</h1></div></center>
    <!--  
  <form action="browsead.php" method="post"><br><br>
	<label>Select Category:</label>
	 <select class="form-control" id="category" name="category">
	 <option value="all categories">all categories</option>
	  <option value="1st Year Books">1st Year Books</option>
	  <option value="2nd Year Books">2nd Year Books</option>
	  <option value="3rd Year Books">3rd Year Books</option>
	  <option value="4th Year Books">4th Year Books</option>
	  <option value="Electronic Gadgets">Electronic Gadgets</option>
	  <option value="Laptops">Laptops</option>
	  <option value="Smart Phones">Smart Phones</option>
	  <option value="Calculators">Calculators</option>
	  <option value="Other">Other</option>
	  
	</select><hr>
	 <button type="submit" class="btn btn-primary">Browse Ad</button>
	 </form>-->
	 <?php
					//echo $_GET["bid"];
				//	$bid=$_GET["bid"];
					$filter = array();
					$options = [
						'projection' => [
							'Product_Name' => 1,
							'Price' => 1,
							'Quantity' => 1,
							'Contact' => 1,
							'Address' => 1,
							'Product_image' =>1,
						],
						'sort' => [
							'_id' => 1
						],
					];
					$query = new MongoDB\Driver\Query($filter, $options);

					$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
					$readPreference = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::RP_PRIMARY);
					$cursor = $manager->executeQuery('eagro.sell_product', $query, $readPreference);
					$cursor->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
					foreach($cursor as $doc) {
						echo '<center>
						<img src="'.$doc['Product_image'].'" alt="book_img" width=80% height=100% class="img-responsive"/>
						</center>
						
						<p><a href="show_all.php?price='.$doc['Price'].' "><center><button type="submit" class="btn btn-primary" name="submit">See All</button></center><p>';


						}
				?>	 
</div></div></div></div></div></div></div></nav>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>


