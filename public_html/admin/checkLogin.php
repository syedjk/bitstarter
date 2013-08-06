<?php 
session_start();
require("conn.php");
	
	$myusername=$_POST['username']; 
	$mypassword=$_POST['pass'];
   
	$sql = "SELECT * FROM users WHERE userName='".$myusername."' AND password='".$mypassword."' ";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	
	if(count($row) > 0){
		$_SESSION['user']=$myusername;
		$_SESSION['password']=$mypassword;
		header("location:adminMovieInsert.php");
	}	
	else{
		header("location:login.php");
	}
	
?>