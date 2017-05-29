<?php
	session_start();
	function set_session($userName)
	{
		$_SESSION['username']= $userName;
	}
	function isLogin($userName)
	{
		if(isset($_SESSION['username']))
			return true;
		else
			return false;
	}
	
	
?>
<?PHP
if(isset($_POST['submit'])) {

		$userName = $_POST['username'];
        $userPass = $_POST['userPassword'];
       // open connection to MongoDB server
       $filter = array();
	   $options = array(
			"sort" => array("username" => 1),
		);

$manager = new MongoDB\Driver\Manager("mongodb://localhost");
$query = new MongoDB\Driver\Query($filter, $options);

$result = $manager->executeQuery("eagro.register", $query);


if(isLogin())
	header("Location: placead.php");

foreach ($result as $document) {

	
    if($userName == $document->User_name && $userPass == $document->Password){
				set_session($UserName);
                echo '<script language="javascript">';
				echo 'alert("Logged in Successfully...!!");';
				echo 'window.location.assign("placead.php")';
				echo '</script>';

					}
	
	}
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Open+Sans);
.btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
.btn-primary.active { color: rgba(255, 255, 255, 0.75); }
.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
.btn-block { width: 100%; display:block; }

* { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

html { width: 100%; height:100%; overflow:hidden; }

body { 
	font-family: 'Open Sans', sans-serif;
	}
.login { 
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -150px 0 0 -150px;
	width:300px;
	height:300px;
}
.login h1 { color: red; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

.login h4 { color: cyan; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }



input { 
	width: 100%; 
	margin-bottom: 10px; 
	background: rgba(0,0,0,0.3);
	border: none;
	outline: none;
	padding: 10px;
	font-size: 13px;
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
	border: 1px solid rgba(0,0,0,0.3);
	border-radius: 4px;
	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
	-webkit-transition: box-shadow .5s ease;
	-moz-transition: box-shadow .5s ease;
	-o-transition: box-shadow .5s ease;
	-ms-transition: box-shadow .5s ease;
	transition: box-shadow .5s ease;
}
input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
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
   <!-- background-color:lightgreen; /* Orange */
    color: #ffffff;-->
	
}
.back{
   <!-- background-image: url("images/5.jpg");-->
    background-color: #cccccc;
}
body  {
    background-color:gray;
    background-color: #cccccc;
}

.carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;


    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.html">E-Agro</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       <!--  <li class="active"><a href="home.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						        <li><a href="index.html"><span class="glyphicon glyphicon-leaf"></span> About Crop</a></li>

		        <li><a href="index.html"><span class="glyphicon glyphicon-eye-open"></span> Buy Products</a></li>

       <li><a href="searchad.php"><span class="glyphicon glyphicon-search"></span> Search Ad</a></li>-->
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
						<li ><a href="home.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="about_crop.html"><span class="glyphicon glyphicon-leaf"></span> About Crop</a></li>
						<li><a href="browseadd.php"><span class="glyphicon glyphicon-eye-open"></span> Buy Products</a></li>
						<li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						<li><a href="Register.php"><span class="glyphicon glyphicon-edit"></span> Register</a></li>
		                <li><a href="contact.html"><span class="glyphicon glyphicon-phone-alt"></span> Contact us</a></li>
       
      </ul>
    </div>
  </div>
</nav>

<body background="images/login.jpg">
  <div class="login">
	<h1><b>Login</b></h1>
    <form method="post" action="login.php">
    	<input type="text" name="username" placeholder="User Name" required="required" />
        <input type="password" name="userPassword" placeholder="Password" required="required" />
        <button type="submit" class="btsn btn-primary btn-block btn-large"name=submit>Log In.</button>
		<br><a href="Register.php"><h4>Not yet Registerd....Click Here</h4>
    </form>
</div>
  
    <script src="js/index.js"></script>

</body>
</html>
