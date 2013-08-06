<?php 
session_start();
require("admin/conn.php");
	
	$reviewerName=$_POST['reviewerName']; 
	$reviewerEmail=$_POST['reviewerEmail'];
	$review=$_POST['review'];  
	$movieID=$_POST['movie_id']; 
	
	//Escape keys added...Ex: if there is a quote in the text: "jim's", it will work properly
	$reviewerName = mysqli_real_escape_string($conn, $reviewerName);
	$reviewerEmail = mysqli_real_escape_string($conn, $reviewerEmail);
	$review = mysqli_real_escape_string($conn, $review);
	
	

	$sql = "INSERT INTO reviews (reviewer_name,reviewer_email,review,movie_id) VALUES ('".$reviewerName."','".$reviewerEmail."','".$review."','".$movieID."') ";
	if (!mysqli_query($conn,$sql)){
		die('Error: ' .mysqli_error());
	}
	else{
		echo "Review has been added <br />";
		header("location:movies.php?movie=".$movieID."");
	}
?>