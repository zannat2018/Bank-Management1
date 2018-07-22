<?php
session_start();
require_once "../dbconfig.php";

if(!isset($_SESSION['accno'])){
	echo"<script>window.location.href='public/index.php'</script>";
}
$customer = $_SESSION['accno'];
$trasactions = $con->query("SELECT * FROM transections WHERE acc_no = '$customer'");

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
              <a class="nav-link js-scroll-trigger btn bg-light btn-outline-info" href="../profile/c_profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger btn bg-light btn-outline-info" href="alltransection.php">Transections</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger bg-dark btn-sm" href="../profile/c_logout.php"><i>Logout</i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<section>
<div class="container">
<div class="col-md-10 mx-auto" style="border:2px solid #666;">
    <?php if($trasactions->num_rows > 0 ){ ?>
    <table class="table table-bordered text-center">
    	<thead>
        	<tr>
            	<th class="text-center">Date &amp; Time</th>
                <th class="text-center">Trans_Type</th>
                <th class="text-center">By</th>
                <th class="text-center">Debit</th>
                <th class="text-center">Credit</th>
                <th class="text-center">Balance</th>
            </tr>
        </thead>
        <tbody>
        	<?php while($transaction = $trasactions->fetch_object()): ?>
        	<tr>
            	<td><?php echo $transaction->trans_date; ?></td>
                <td><?php echo $transaction->trans_type; ?></td>
                <td><?php echo $transaction->bearer; ?></td>
                <td><?php echo $transaction->debit; ?></td>
                <td><?php echo $transaction->credit; ?></td>
                <td><?php echo $transaction->balance; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php }else{ ?>
    	<h3 class="text-center text-danger" style="border:1px solid #333; padding:10px;">No transaction made</h3>
    <?php } ?>
    </div>
    </div>
    </section>
</body>
</html>