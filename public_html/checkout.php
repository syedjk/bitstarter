<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>


<title>Checkout</title>

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
	
	$paymentMethod = $_POST['paymentMethod'];

echo '<div id="templatemo_main" class="wrapper">';

	echo '<table style="max-width:960px;" bgcolor="#E6E6E6" >
			
			
			<td style=" text-align:center; vertical-align:top; width:700px;">';
	if(isset($paymentMethod)){
		echo '<br><h3>Order Receipt</h3>';
		echo '<table bgcolor="#E6E6E6" border="1" style="margin-left:auto; margin-right:auto; max-width:575px;">';
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
				<td>'.$movieCount[$i].'</td>
				<td>$5.00</td>
			</tr>';
			
			$i++;
		}
		$totalCost = 0.00;
		foreach($movieCount as $movCount){
			$totalCost += $movCount;
		}
		$totalCost = $totalCost*5.00;
	
		echo '<tr>
				<td></td>
				<td></td>
				<td>Total Cost: $'.number_format($totalCost, 2, '.', '').'</td>
			 </tr>';
		echo '</table>';
		echo '<br><br>';
		echo 'Your total bill is: $ '.number_format($totalCost, 2, '.', '').'<br>';
		echo 'The above amount has been billed to your '.$paymentMethod.' card<br>';
		echo '<br><h3>Thank You for the order, have a nice day!</h3>';
		echo '<a href="movies.php">Back to Movie Selection</a>';
	}
	else{
		//Credit Card Form
		echo '<tr><td>';
		echo '<h2 style="text-align:center;">Choose Checkout Method</h2>';
		echo '<div id="formBorder">
		  <form name="form1" id="form1" action="" method="post" >
			<h3><strong>Method 1: Credit Card</strong></h3>
			<p><strong>Please choose the method of payment:</strong></p>
		<strong>
			Master Card:<input type="radio" name="paymentMethod" id="paymentMethod" value="Master Card" />
			Visa:<input type="radio" name="paymentMethod" id="paymentMethod" value="Visa" />
			American Express:<input type="radio" name="paymentMethod" id="paymentMethod" value="American Express" />
			Discover:<input type="radio" name="paymentMethod" id="paymentMethod" value="Discover" />
		</strong>
			
			<br><br>
			<input type="submit" value="Submit Order"></input>
			<input type="reset" value="Reset Form"></input> <br>
		  </form>
		</div>';
		
		echo '</td></tr>';
		
		//Paypal integration
		echo '<tr><td style=" text-align:center;">
			<div id="formBorder">
			
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<h3 style="float:left;"><strong>Method 2: Paypal</strong></h3><br><br>
					
					<input type="hidden" name="business" value="syedjunaidk@gmail.com">
					<input type="hidden" name="currency_code" value="CAD">
					<input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="upload" value="1">';
		$i=0;
		foreach($cartMovie as $movID){
			echo ' 	
					<input type="hidden" name="item_name_'.($i+1).'" value="'.$movieName[$i].'"> 
					<input type="hidden" name="quantity_'.($i+1).'" value="'.$movieCount[$i].'">
					<input type="hidden" name="amount_'.($i+1).'" value="5.00">';
			$i++;
		}
			
		echo'		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form> </td></tr>';
				
		//END Paypal Integration
		echo '</div>';
	}
	
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