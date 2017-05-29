<?php
	require 'core.php';
	require 'session.php';
	
    if(isset($_POST['submit'])) {
        $pname=$_POST["title"];
        $price=intval($_POST["price"]);
		$mprice=intval($_POST["mprice"]);
		$quantity=$_POST["quantity"];
		$contact_number=$_POST["contact_number"];
		$address=$_POST["ad_details"];

        //echo $name.'<br>'.$author.'<br>'.$copies;
			$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
			$bulk = new MongoDB\Driver\BulkWrite;
			$upload_dir = "uploads/";
            //Count number of rows to assign id
            $query = new MongoDB\Driver\Query([]);
            $result=$cursor = $manager->executeQuery('eagro.sell_product', $query);
            $cursor->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
            $arr=$cursor->toArray();	
            $cn=count($arr)+1;
			$arr = array($_FILES["img"]); //Begins the array for the file uploads
            foreach ($arr as &$value) {
                
                if ($value["error"] > 0){
                    //Error uploading the file, script stops here
                }else{
                   
                if (file_exists($upload_dir . $value["name"]))
				{
                    //Error uploading the file, a file with the same name already exists, script stops here
                } 
				  else
					  {
						move_uploaded_file($value["tmp_name"], $upload_dir. $value["name"]);
						$successful = 1; //Sets the upload flag to 1, will display sucsess message below upload form      
              
						$url = "uploads/" . $value["name"]; //Places the Upload Path into the URL varliable
						$bulk->insert(['_id'=>$cn,'Product_Name' =>$pname, 'Price' =>$price,'MPrice' =>$mprice,'Quantity' =>$quantity,'Contact' => $contact_number,'Address'=>$address,'Product_image' =>$url]);
						$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
						$manager->executeBulkWrite('eagro.sell_product', $bulk);
                    
					  } 
				}

			
		if($result==True)
			{
				echo '<script language="javascript">';
				echo 'alert("Product placed Successfully...!!");';
				echo 'window.location.assign("browseadd.php")';
				echo '</script>';
			}
		else
			{
				echo '<script language="javascript">';
				echo 'alert("Failed....!!")';
				echo '</script>';
			}
}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Place ad</title>
    <style>	.back{
	background-image: url("images/background.jpg");
	background-size: cover;
	height: 700px;
}</style>
  </head>
  <body>
  <?php
  if(loggedin())
  {
	  ?>
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
				<!--	<li><a href="index.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
										<li class="active"><a href="placead.html"><span class="glyphicon glyphicon-plus-sign"></span> place ad</a></li>
										<li><a href="index.html"><span class="glyphicon glyphicon-eye-open"></span> Browse Ads</a></li>
					
			   
				  </ul>
				  -->
				  <ul class="nav navbar-nav navbar-right">
				  				  <ul class="nav navbar-nav">

				  <div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav">
						<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li class="active"><a href="placead.html"><span class="glyphicon glyphicon-plus-sign"></span> Upload Product </a></li>
						<li><a href="browseadd.php"><span class="glyphicon glyphicon-eye-open"></span> Buy Product</a></li>
						<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
						<li><a href="contact.php"><span class="glyphicon glyphicon-phone-alt"></span> Contact us</a></li>
				  </ul>
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






 
    
	  <center><div class="col-xs-12" style="font-family:'Lobster' ,cursive;color:red;background-color:light-blue;"><h1>Upload Product</h1></div></center>
  <form action="placead.php" method="post" enctype="multipart/form-data" role="form" >
	<!--<label>Select Category:</label>
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
	  
	</select>
-->	
	<div class="form-group">
	<label for="title">Product Name:</label>
      <input type="text" class="form-control" id="title" name="title" required="required" >
    </div>
	 <h5><b>Select image to upload:</h5>
 <input type="file" name="img" >
    <div class="form-group">
      <label for="price">Item Price:</label>
      <input type="text" class="form-control" id="mprice" name="price" required="required" >
    </div>
	<div class="form-group">
      <label for="price">Market Price:</label>
      <input type="text" class="form-control" id="price" name="mprice" required="required" >
    </div>
	<div class="form-group">
      <label for="quantity">Item Quantity:</label>
      <input type="text" class="form-control" id="quantity" name="quantity" required="required" >
    </div>
	
	<div class="form-group">
      <label for="contact">Contact Number:</label>
      <input type="text" class="form-control" id="sell_contact" name="contact_number" maxlength="10" required="required" >
    </div>
	<div class="form-group">
      <label for="ad_details">Address Details:</label>
      <textarea name="ad_details" rows="5" cols="40" class="form-control" id="ad_details" required="required" ></textarea>
    </div>
  
  
    <center><button type="submit" class="btn btn-primary" name="submit">Upload Product</button></center>
  </form>
</div></div></div></div></div></div></nav>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery.min.js"></script>
	 <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <?php
  }
  else
  {
	  echo '<script language="javascript">';
				echo 'alert("Login Required...!!");';
				echo 'window.location.assign("login.php")';
				echo '</script>';
  }
				?>
  </body>
</html>
