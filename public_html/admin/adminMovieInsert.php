<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<script type="text/javascript">

	var isNonblank_re    = /\S/; 
	function isNonblank (s) { 
	   return String (s).search (isNonblank_re) != -1 
	} 

	function validateForm()
	{
		
		
		var movieName = document.getElementById("movieName").value;
		var actors = document.getElementById("actors").value;
		var category = document.getElementById("category").value;
		var description = document.getElementById("description").value;
		var youtubeLink = document.getElementById("youtubeLink").value;
		
		var stringAlert = "";
		var sendData = true;

		if(isNonblank(movieName)){
		}
		else{
			//alert("Please do not enter empty name");
			stringAlert="Please do not enter empty movie name\n";
			sendData = false;
		}
		
		
		if(isNonblank(actors)){
		}
		else{
			//alert("Please enter age in whole number format");
			stringAlert += "Please do not enter empty actor name(s)\n";
			sendData = false;
		}
		
		if(isNonblank(category)){
		}
		else{
			//alert("Please enter GPA in decimal format");
			stringAlert += "Please do not enter empty category\n";
			sendData = false;
		}
		
		
		if(isNonblank(description)){
		}
		else{
			//alert("Please enter GPA in decimal format");
			stringAlert += "Please do not enter empty description\n";
			sendData = false;
		}
		
		if(isNonblank(youtubeLink)){
		}
		else{
			//alert("Please enter GPA in decimal format");
			stringAlert += "Please do not enter empty movie youtube link\n";
			sendData = false;
		}
		
		
		if(sendData)
		{
			alert("The movie has been inserted");
			
		}
		else{
			alert(stringAlert);
			return false;
		}
		
		return true;
	}

</script>

<title>Admin Insert Movie</title>

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

</head>

<body>



<div id="templatemo_header_wrapper">

	<div id="templatemo_header" class="wrapper">

    	<div id="site_title"><a href="http://www.sjktech.com">Free CSS Templates</a></div>

        <div id="templatemo_menu" class="ddsmoothmenu">

            <ul>

                <li><a href="index.php" >Home</a></li>

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
				
				<li><a class="selected" href="/movies.php">Movies</a></li>

                <li><a href="http://www.blog.sjktech.com">Blog</a></li>

                <li><a href="contact.html">Contact</a></li>

            </ul>

            <br style="clear: left" />

        </div> <!-- end of templatemo_menu -->

    </div>

</div>


<div id="templatemo_main" class="wrapper">

	
	<div id="formBorder">
		<h2 style="margin:0 0 0 0; color:#8A0808;">Insert Movie</h2>
	  <form onSubmit="return validateForm()"  action="insertMovie.php" method="post">
		<br>
		<p><label>Movie Name:</label><br/> <input type="text" size="40" name="movieName" id="movieName"></input> </p>
		<p><label>Actors (Each Actor on seperate line):</label><br/> <textarea name="actors" id="actors"rows="10" cols="30"></textarea> </p>
		<p><label>Category:</label><br/> <input type="text" size="40" name="category" id="category"></input> </p>
		<p><label>Short Description:</label><br/> <textarea name="description" id="description" rows="10" cols="50"></textarea> </p>
		<p><label>Youtube Link:</label><br/> <input type="text" size="40" name="youtubeLink" id="youtubeLink"></input> </p>
		
		<br>
		<input type="submit" value="Submit"></input>
		<input type="reset" value="Reset Form"></input> <br>
	  </form>
	</div>
	
</div>

<div id="templatemo_footer_wrapper">

	<div id="templatemo_footer" class="wrapper">

    	Copyright &#169; 2013 <a href="#">SJK Tech</a>

    </div>

</div>

</body>

</html>