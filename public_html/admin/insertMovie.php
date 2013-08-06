<?php 
session_start();
require("conn.php");
	
	$movieName=$_POST['movieName']; 
	$actors=$_POST['actors'];
	$category=$_POST['category']; 
	$description=$_POST['description']; 
	$youtubeLink=$_POST['youtubeLink']; 
	
	$actorsArray = array();
	$i =0;
	
	preg_match_all("#\n#", $actors, $matches, PREG_OFFSET_CAPTURE);
	$nextPositionActor = array();
	$nextPositionCounter = 0;
	$prevPositionActor = 0;
	foreach($matches[0] as $match)
	{
		$nextPositionActor[] = $match[1];
		$actorsArray[$i]= substr($actors, $prevPositionActor, $nextPositionActor[$i] - $nextPositionCounter);
		$nextPositionCounter += $nextPositionActor[$i] - $prevPositionActor;
		$prevPositionActor = $nextPositionActor[$i];
		//echo ' '.$prevPositionActor.' '.$nextPositionActor[$i].' '.$nextPositionCounter.' '.$actorsArray[$i].'<br />';
		$i++;
	}
	$actorsArray[$i]= substr($actors, $prevPositionActor);
	//echo ''.$actorsArray[$i].'';
	
	//Escape keys added...Ex: if there is a quote in the text: "jim's", it will work properly
	$movieName = mysqli_real_escape_string($conn, $movieName);
	$actors = mysqli_real_escape_string($conn, $actors);
	$category = mysqli_real_escape_string($conn, $category);
	$description = mysqli_real_escape_string($conn, $description);
	$youtubeLink = mysqli_real_escape_string($conn, $youtubeLink);
	
	

	$sql = "INSERT INTO movie (name,cat,description,trailer) VALUES ('".$movieName."','".$category."','".$description."','".$youtubeLink."') ";//REPLACE($description, '"', '\"')
	//echo ''.$sql.'';
	if (!mysqli_query($conn,$sql)){
		die('Error: ' .mysqli_error());
	}
	echo "Movie record added <br />";
	
	$IDForeign = mysqli_insert_id($conn);
	
	foreach($actorsArray as $actorsVal){
		$sql = "INSERT INTO actors (name,movie_id) VALUES ('".$actorsVal."','".$IDForeign."') ";
		if (!mysqli_query($conn,$sql)){
			die('Error: ' .mysqli_error());
		}
	}
	echo "Actors record added <br />";
	echo "<h3><a href='../movies.php'>Return to Movies Home</a></h3>";
?>