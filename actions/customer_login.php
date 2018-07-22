<?php
require_once "../dbconfig.php";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	extract($_POST);
	session_start();
	$pass = md5($password);
	$query = $con->query("SELECT acc_no, password FROM regd_customer WHERE acc_no = $accNo");
	$identity = $query->fetch_object();
	$acc = $identity->acc_no;
	$dbpass = $identity->password;
	if($query->num_rows == 1 && $accNo == $acc && $pass == $dbpass){
		$_SESSION['accno'] = $identity->acc_no;
		echo "<script>window.location.href='../profile/c_profile.php'</script>";
		
	}else{
		$_SESSION['failed'] = "Account number or password is inncorrect";
		echo "<script>window.location.href='../public/index.php'</script>";	
	}
		
}

?>
