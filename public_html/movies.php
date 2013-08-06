<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">A dropdown example</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Explore the Monkeys</a>
                <ul class="dropdown-menu" role="menu" id="dropDownListContent">
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>	
	
	<script type="text/javascript">

	var imageList = <?php echo json_encode($imageList);?>;
	var imageCount = <?php echo json_encode($i);?>;
	
	document.getElementById("imageLoad").style.display="";
	document.getElementById("imageLoad").src=imageList[0];
	
	function loadImage(source, fileNumber)
	{
		
		var listNewAddition = '<li data-submenu-id="submenu-'+fileNumber+'">'
		+                     '<a href="#">'+fileNumber+'</a>'
		+                        '<div id="submenu-'+fileNumber+'" class="popover">'
		+                            '<h3 class="popover-title">'+fileNumber+'</h3>'
		+                            '<div class="popover-content"><img src="'+source+'"></div>'
		+                        '</div>'
		+                    '</li>';
		
		document.getElementById("dropDownListContent").innerHTML += listNewAddition;
	} 
</script>


<?php
 //echo '<table border="1" width="2010px"><tr><td colspan="2"><input id="buttonPrevious" type="button" onclick="nextImage(\'previous\')" value="Previous"><div id="imageNumber"></div><input id="buttonNext" type="button" onclick="nextImage(\'next\')" value="Next"></td></tr><tr><td style="width: 80px; text-align: center; vertical-align: text-top;">';
 $folderName = $_GET["image"];
 $imageList = array();
 $i = 1;
 
 echo '
	
 ';
				//".$folderName."
foreach(glob("images/SimCity/*.{jpg,JPG,jpeg,JPEG,gif,GIF,png,PNG}",
 GLOB_BRACE) as $images)
 {
	array_push($imageList, $images);
	//echo '<a href="#" onload="loadImage('.$images.')">Image '.$i.'</a><br/>';
	//echo '<a href="javascript:loadImage(\''.$images.'\')">Image '.$i.'</a><br/>';
	
	echo '<script type="text/javascript">'
   , 'loadImage(\''.$images.'\', '.$i.');'
   , '</script>';
	
	//echo "<img src=\"".$images."\"><br/>";
	$i = $i +1;

 }
 
 
//echo '</td><td id="imageAdjustBorder"><img id="imageLoad" style="display:none;"></td></tr></table>';

/*
print '<script type="text/javascript">';
print 'alert("sadfsdf: '.$imageList[0].'")';
print '</script>';
*/
?>

<!-- AddThis Smart Layers BEGIN -->
<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid="></script>
<script type="text/javascript">
  addthis.layers({
    'theme' : 'transparent',
    'share' : {
      'position' : 'left',
      'numPreferredServices' : 5
    }   
  });
</script>
<!-- AddThis Smart Layers END -->



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta property="fb:app_id" content="413410772089094"/>
<meta property="fb:admins" content="100002010194493"/>
<meta property="og:url" content="http://sjktech.com/movies.php?movie=13" />
<meta property="og:title" content="TITLE" />
<meta property="og:description" content="DESC" />
<meta property="og:image" content="http://ia.media-imdb.com/images/M/MV5BMTM3MTczOTM1OF5BMl5BanBnXkFtZTYwMjc1NDA5._V1_SY317_CR4,0,214,317_.jpg"/>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>

<title>Movies</title>

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

	function showHide(showType)
	{
		if(showType == "category"){
			var catList = document.getElementById("hiddenCategory");
			//var categoryName = document.getElementById("categoryExpand");
			
			
			if(catList.style.display=="none")
				catList.style.display="";
				//categoryName.innerHTML = "- Category";
			else
				catList.style.display="none";
				//categoryName.innerHTML ="+ Category";
		}else{
			var actorList = document.getElementById("hiddenActor");
			var actorName = document.getElementById("actorsExpand");
			if(actorList.style.display=="none")
				actorList.style.display="";
			else
				actorList.style.display="none";
		}
	}
	
	function goToCart()
	{
		window.location.href = "/cart.php";
	}
	
	function goToLogin()
	{
		window.location.href = "admin/login.php";
	}
	
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

<!-- Testing New Menu System -->
<link href="css/bootstrap.css" rel="stylesheet">
<style>
  body {
	padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
  }
</style>
<link href="css/bootstrap-responsive.css" rel="stylesheet">


<style>
        .navbar .popover {
            width: 400px;
            -webkit-border-top-left-radius: 0px;
            -webkit-border-bottom-left-radius: 0px;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
            overflow: hidden;
        }

        .navbar .popover-content {
            text-align: center;
        }

        .navbar .popover-content img {
            height: 212px;
            max-width: 250px;
        }

        .navbar .dropdown-menu {
            -webkit-border-top-right-radius: 0px;
            -webkit-border-bottom-right-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;

            -webkit-box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
        }

        .navbar .dropdown-menu > li > a:hover {
            background-image: none;
            color: white;
            background-color: rgb(0, 129, 194);
            background-color: rgba(0, 129, 194, 0.5);
        }

        .navbar .dropdown-menu > li > a.maintainHover {
            color: white;
            background-color: #0081C2;
        }
</style>

<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
<![endif]-->

<!-- End of Testing New Menu System -->


</head>

<body>

	<!-- Testing New Menu System -->
	
	
	<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="../jquery.menu-aim.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script>

        var $menu = $(".dropdown-menu");

        // jQuery-menu-aim: <meaningful part of the example>
        // Hook up events to be fired on menu row activation.
        $menu.menuAim({
            activate: activateSubmenu,
            deactivate: deactivateSubmenu
        });
        // jQuery-menu-aim: </meaningful part of the example>

        // jQuery-menu-aim: the following JS is used to show and hide the submenu
        // contents. Again, this can be done in any number of ways. jQuery-menu-aim
        // doesn't care how you do this, it just fires the activate and deactivate
        // events at the right times so you know when to show and hide your submenus.
        function activateSubmenu(row) {
            var $row = $(row),
                submenuId = $row.data("submenuId"),
                $submenu = $("#" + submenuId),
                height = $menu.outerHeight(),
                width = $menu.outerWidth();

            // Show the submenu
            $submenu.css({
                display: "block",
                top: -1,
                left: width - 3,  // main should overlay submenu
                height: height - 4  // padding for main dropdown's arrow
            });

            // Keep the currently activated row's highlighted look
            $row.find("a").addClass("maintainHover");
        }

        function deactivateSubmenu(row) {
            var $row = $(row),
                submenuId = $row.data("submenuId"),
                $submenu = $("#" + submenuId);

            // Hide the submenu and remove the row's highlighted look
            $submenu.css("display", "none");
            $row.find("a").removeClass("maintainHover");
        }

        // Bootstrap's dropdown menus immediately close on document click.
        // Don't let this event close the menu if a submenu is being clicked.
        // This event propagation control doesn't belong in the menu-aim plugin
        // itself because the plugin is agnostic to bootstrap.
        $(".dropdown-menu li").click(function(e) {
            e.stopPropagation();
        });

        $(document).click(function() {
            // Simply hide the submenu on any click. Again, this is just a hacked
            // together menu/submenu structure to show the use of jQuery-menu-aim.
            $(".popover").css("display", "none");
            $("a.maintainHover").removeClass("maintainHover");
        });

    </script>
	<!-- End of Testing New Menu System -->

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

                        <li><a href="">Template Page 3</a></li>

                  	</ul>

                </li>

                <li><a href="portfolio.html">Projects</a>

                    <ul>

                        <li><a href="http://macwater.mcmaster.ca:8080/">MacWater</a></li>

                        <li><a href="">Sub Page 2</a></li>

                        <li><a href="">Sub Page 3</a></li>

                  	</ul>

                </li>
				
				<li><a href="/movies.php" class="selected">Movies</a></li>

                <li><a href="http://www.blog.sjktech.com">Blog</a></li>

                <li><a href="contact.html">Contact</a></li>

            </ul>

            <br style="clear: left" />

        </div> 
		<!-- end of templatemo_menu -->

    </div>
	
</div>



<?php
	session_start();
	require("admin/conn.php");
	
	$cartMovie = $_SESSION['cartMovie'];
	//echo ''.$cartMovie[4].'';
	
	$categorySelected = $_GET["category"];
	$actorSelected = $_GET["actor"];
	$movieSelected = $_GET["movie"];
	$searchQuery = $_GET["searchBox"];
	
	//Actors
	//if(!isset($actorSelected))
		$sql = "SELECT * FROM actors ORDER BY movie_id DESC";
	//else{
	//	$sql = "SELECT * FROM actors WHERE name LIKE '%".$actorSelected."%' ORDER BY movie_id DESC";
	//}
	$result = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		$actors[] = $row;
	}
	
	if(isset($actorSelected)){
		$sql = "SELECT * FROM actors WHERE name LIKE '%".$actorSelected."%' ORDER BY movie_id DESC";
		$result = mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result)){
			$actorSelect[] = $row;
		}
	}
	
	//Actor List
	$sql = "SELECT name FROM actors ORDER BY movie_id DESC";
	$result = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		$actorName[] = $row;
	}
	
	//Get movies where actor selected
	foreach($actorSelect as $actSelect){
		$actorsSelected[] = ''.$actSelect["movie_id"].' ';
	}
	$actorSelectedMovieID = join(',',$actorsSelected);
	
	//Movies
	if(isset($categorySelected))
		$sql = "SELECT * FROM movie WHERE cat='".$categorySelected."' ORDER BY movie_id DESC";
	else if(isset($actorSelected))
		$sql = "SELECT * FROM movie WHERE movie_id IN (".$actorSelectedMovieID.") ORDER BY movie_id DESC";
	else
		$sql = "SELECT * FROM movie ORDER BY movie_id DESC";
	
	$result = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		$movies[] = $row;
	}
	//Movie Category List
	$sql = "SELECT cat FROM movie ORDER BY movie_id DESC";
	$result = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		$movieCategory[] = $row;
	}
	
	//Get movie Review Info for the movie
	$sql = "SELECT * FROM reviews WHERE movie_id ='".$movieSelected."' ORDER BY review_id ASC";
	$result = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		$movieReview[] = $row;
	}
	
	//Set Category and Actor with unique value to be selected by user
	foreach($movieCategory as $movie){
		$catListTemp[] = $movie["cat"];
	}
	$movieCategory = array_unique($catListTemp);

	foreach($actorName as $actor){
		$actorListTemp[] = $actor["name"];
	}
	$actorName = array_unique($actorListTemp);
	
	
	echo '<div id="templatemo_main" class="wrapper">';
	
	
	//Nested table Layout for user selection of category/actors and main movie information
	echo '<table style="max-width:960px"  border="0" bgcolor="#A4A4A4" >';
	
	
	echo '<td style="vertical-align:top; width:auto; margin:0;">
			<table border="0" bgcolor="#A4A4A4">';

	echo '<form name="searchForm" id="searchForm" action="" method="get">';
	echo '<tr><td><input type="search" name="searchBox" placeholder="Search for Movie Item"></td></tr>';
	echo '<tr><td><input type="submit" value="Search"></td></tr>';
	echo '<tr><td>-------------------------------</td></tr>';
	echo '</form>';
	echo '<tr><td style="color:#610B38">Browse By</td></tr>';
	echo '<tr><td><a style="color:#0B4C5F;" href="/movies.php">All Movies</a> </td></tr>';
	
	//Category Selection List	
	echo '<tr><td><a id="categoryExpand" style="color:#0B4C5F;" href="javascript:showHide(\'category\')">Category</a> <br />
			  <div id="hiddenCategory" style="display:none">';
	foreach($movieCategory as $list){
		echo '<a href="movies.php?category='.$list.'" style="padding-left:2em; color:#0B4C5F;">'.$list.'</a> <br />';
	}
	echo '</div></td>
	</tr><tr><td>';
	
	//Actor Selection List
	echo '<a id="actorsExpand" style="color:#0B4C5F;" href="javascript:showHide(\'actor\')">Actors</a> <br />';
	echo '<div id="hiddenActor" style="display:none">';
	foreach($actorName as $list){
		echo '<a href="movies.php?actor='.$list.'" style="padding-left:2em; color:#0B4C5F;">'.$list.'</a> <br />';
	}
	echo '</div>';
	echo '</td>
			</tr>
		</table></td>';
		  
	//Main Movie Content		
	
	echo 
		'<td style="vertical-align:top; padding-left:2em; width:700px;">
		<table bgcolor="#E6E6E6" style="max-width:575px;">';
		
	
	//$searchQuery
	//$searchType - all, movie, actor
	
	//Search Related Results
	if(isset($searchQuery)){
		
		foreach($actors as $actor){
			if(strtolower($actor["name"]) == strtolower($searchQuery)){
				$actorsSearchList[] = $actor;
			}
		}
		
		foreach($movies as $movie){			
			foreach($actorsSearchList as $actorSearch){
				if($actorSearch["movie_id"] == $movie["movie_id"]){
					echo 'I am in';
					$moviesSearchList[] = $movie;
				}
			}
			if((strtolower($movie["name"]) == strtolower($searchQuery)) || (strtolower($movie["cat"]) == strtolower($searchQuery)) ){
				$moviesSearchList[] = $movie;
				foreach($actors as $actor){
					if($actor["movie_id"] == $movie["movie_id"]){
						$actorsSearchList[] = $actor;
					}
				}
			}
		}
		//Display Search Results List
		if($searchQuery != ""){
			$movies = $moviesSearchList;
			$actors = $actorsSearchList;
		}
	}
	
	//If Specific movie picked load the page with just that movie, otherwise load list of movies
	if(!isset($movieSelected)){
		echo '<td><td><input type="button" onclick="goToCart()" value="Go to Cart" style="float:right;"></input></td></td>';
		foreach($movies as $movie){
			echo '<tr><td>';
			echo '<h2 style="margin:0 0 0 0;"><a href="movies.php?movie='.$movie["movie_id"].'">'.$movie["name"].'</a></h2>';
			echo '<h3>'.$movie["cat"].'</h3>';
			/*
			foreach($actors as $actor){
				if($actor["movie_id"] == $movie["movie_id"]){
					echo '<h2><a href="movies.php?movie='.$movie["movie_id"].'">'.$movie["name"].'</a></h2>';
					echo '<h3>Actors</h3>';
					break;
				}
			}

			foreach($actors as $actor){
				if($actor["movie_id"] == $movie["movie_id"]){
					echo ''.$actor["name"].' <br />';
				}
			}
			*/
			echo '</td></tr>';
		}
	}else{
		echo '<tr><td>';
		foreach($movies as $movie){
			if($movie["movie_id"] == $movieSelected){
				echo '<h2 style="display: inline-block;">'.$movie["name"].'</h2> ';
				echo '<input type="button" onclick="goToCart()" value="Go to Cart" style="float:right;"></input>';
				echo '<form style="display:inline" action="addToCart.php" method="post">
						<input type="hidden" name="cart_movieID" value="'.$movie["movie_id"].'" />
						<input type="hidden" name="cart_movieName" value="'.$movie["name"].'" />
						<input type="submit" value="Add to Cart" style="float:right;"></input>
					</form>';
				echo '<h3 style="margin:0 0 0 0;">Category: </h3><p>'.$movie["cat"].'</p>';
				echo '<h3 style="margin:0 0 0 0;">Description: </h3><p>'.$movie["description"].'</p>';
				echo '<h3 style="margin:0 0 0 0;">Actors</h3>';
				foreach($actors as $actor){
					if($actor["movie_id"] == $movieSelected){
						echo ''.$actor["name"].' <br />';	
					}
				}
				$trailerKeyPosition = strpos($movie["trailer"],'v=') + 2;
				$trailerKey = substr($movie["trailer"], $trailerKeyPosition);
				
				echo '<br /><h3 style="margin:.5em 0 .5em 0;">Trailer</h3>
				<iframe width="560" height="315" src="http://www.youtube.com/embed/'.$trailerKey.'" frameborder="0" allowfullscreen></iframe>
				<br /><br />';
				
				echo '<h3 style="margin:.5em 0 .5em 0;">Reviews</h3>';
				$reviewColor = "#F1F8E0";
				
				//Facebook Integration				
				echo '	<div id="fb-root"></div>';
				echo '<fb:comments href="sjktech.com?movie='.$movieSelected.'"></fb:comments>';
				
				
				foreach($movieReview as $review)
				{
					echo '<p style="background-color:'.$reviewColor.'; margin:.5em 0 .5em 0;">'.$review["reviewer_name"].'<br />';
					//echo ''.$review["reviewer_email"].'<br /><br />';
					echo ''.$review["review"].'</p>';
					if($reviewColor == "#F1F8E0")
						$reviewColor = "#E0F8E0";
					else
						$reviewColor = "#F1F8E0";
				}
				echo '
					<form onSubmit="return validateForm()"  action="insertReview.php" method="post">
						<br>
						<h3 style="margin:.5em 0 .5em 0;">Post a Comment</h3>
						<p><label>Name:</label><br/><input type="text" size="40" name="reviewerName" id="reviewerName"></input> </p>
						<p><label>Email:</label><br/><input type="text" size="40" name="reviewerEmail" id="reviewerEmail"></input> </p>
						<p><label>Review:</label><br/><textarea name="review" id="review"rows="3" cols="50"></textarea> </p>
						<input type="hidden" name="movie_id" value="'.$movie["movie_id"].'" />
						
						<input type="submit" value="Submit"></input>
						<input type="reset" value="Reset Form"></input> <br>
				    </form>';
			}
		}
		echo '</td></tr>';
	}
	
		
	echo '</table>
		</td>';
		
		echo '<td style="vertical-align:top;"><input type="button" onclick="goToLogin()" value="Admin Login" style="float:right; "</td>';
		
	echo '</table>';
	
	
	
			
echo '</div>';


		
?>

<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer" class="wrapper">
    	Copyright &#169; 2013 <a href="#">SJK Tech</a>
    </div>
</div>

</body>

</html>