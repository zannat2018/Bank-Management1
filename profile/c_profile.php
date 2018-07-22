<?php
session_start();
require_once "../dbconfig.php";

if(!isset($_SESSION['accno'])){
	echo"<script>window.location.href='../public/index.php'</script>";
}
$customer = $_SESSION['accno'];
$info = $con->query("SELECT * FROM all_accounts WHERE acc_no = '$customer'");

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
    <link href="../public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- Custom styles for this template -->
    <link href="../public/css/scrolling-nav.css" rel="stylesheet">
    

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav style="background-image:url(../public/img/bank_banner1.jpg); background-position:center; background-repeat:no-repeat; background-size:cover;" class="navbar navbar-expand-lg navbar-toggler  fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../index.php"><img src="../public/img/bank_logo.png" style="border-radius:100%; border:2px solid #000; height:55px; width:100px;" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger btn bg-light btn-outline-info" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger btn bg-light btn-outline-info" href="../public/alltransection.php">Transections</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger btn-sm bg-dark" href="../c_logout.php"><i>Logout</i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<section>
<div class="container">
<div class="col-md-10 mx-auto" style="border:2px solid #666;">
    
    <table class="table table-bordered text-center">
    	<?php 
		while($inFo = $info->fetch_object()):
	 ?>
        	<tr>
            	<th class="text-center">Photo</th>
                <td><img src="<?php echo $inFo->photo; ?>" alt="Image"></td>
           </tr>
           </tr>
                <th class="text-center">First Name</th>
                <td><?php echo $inFo->first_name; ?></td>
           </tr>
           <tr>
           		<th class="text-center">Last Name</th>
                <td><?php echo $inFo->last_name; ?></td>
           </tr>
           <tr>
           		<th class="text-center">Acc type</th>
                <td><?php echo $inFo->acc_type; ?></td>
           </tr>
           <tr>    
                <th class="text-center">E-mail</th>
                <td><?php echo $inFo->email; ?></td>
            </tr>
            <tr>    
                <th class="text-center">Balance</th>
                <td><?php echo $inFo->balance; ?></td>
            </tr>
            <?php endwhile; ?>
    </table>
    
    
    </div>
    </div>
    </section>
</body>
</html>