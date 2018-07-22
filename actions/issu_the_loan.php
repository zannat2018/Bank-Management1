
<?php
		session_start();
		require_once "../dbconfig.php";
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			extract($_POST);
			//calculation of installment amount
			$P = $amount;
			$r = $rate/100;
			$i = $r/$m;
			$n = $year * $m;
			
			$cR = 1+$i;
			$cRn = pow($cR, $n);
			$cRn1 = $i*$cRn;
			$cRn2 = $cRn-1;
			$cRn3 = $cRn1/$cRn2;
			  
			$PMT = ceil($P * $cRn3);
			//calculation of installment amount
			$accMatch = $con->query("SELECT * FROM loan_account WHERE(loan_acc_no = '$loanAccNo')");
			//$accMatch1 = $con->query("SELECT acc_no FROM all_accounts WHERE(acc_no = '$loanAccNo')");
			 
			if($accMatch->num_rows == 0){
				$insert= $con->query("INSERT INTO loan_account(`loan_acc_no`, `loan_policy`, `rate`, `loan_amount`, `method`, `per_installment`, `duration`, `total_installment`) VALUES('$loanAccNo', '$policy', '$rate', '$amount', '$m', '$PMT', '$year', '$n')");
				if($insert){
					$_SESSION['submitted'] = "Loan has been submited";
					echo "<script>window.location.href='../admin/loan_issue_form.php'</script>";
				}
			}
		}	

 	?>