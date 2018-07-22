<?php
require_once "../dbconfig.php";

$pols = $con->query("SELECT * FROM loan_policies");

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Raihan" content="Bank">

    <title>Need Bank.Web</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav style="background-image:url(img/bank_banner1.jpg); background-position:center; background-repeat:no-repeat; background-size:cover;" class="navbar navbar-expand-lg navbar-toggler  fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="img/bank_logo.png" style="border-radius:100%; border:2px solid #000; height:55px; width:100px;" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger btn bg-light btn-outline-info" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger btn bg-light btn-outline-info" href="loan_calculator.php">Loan Calculator</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<section>
<div class="container">

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
	/*
	* $P = Principal or Amount of loan
	* $r = rate of Interest
	* $n = Number of Payment
	* $i = Rate of interest per month
  	* $cR = capitalization Rate
	* $cRn  = Capitalization rate for total payment
	* $IA = Installment Amount
	*/
	extract($_POST);
	$P = $amount;
	$r = $rate/100;
	$i = $r/$m;
	$n = $year * $m;
	
	$cR = 1+$i;
	$cRn = pow($cR, $n);
	$cRn1 = $i*$cRn;
	$cRn2 = $cRn-1;
	$cRn3 = $cRn1/$cRn2;
	  
	$PMT = $P * $cRn3;
	 if($PMT){ ?>
     <div class="row  bg-light">
    <div class="col-lg-6 mx-auto" style="font-size:16px; padding:15px; margin-bottom:15px;"><?php echo "<h3 class='btn btn-outline-primary btn-lg'>Installment Amount: <strong class='text-danger'>tk.".ceil($PMT)."</strong></h3>"; ?></div></div>
    <?php }
	}?>
    <div class="row bg-light">
          <div class="col-lg-6 mx-auto">
            <p class="lead text-success">Calculate the amount of installment against your loan policy its acurate reliable.</p>

              <form action="" method="post">
              <div class="form-group">
                <label for="amount" class="col-form-label-lg text-danger">Loan Amount:</label>
                <input type="text" name="amount" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="amount" class="col-form-label-lg text-danger">Loan Policy:</label>
                <select name="lop" id="pol" required>
 					<option hidden="" value="">Select One</option>
                    <?php while($pol = $pols->fetch_object()): ?>
 					<option value="<?php echo $pol->id; ?>"><?php echo $pol->policy_name; ?></option>
                    <?php endwhile; ?>
                    </select>
              </div>
              <div class="form-group">
                <label for="rate" class="col-form-label-lg text-danger">Rate(%):</label>
                <p id="ir">
                <input type="text" class="form-control">
                </p>
              </div>
              <div class="form-group">
                <label for="type" class="col-form-label-lg text-danger">Installment Type: </label>
                <select name="m" required>
 					<option hidden="" value="">Select One</option>
 					<option value="12">Monthly</option>
                    <option value="4">Quarterly</option>
                    <option value="2">Half Yearly</option>
                    <option value="1">Yearly</option>
 				</select>
              </div>
              <div class="form-group">
                
                <label for="duration" class="col-form-label-lg text-danger">Duration(Year):</label>
                
                <input type="text" name="year"class="form-control" required>
                
              </div>
                                                     
              <button type="submit" class="btn btn-outline-success btn-lg">Calculate</button>
              <button type="reset" class="btn btn-outline-danger btn-lg">Reset</button>
            </form>
        </div>
        </div>
	</div>
</section> 
<!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Team Bank managrment 2018</p>
      </div>
      <!-- /.container -->
    </footer>   
<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script>
	$(document).ready(function() {
		$("#pol").change(function(){
			//if($(this).val()=='') return;
			$.get('intrate.php',{polid:$(this).val()},function(data){$("#ir").html(data)});
		});
	});
</script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>
    
</body>
</html>