<?php
	require 'session.php';
	require 'core.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Agro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="bootstrap/js/jquery.min.js"></script>
	 <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  
 

  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 0px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
	  background-color: #f2f2f2;
      padding: 25px;
    }
	
.image{
	background-image:url("img/adimg/book.jpg ");
	height=100px;
	width=1400px;
	margin -top:none;
	}
	.jumbotron {
   background-color:lightgreen; /* Orange */
    color: #ffffff;
	
}
.back{
    <!--background-image: url("images/5.jpg");-->
    background-color: #cccccc
;
}
body  {
    background-color:#FFEBEE;
   <!-- background-color: #cccccc;-->
}

.carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;

  </style>
</head>
<body>




<body>

  <div class="jumbotron text-center">
  <div class="back">

		<h1>E-Agro</h1>
		<p>Marketplace for Farmers</p>
		<marquee><p style="color:red;">Welcome to the E-Agro...!!</p></marquee>

    <!--<div class="active"><span class="glyphicon glyphicon-alert"></span><marquee> This is a simple website</marquee><br></a></div>-->
	</div>
  </div>
</body>


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
       <!--  <li class="active"><a href="home.html"><span class="glyphicon glyphicon-home"></span><b> Home</b></a></li>
						        <li><a href="index.html"><span class="glyphicon glyphicon-leaf"></span><b> About Crop</b></a></li>

		        <li><a href="index.html"><span class="glyphicon glyphicon-eye-open"></span><b> Buy Products</b></a></li>

       <li><a href="searchad.php"><span class="glyphicon glyphicon-search"></span><b> Search Ad</b></a></li>-->
       
      </ul>
	  <?php
		if(loggedin())
		{
		?>
      <ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span><b> Home</b></a></li>
				<li><a href="about_crop.php"><span class="glyphicon glyphicon-leaf"></span><b> About Crop</b></a></li>
		        <li><a href="browseadd.php"><span class="glyphicon glyphicon-eye-open"></span><b> Buy Products</b></a></li>
				<li><a href="placead.php"><span class="glyphicon glyphicon-plus-sign"></span> Upload Product </a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
		        <li><a href="contact.php"><span class="glyphicon glyphicon-phone-alt"></span><b> Contact us</b></a></li>
       
      </ul>
	  <?php
	  }
	  else
	  {
	  ?>
	  <ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span><b> Home</b></a></li>
				<li><a href="about_crop.php"><span class="glyphicon glyphicon-leaf"></span><b> About Crop</b></a></li>
		        <li><a href="browseadd.php"><span class="glyphicon glyphicon-eye-open"></span><b> Buy Products</b></a></li>
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span><b> Login</b></a></li>
				<li><a href="Register.php"><span class="glyphicon glyphicon-edit"></span><b> Register</b></a></li>
		        <li><a href="contact.php"><span class="glyphicon glyphicon-phone-alt"></span><b> Contact us</b></a></li>
	 
		<?php
		}
		
	  ?>
	  
    </div>
  </div>
</nav>
<!--<img src="img/adimg/1459419488.jpg" class="img-responsive " style="display:inline" alt="edu-olx img" style="width=100% ">
-->
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="images/jowar.jpg" alt="Jowar" width="460" height="345">
        <div class="carousel-caption">
          <!--<h3>Tomatos</h3>-->
         <!-- <p>The atmosphere in Wheat has a touch of Florence and Venice.</p>-->
        </div>
      </div>

      <div class="item">
        <img src="images/wheat_1.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <!--<h3>Tomatos</h3>-->
         <!-- <p>The atmosphere in Wheat has a touch of Florence and Venice.</p>-->
        </div>
      </div>
    
      <div class="item">
        <img src="images/farm1.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <!--<h3>Tomatos</h3>-->
         <!-- <p>The atmosphere in Wheat has a touch of Florence and Venice.</p>-->
        </div>
      </div>

      <div class="item">
        <img src="images/3.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <!--<h3>Tomatos</h3>-->
         <!-- <p>The atmosphere in Wheat has a touch of Florence and Venice.</p>-->
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
</div>
	
<footer class="container-fluid bg-4 text-center">
  <p>copyright 2017 @<a href=""></a>E-Agro</p> 
</footer>


</body>
</html>
