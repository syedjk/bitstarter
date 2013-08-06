<?php 

session_start();
//session_destroy();
require("admin/conn.php");

	$cartRemoveIndex=$_POST['cart_removeIndex'];
	$cartUpdate=$_POST['cart_update'];
	
	if(isset($cartUpdate)){		
		$i=0;
		foreach($_SESSION['cartMovie'] as $movID){
			$_SESSION['movieCount'][$i] = $cartUpdate[$i];
			if($cartUpdate[$i]==0){
				unset($_SESSION['cartMovie'][$i]);
				unset($_SESSION['cartMovieName'][$i]);
				unset($_SESSION['movieCount'][$i]);
				
				$_SESSION['cartMovie'] = array_values($_SESSION['cartMovie']);
				$_SESSION['cartMovieName'] = array_values($_SESSION['cartMovieName']);
				$_SESSION['movieCount'] = array_values($_SESSION['movieCount']);
			}
			$i++;
		}
		header("location:cart.php");
	}
	else if(isset($cartRemoveIndex)){
		unset($_SESSION['cartMovie'][$cartRemoveIndex]);
		unset($_SESSION['cartMovieName'][$cartRemoveIndex]);
		unset($_SESSION['movieCount'][$cartRemoveIndex]);
		
		$_SESSION['cartMovie'] = array_values($_SESSION['cartMovie']);
		$_SESSION['cartMovieName'] = array_values($_SESSION['cartMovieName']);
		$_SESSION['movieCount'] = array_values($_SESSION['movieCount']);

		header("location:cart.php");
	}
	else{
	
		$valChanged = FALSE;
		$i = 0;
		foreach($_SESSION['cartMovie'] as $movID){
			if($movID == $_POST['cart_movieID']){
				$_SESSION['movieCount'][$i]++;
				$valChanged = TRUE;
			}
			$i++;
		}
		if(!$valChanged){
			$_SESSION['cartMovie'][] = $_POST['cart_movieID'];
			$_SESSION['cartMovieName'][] = $_POST['cart_movieName']; 	
			$_SESSION['movieCount'][] = 1;
		}
		
		header("location:movies.php?movie=".$_POST['cart_movieID']."");
	}
?>