<?php
require_once "dbconfig.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
/* if($_SERCER['REQUEST_METHOD'] == 'POST'){
	extract($_POST);
	$query = $con->query("SELECT acc_no, pin FROM all_accounts WHERE acc_no = $accNo");
	if($query->num_rows == 1){
		$con->query("INSERT INTO registerd_customer(`acc_no`, `password`) VALUES('$accNo', '$password')");
	}
		
}
*/
?>
<div class="container-fluid">
	<div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary" style="margin-top:50px;">
        <div class="panel-heading text-center" style="font-size:18px;">Register As Customer</div>
            <div class="panel-body">
            <form name="custReg" id="custReg" method="post">
                <fieldset class="form-group">
                    <div class="col-md-4 bg-info" style="border:1px solid #333;">
                    <label class="btn btn-lg">Acc/No:</label>
                    </div>
                    <div class="col-md-8">
                    <input type="text" name="accNo" class="input-lg form-control" placeholder="Enter your bank account number">
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="col-md-4 bg-info" style="border:1px solid #333;">
                    <label class="btn btn-lg">PIN:</label>
                    </div>
                    <div class="col-md-8">
                    <input type="password" name="pin" class="input-lg form-control" placeholder="Enter your PIN number">
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="col-md-4 bg-info" style="border:1px solid #333;">
                    <label class="btn btn-lg">Password:</label>
                    </div>
                    <div class="col-md-8">
                    <input type="password" name="password" class="input-lg form-control" placeholder="Enter a password 6-8 digits">
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="col-md-4 bg-info" style="border:1px solid #333;">
                    <label class="btn btn-lg">Confirm password:</label>
                    </div>
                    <div class="col-md-8">
                    <input type="password" name="confpassword" class="input-lg form-control" placeholder="Retype Password">
                    </div>
                </fieldset>
                <fieldset class="form-group">
                <div class="col-md-4 col-md-offset-4">
                	<input style="border:2px solid #333; font-size:18px; padding:10px; background-color:#090; color:#FFF; width:150px" type="submit" value="Register">
                </div>
                </fieldset>
                
            </form>
            </div>
        </div>
</div>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>