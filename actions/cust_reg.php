<?php
require_once "../dbconfig.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	session_start();
	extract($_POST);
	$enpin = md5($pin);
	$enpass = md5($password);
	$match = $con->query("SELECT acc_no, pin FROM all_accounts WHERE acc_no = '$accNo' AND pin = '$enpin'");
	
	if($match->num_rows == 1){
		$match1 =$con->query("SELECT acc_no FROM regd_customer WHERE acc_no = '$accNo'");
		if($match1->num_rows == 0){
			$insert = $con->query("INSERT INTO regd_customer(`acc_no`, `password`) VALUES('$accNo', '$enpass')");
			if($insert){
				$_SESSION['registered'] = "Successfully registered Please Login";
				echo "<script>window.location.href='../index.php'</script>";
			}
		}else{
			$_SESSION['already'] = "You are allready registered";
			echo "<script>window.location.href='../index.php'</script>";	
		}
	}else{
			$_SESSION['nocust'] = "You are not a customer";
			echo "<script>window.location.href='../index.php'</script>";	
	}
	
}
?>