<?php
session_start();
if(!isset($_SESSION['auth'])){
	header('Location: login.php');	
}
 require_once '../dbconfig.php';
 $query = $con->query("SELECT * FROM loan_policies");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Customer Information</title>
<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/bootstrap/css/custom.style.css" rel="stylesheet">
</head>

<body>
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Logo and responsive toggle -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-globe"></span> Logo</a>
                </div>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="index.php">Admin Home</a>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounts<span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="about-us">
                                <li><a href="all_accounts.php">All Accounts</a></li>
                                <li><a href="create_customer_acc.php">Create Account</a></li>
                                <li><a href="#">Update Account</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transactions <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="about-us">
                                <li><a href="diposit_form.php">Diposite</a></li>
                                <li><a href="withdrawal_form.php">Withdraw</a></li>
                                <li><a href="#">Transfer</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Query<span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="about-us">
                                <li><a href="check_balance.php">Check Balance</a></li>
                                <li><a href="customer_information.php">Customer Info</a></li>
                                <li><a href='accounts_statement.php'>Show Statement</a></li>
                                <li><a href="#">View FD form</a></li>
                            </ul>
                        </li>
                            
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="about-us">
                                <li><a href="#">Change Password</a></li>
                                <li><a href="#">Exit</a></li>
                                
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"></a></li>
                    <li>                
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                  
                    </li>
                  </ul>
                    
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
	</nav>
</header>
    
<section class="top-scale-hundred">
	<div class="container">
    <?php
	if(isset($_SESSION['submitted'])){
		echo"<h4 class='col-md-8 col-md-offset-2 alert-success btn-lg'>".$_SESSION['submitted']."<h4>";
	}
	unset($_SESSION['submitted'])
	?>
	<div class="panel panel-primary col-md-8 col-md-offset-2">
    	<div class="panel-heading text-center">Loan Issue Form</div>
        	<div class="panel-body">
		<form method="post" action="../actions/issu_the_loan.php" name="loanForm" enctype="multiipart/form-data">
			
					<fieldset class="form-group">
						<div class="col-md-4">
							<label>Loan Ac/No:</label>
						</div>
						<div class="col-md-8">
							<input class="form-control" type="text" name="loanAccNo" minlength="11" maxlength="11" required /><span id="accErr" style="color:#F00;"></span>
						</div>
					</fieldset>
			
					<fieldset class="form-group">
						<div class="col-md-4">
						<label>Loan Policy:</label>
						</div>
						<div class="col-md-8">
		            	<select class="form-control" id="pol" name="policy" required />
		            		<option hidden="" value="">Select One</option>
		                    <?php while($result = $query->fetch_object()): ?>
		                    <option value="<?php echo $result->id; ?>"><?php echo $result->policy_name; ?></option>
		                    <?php endwhile; ?>
		                </select>
		            </div>
					</fieldset>
                    <fieldset class="form-group">
						<div class="col-md-4">
							<label>Rate(%):</label>
						</div>
						<div id="ir" class="col-md-8">
                        	<input type="text" class="form-control">
                        </div>
					</fieldset>
					<fieldset class="form-group">
						<div class="col-md-4">
							<label>Loan Amount:</label>
						</div>
						<div class="col-md-8">
		                	<input class="form-control" type="text" name="amount" required />
		            	</div>
					</fieldset>
                    
                    <fieldset class="form-group">
						<div class="col-md-4">
							<label>Payment Method:</label>
						</div>
						<div class="col-md-8">
		                <select name="m">
                        	<option hidden="" value="">Select One</option>
                            <option value="1">Yearly</option>
                            <option value="2">Half Yearly</option>
                            <option value="4">Quarterly</option>
                            <option value="12">Monthly</option>
                        </select>
		            	</div>
					</fieldset>
					<fieldset class="form-group">
						<div class="col-md-4">
						<label>Duration(year):</label>
						</div>
						<div class="col-md-8">
						<input class="form-control" type="text" name="year" required /><span id="duErr" style="color:#F00;"></span>
					</div>
					</fieldset>
            <div class="col-md-6 col-md-offset-3">
				<fieldset class="form-group">
					<input class="btn-lg btn-success btn-block" type="submit" onClick="return validate()" name="submit" value="Submit">
	            	<!-- <button class="form-control btn btn-success" type="button" onClick="validate()" name="submit">Submit</button> -->
	        	</fieldset>
           	</div>
		</form>
        </div>
	</div>
</div>
</section>
<script src="../assets/jquery/jquery.js" type="text/javascript"></script>
<script src="../assets/jquery/jquery.validation.js" type="text/javascript"></script>
<script src="../assets/jquery/loan.validation.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$("#pol").change(function(){
			//if($(this).val()=='') return;
			$.get('../admin/intrate.php',{polid:$(this).val()},function(data){$("#ir").html(data)});
		});
	});
</script>
</body>
</html>