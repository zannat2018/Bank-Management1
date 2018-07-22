<?php
require_once "../dbconfig.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	session_start();
	extract($_POST);
	$sql = $con->query("INSERT INTO news_letter(`email`, `message`) VALUES('$email', '$message')");
	if($sql){
		
		$_SESSION['success'] = "Yor message submitted successfully";
		echo "<script>window.location.href='../public/index.php'</script>";
	}
}
?>