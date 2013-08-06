<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Shopping Cart</title>

<!--Main CSS-->
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />

<!--Menu Look-->
<link rel="stylesheet" type="text/css" href="../css/ddsmoothmenu.css" />

<script type="text/javascript">

ddsmoothmenu.init({

	mainmenuid: "templatemo_menu", //menu DIV id

	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"

	classname: 'ddsmoothmenu', //class added to menu's outer DIV

	//customtheme: ["#1c5a80", "#18374a"],

	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]

})

</script>

<script type="text/javascript">
	
	var isNonblank_re    = /\S/; 
	function isNonblank (s) { 
	   return String (s).search (isNonblank_re) != -1 
	} 
	
	function goToCheckout()
	{
		window.location.href = "/checkout.php";
	}
	
	function getQuantityValue(index)
	{
		var newQuantity = document.getElementById("movieQuanitity"+index).value;
		var change = document.getElementById("cart_upate"+index);
		
		change.value = newQuantity;
	}
	
	function validateForm()
	{
		
		
		var reviewerName = document.getElementById("reviewerName").value;
		var reviewerEmail = document.getElementById("reviewerEmail").value;
		var review = document.getElementById("review").value;
		
		var stringAlert = "";
		var sendData = true;
		
		if(isNonblank(reviewerName)){
		}
		else{
			stringAlert="Please do not enter empty name\n";
			sendData = false;
		}
		
		
		if(isNonblank(reviewerEmail)){
		}
		else{
			stringAlert += "Please do not enter empty email\n";
			sendData = false;
		}
		
		if(isNonblank(review)){
		}
		else{
			stringAlert += "Please do not enter empty review\n";
			sendData = false;
		}
		
		if(sendData)
		{
			alert("The review has been submitted");
			
		}
		else{
			alert(stringAlert);
			return false;
		}
		
		return true;
	}
	
</script>



<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 

<script type="text/JavaScript" src="js/slimbox2.js"></script> 


</head>

<body>



<div id="templatemo_header_wrapper">

	<div id="templatemo_header" class="wrapper">

    	<div id="site_title"><a href="http://www.sjktech.com">Free CSS Templates</a></div>

        <div id="templatemo_menu" class="ddsmoothmenu">

            <ul>

                <li><a href="index.php">Home</a></li>

                <li><a href="about.html">Gallery</a>

                    <ul>

                        <li><a href="images.php?image=SimCity">SimCity</a></li>

                        <li><a href="images.php?image=random">random</a></li>

                        <li><a href="http://www.templatemo.com/page/3">Template Page 3</a></li>

                        <li><a href="http://www.templatemo.com/page/4">Template Page 4</a></li>

                  	</ul>

                </li>

                <li><a href="portfolio.html">Projects</a>

                    <ul>

                        <li><a href="http://macwater.mcmaster.ca:8080/">MacWater</a></li>

                        <li><a href="http://www.templatemo.com/page/2">Sub Page 2</a></li>

                        <li><a href="http://www.templatemo.com/page/3">Sub Page 3</a></li>

                        <li><a href="http://www.templatemo.com/page/4">Sub Page 4</a></li>

                        <li><a href="http://www.templatemo.com/page/5">Sub Page 5</a></li>

                        <li><a href="http://www.templatemo.com/page/6">Sub Page 6</a></li>

                  	</ul>

                </li>
				
				<li><a href="/movies.php" class="selected">Movies</a></li>

                <li><a href="http://www.blog.sjktech.com">Blog</a></li>

                <li><a href="contact.html">Contact</a></li>

            </ul>

            <br style="clear: left" />

        </div> <!-- end of templatemo_menu -->

    </div>
	
</div>



<?php
	session_start();
	require("admin/conn.php");
	//session_destroy();
	$cartMovie = $_SESSION['cartMovie'];
	$movieCount = $_SESSION['movieCount'];
	$movieName = $_SESSION['cartMovieName'];
	//echo ''.$cartMovie[4].'';
	
	//Select all movies from DB
	//Movies
	$sql = "SELECT * FROM movie ORDER BY movie_id DESC";
	$result = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		$movies[] = $row;
	}
	
	
	
	echo '<div id="templatemo_main" class="wrapper">';
	
	
	//Nested table Layout for user selection of category/actors and main movie information
	echo '<table style="max-width:960px;" bgcolor="#E6E6E6" >';
		  
	//Main Movie Content		
	
	echo 
		'<td style=" text-align:center; vertical-align:top; width:700px;">
		<h2>Shopping Cart</h2>
		<table bgcolor="#E6E6E6" border="1" style="margin-left:auto; margin-right:auto; max-width:575px;">';
		echo '<tr>
				<th>Movie Name</th>
				<th>Quantity</th>
				<th>Cost Per Movie</th>
			</tr>';
		$i=0;

		
		foreach($cartMovie as $movID){
			echo '
			<tr>
				<td>'.$movieName[$i].'</td>
				<td><input style="text-align:center" onchange="getQuantityValue('.$i.')" type="text" size="10" name="movieQuanitity'.$i.'" id="movieQuanitity'.$i.'" value="'.$movieCount[$i].'"></input></td>
				<td>$5.00</td>
				<td>	<form style="display:inline" action="addToCart.php" method="post">
							<input type="hidden" name="cart_removeIndex" value="'.$i.'" />
							<input style="text-align:center" type="submit" name="remove'.$i.'" id="remove'.$i.'" value="Remove"></input>
						</form>
				</td>
			</tr>';
			
			$i++;
		}
		echo '<form style="display:inline" action="addToCart.php" method="post">';
		echo '<tr>';
			$i = 0;
			foreach($movieCount as $movCount){
				echo '<input type="hidden" name="cart_update[]" id="cart_upate'.$i.'" value="'.$movCount.'"></input>';
				$i++;
			}
			
			echo '</tr>';
		
	
	
		
	echo '</table>';
	
	echo '<input type="submit" value="Update Cart"></input>
		</form>';
	
	$totalCost = 0.00;
	foreach($movieCount as $movCount){
		$totalCost += $movCount;
	}
	$totalCost = $totalCost*5.00;
	
	echo 'Total: $'.number_format($totalCost, 2, '.', '').'';
	
	echo '<br /><input type="button" onclick="goToCheckout()" value="Checkout" style="float:right;">';
	echo '</td></table>';
			
echo '</div>';


		
?>

<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer" class="wrapper">
    	Copyright &#169; 2013 <a href="#">SJK Tech</a>
    </div>
</div>

</body>

</html>