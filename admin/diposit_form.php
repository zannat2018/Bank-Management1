<?php
session_start();
if(!isset($_SESSION['auth'])){
	header('Location: login.php');	
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/bootstrap/css/custom.style.css" rel="stylesheet">
</head>

<body>
    
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
                            <li><a href="check_balance.php">Balance</a></li>
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
<div class="container">

	<div class="breadcrumb col-md-6 col-md-offset-3 top-scale-hundred">
	    <?php
	    if(isset($_SESSION['depositok'])){
	        echo"<h5 class='alert-success text-center btn-lg btn-block btn'>".$_SESSION['depositok']."</h5>";
	    }
	    unset($_SESSION['depositok']);
	    ?>
        <form method="post" id="dipoForm" action="../actions/diposit.php">
            <div class="row">
            <legend class="bg-primary text-center">Input deposit information</legend>
            </div>
            <div class="row">
                <fieldset class="form-group">
                <div class="col-md-2">
                    <label>Acc/No:</label>
                </div>
                <div class="col-md-10">
                     <input type="text" class="form-control" name="accNo" minlength="11" maxlength="11" required/>
                </div>
                </fieldset>
            </div>
            <div class="row">
                <fieldset class="form-group">
                <div class="col-md-2">
                    <label>Amount:</label>
                </div>
                <div class="col-md-10">
                       <input type="text" class="form-control" name="dipoAmount" required/>
                </div>
                </fieldset>
            </div>
            <div class="row">
                <fieldset class="form-group">
                <div class="col-md-2">
                    <label>Bearer:</label>
                </div>
                <div class="col-md-10">
                        <input type="text" class="form-control" name="bearEr" required/>
                </div>
                </fieldset>
            </div>
            <div class="row">
                <fieldset class="form-group">
                	<div class="col-md-10 col-md-offset-2">
                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Diposit"/>
                    </div>
                </fieldset>
            </div>
            
            </form>
    </div>
</div>
<script src="../assets/jquery/jquery.js" type="text/javascript"></script>
<script src="../assets/jquery/jquery.validation.js" type="text/javascript"></script>
<script src="../assets/jquery/diposit.validate.js" type="text/javascript"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>