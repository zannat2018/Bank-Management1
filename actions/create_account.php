<?php
session_start();
require_once "../dbconfig.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	//Defining account holder's Photo directory
	$custPhoto_dir = '../images/customer/';
	$custPhoto = $custPhoto_dir.basename($_FILES['custPhoto']['name']);
	extract($_POST);
	//mailing
	$cdno = rand(11,99);
	$cdno1 = rand(22,99);
	$pin = $cdno.$cdno1;
	$enPin = md5($pin);
	
	$sub = "Acount information";
	$message ="Your account number:".$accNo."<br> And PIN:".$pin."Please go <a href='www.phphyperteam.com/khorshed/Bank'>And register to se your personal information</a>";
	//mailing
	//Maching start
	$matchAcc = $con->query("SELECT acc_no FROM all_accounts WHERE acc_no='$accNo'");
	$matchInfo = $con->query("SELECT acc_no FROM related_info WHERE acc_no='$accNo'");
	$matchNomini = $con->query("SELECT acc_no FROM nomini_info WHERE acc_no='$accNo'");
	//Matching End
	
	//Query Start
	if($matchAcc->num_rows == 0 && $matchInfo->num_rows == 0 && $matchNomini->num_rows == 0){
		$insertAcc = $con->query("INSERT INTO all_accounts(`acc_no`, `pin`, `acc_type`, `balance`, `brance_id`, `first_name`, `last_name`, `email`, `init_balance`, `photo`) VALUES('$accNo',  '$enPin', '$accType', '$intBal', '$branceId', '$fname', '$lname', '$email', '$intBal', '$custPhoto')");
		$insertInfo = $con->query("INSERT INTO related_info(`acc_no`, `fathers_name`, `mothers_name`, `nid`, `pre_address`, `per_address`, `post_code`, `religion_id`, `div_id`, `dist_id`, `gender`, `merital_status`, `date_of_birth`, `phone`) VALUES('$accNo', '$father', '$mother', '$NID', '$preAddress', '$perAddress', '$postcode', '$religion', '$division', '$dist', '$sex', '$merital', '$dob', '$phone')");

		if($insertAcc && $insertInfo){
			mail($email, $sub, $message, 'www.phphyperteam.com/khorshed/Bank');
			$moveFile = move_uploaded_file($_FILES["custPhoto"]["tmp_name"], $custPhoto);
			$_SESSION['success'] = "New account Created";
			echo"<script>window.location.href='../admin/add_nomini.php'</script>";
			
		}
		
	 }

}
?>
