<?php
session_start();
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
              <a class="nav-link js-scroll-trigger btn bg-light btn-outline-info" href="#service">Services </a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger btn bg-light btn-outline-info" href="#Banking">E-Banking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger btn bg-light btn-outline-info" href="#about">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger btn bg-light btn-outline-info" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger bg-light btn btn-outline-info" href="loan_calculator.php">Loan Calculator</a>
            </li>
          </ul>
        </div>
      </div>
    </nav> 
    <!--carosel start ------------------->
<div class="container" >
      <div class="row my-4">
        <div class="col-lg-8">
          <img class="img-fluid rounded" src="./img/maxre.jpg" alt="">
        </div>
        <!--Modalf-->
        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header bg-info"><h3 style="color:#FFF; text-align:center;">Register as if you are a customer Need Bank</h3></div>
            <div class="modal-body">
              <form method="post" action="../actions/cust_reg.php" id="custReg">
              <input class="form-control" type="text" name="accNo" maxlength="11" placeholder="Enter bank account number"><br>
              <input class="form-control" type="password" name="pin" placeholder="Enter your PIN number"><br>
              <input class="form-control" type="password" id="password" name="password" minlength="6" maxlength="8" placeholder="enater a password 6-8 digits"><br>
              <input class="form-control" type="password" name="confpass" minlength="6" maxlength="8" placeholder="Retype password"><br>

              <input class="btn btn-success" type="submit" name="submit" value="Register">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
        <!--Modal -->


        <!-- /.col-lg-8 -->
        <div class="col-lg-4 bg-secondary text-white">
          
          <?php
		  if(isset($_SESSION['failed'])){
			echo "<h5 class='alert-dismissible alert-danger btn-lg'>".$_SESSION['failed']."</h5>";
			echo "<script>window.location.href='#page-top'</script>";
		  }elseif(isset($_SESSION['registered'])){
			echo "<h5 class='alert-dismissible alert-danger btn-lg'>".$_SESSION['registered']."</h5>";
			echo "<script>window.location.href='#page-top'</script>";
		  }elseif(isset($_SESSION['already'])){
			echo "<h5 class='alert-dismissible alert-danger btn-lg'>".$_SESSION['already']."</h5>";
			echo "<script>window.location.href='#page-top'</script>";
		  }elseif(isset($_SESSION['nocust'])){
			echo "<h5 class='alert-dismissible alert-danger btn-lg'>".$_SESSION['nocust']."</h5>";
			echo "<script>window.location.href='#page-top'</script>";
		  }else{
		  	echo"<h5>If you are a registered Customer of Need Bank</h5>";
		  	echo "<script>window.location.href='#page-top'</script>";
		  }
		  unset($_SESSION['nocust']);
		  unset($_SESSION['already']);
		  unset($_SESSION['registered']);
		  unset($_SESSION['failed']);
		  ?>
              <form name="custLog" id="custLog" action="../actions/customer_login.php" method="post">
                    <fieldset class="form-group">
                        <input type="text" name="accNo" class="input-lg form-control" placeholder="Enter your bank account number">
                    </fieldset>
                    
                    <fieldset class="form-group">
                       <input type="password" name="password" class="input-lg form-control" placeholder="Enter a password">
                    </fieldset>
                    
                    <fieldset class="form-group">
                        <input class="btn btn-outline-light bg-success btn-block" type="submit" value="Login">
                    </fieldset>
                    
                </form>
          <h6 class="text-center">If not registered</h6>
          <button type="button" class="btn btn-outline-light bg-success btn-block" data-toggle="modal" data-target="#myModal">click here for Register</button>
        </div>
        <!-- /.col-md-4 -->
        </div>

    <section id="service">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mx-auto">
            <h2><a href="#" class="btn btn-outline-warning btn-lg" data-toggle="collapse">Services we offer</h2></a>
            <div id="demo" class="collapse">
            <p class="lead">This is a great place to talk about your webpage. 
              This template is purposefully unstyled so you can use it as a 
            boilerplate or starting point for you own landing page designs! This template features:</p>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                          <img class="sealImage" alt="No image" src="./img/Bank2.png">
                            <div class="caption">
                              <h4><a class="btn btn-outline-success btn-lg" href="#">Corporate Banking</a></h4>
                                <p>our Activity <a target="_blank" href="http://www.bootsnipp.com">http://phphyperteam.com</a>.</p>
                              <ul>
                                  <li>Corporate Banking Services Overview</li>
                                  <li>Electronic Banking For Your Business</li>
                                  <li> LC Trade</li>                                                                    
                               </ul>
                            </div>
                                  <div class="ratings">
                                  <p class="pull-right">15 reviews</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img class="sealImage" src="./img/card2.jpg" >
                            <div class="caption">                                
                              <h4><a class="btn btn-outline-success btn-lg" href="#">SME Banking</a> </h4>
                                <ul>
                                  <li>Need Bank Smart Cash Credit</li>
                                   <li> Need Bank Smart Term Loan</li>
                                    <li>Need Bank Smart Festival Loan</li>
                                    <li>Need Bank Smart Women Entrepreneurs Financing</li>
                                    <li>Need Bank Smart Distributor Financing</li>
                                    <li>Cash Credit (Hypo) Under Small Shop Financing Scheme</li>
                                    </ul>

                            <p>Our Activity <a target="_blank" href="http://www.bootsnipp.com">http://phphyperteam.com</a>.</p>

                            </div>
                            <div class="ratings">
                            <p class="pull-right">15 reviews</p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img class="sealImage" src="./img/carde3.jpg" alt="">
                            <div class="caption">
                               
                              <h4><a class="btn btn-outline-success btn-lg" href="#">Personal Banking</a></h4>
                              <ul>
                                <li>Electronic Banking</li>
                                <li>DBBL Retail Loan Products</li>
                                <li>Dutch-Bangla Bank Future Line</li>

                              </ul>
                                <p>our Activity <a target="_blank" href="http://www.bootsnipp.com">http://phphyperteam.com</a>.</p>
                                </div>
                                <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                
                            </div>
                        </div>
                    </div>

                        <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                          <img class="sealImage" alt="No image" src="./img/article.jpg">
                            <div class="caption">
                              <h4><a class="btn btn-outline-success btn-lg" href="#">Corporate Banking</a></h4>
                                <p>our Activity <a target="_blank" href="http://www.bootsnipp.com">http://phphyperteam.com</a>.</p>
                              <ul>
                                  <li>Corporate Banking Services Overview</li>
                                  <li>Electronic Banking For Your Business</li>
                                  <li> LC Trade</li>                                                                    
                               </ul>
                            </div>
                                  <div class="ratings">
                                  <p class="pull-right">15 reviews</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                          <img class="sealImage" alt="No image" src="./img/Transfers-2.jpg">
                            <div class="caption">
                              <h4><a class="btn btn-outline-success btn-lg" href="#">Corporate Banking</a></h4>
                                <p>our Activity <a target="_blank" href="http://www.bootsnipp.com">http://phphyperteam.com</a>.</p>
                              <ul>
                                  <li>Corporate Banking Services Overview</li>
                                  <li>Electronic Banking For Your Business</li>
                                  <li> LC Trade</li>                                                                    
                               </ul>
                            </div>
                                  <div class="ratings">
                                  <p class="pull-right">15 reviews</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                          <img class="sealImage" alt="No image" src="./img/cor.jpg">
                            <div class="caption">
                              <h4><a class="btn btn-outline-success btn-lg" href="#">Corporate Banking</a></h4>
                                <p>our Activity <a target="_blank" href="http://www.bootsnipp.com">http://phphyperteam.com</a>.</p>
                              <ul>
                                  <li>Corporate Banking Services Overview</li>
                                  <li>Electronic Banking For Your Business</li>
                                  <li> LC Trade</li>                                                                    
                               </ul>
                            </div>
                                  <div class="ratings">
                                  <p class="pull-right">15 reviews</p>
                            </div>
                        </div>
                    </div>

  </div> <!--row close-->          

    </section>

    <section id="Banking" class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mx-auto">
            <h2 class="btn btn-outline-warning btn-lg">E-Banking </h2>
            <p>We provide Heighly secure Electronic Banking facelityes for your Transaction. That is make your life style more easyer and comfortable
            Every purchase and shopping we provide you finest transaction to your door steps. </p>
              <div class="row">
              <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                          <img class="sealImage" alt="No image" src="./img/download.jpg">
                            <div class="caption">
                              <h4><a class="btn btn-outline-success btn-lg" href="#">Corporate Banking</a></h4>
                                <p>our Activity <a target="_blank" href="http://www.bootsnipp.com">http://phphyperteam.com</a>.</p>
                              <ul>
                                  <li>Corporate Banking Services Overview</li>
                                  <li>Electronic Banking For Your Business</li>
                                  <li> LC Trade</li>                                                                    
                               </ul>
                            </div>
                                  <div class="ratings">
                                  <p class="pull-right">15 reviews</p>
                            </div>
                        </div>
                    </div>

                      <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                          <img class="sealImage" alt="No image" src="./img/card.png">
                            <div class="caption">
                              <h4><a class="btn btn-outline-success btn-lg" href="#">Corporate Banking</a></h4>
                                <p>our Activity <a target="_blank" href="http://www.bootsnipp.com">http://phphyperteam.com</a>.</p>
                              <ul>
                                  <li>Corporate Banking Services Overview</li>
                                  <li>Electronic Banking For Your Business</li>
                                  <li> LC Trade</li>                                                                    
                               </ul>
                            </div>
                                  <div class="ratings">
                                  <p class="pull-right">15 reviews</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                          <img class="sealImage" alt="No image" src="./img/corporat.jpg">
                            <div class="caption">
                              <h4><a class="btn btn-outline-success btn-lg" href="#">Corporate Banking</a></h4>
                                <p>our Activity <a target="_blank" href="http://www.bootsnipp.com">http://phphyperteam.com</a>.</p>
                              <ul>
                                  <li>Corporate Banking Services Overview</li>
                                  <li>Electronic Banking For Your Business</li>
                                  <li> LC Trade</li>                                                                    
                               </ul>
                            </div>
                                  <div class="ratings">
                                  <p class="pull-right">15 reviews</p>
                            </div>
                        </div>
                    </div>
              </div>
          </div>
        </div>
     
    </section>

<section id="about">
      <div class="container">
        
          <div class="col-lg-8 mx-auto">
            <h2><a href="#demo" data-toggle="collapse" class="btn btn-outline-warning btn-lg">About us</h2></a>
              <div id="demo" class="collapse">
            <p class="lead">The Electronic-Banking Division was established in 2002 to undertake rapid automation and bring modern banking services into this field. Full automation was completed in 2003 and hereby introduced plastic money to the Bangladeshi masses. Dutch Bangla Bank also operates the nation's largest ATM fleet and in the process drastically cut consumer costs and fees by 80%. Moreover, Dutch Bangla Bank choosing the low profitability route for this sector has surprised many critics. </p>
          </div>
          </div>
      </div>
    </section>

    <section id="contact" class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="btn btn-outline-warning btn-lg">Contact us</h2>
            <p class="lead"> Our Team will plised to sere you Leave a message for us.</p>
				<?php 
					if(isset($_SESSION['success'])){
					echo "<div class='alert-success text-center btn-lg'>".$_SESSION['success']."</div>";
					echo "<script>window.location.href='#contact'</script>";
					}
					unset($_SESSION['success']);
					?>

              <form id="newLetter" method="post" action="../actions/news_letter.php">
              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" name="email" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="message">Your Message:</label>
                <textarea class="form-control" name="message" id="msg"></textarea>
               
              </div>
                                                     
              <button type="submit" class="btn btn-outline-secondary btn-sm">Submit</button>
            </form>
        </div>
        </div>
      </div>
    </section>
</div><!--container closed--->
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Team Bank managrment 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../assets/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>
    <script src="../assets/jquery/jquery.validation.js" type="text/javascript"></script>
    <script>
	// Newsletter Validation
		$(document).ready(function() {
            $("#newLetter").validate({
				rules:{
					email: {
						required: true,
						email: true
					},
					message: {
						required: true	
					}
				},
				messages: {
					email:{
						required: "<span class='text-danger' style='font-size:14px;'>Please enater your email</span>",
						email: "<span class='text-danger' style='font-size:14px;'>Please enater a valid email</span>"
					},
					message: {
						required: "<span class='text-danger' style='font-size:14px;'>Please throw some message here.</span>"	
					}
				}
			});
	});
// Login Validation
$(document).ready(function() {
	$("#custLog").validate({
			rules:{
				accNo: {
					required: true
				},
				password: {
					required: true	
				}
			},
			messages: {
				accNo:{
					required: "<span class='text-danger' style='font-size:14px;'>Please your account number</span>"
				},
				password: {
					required: "<span class='text-danger' style='font-size:14px;'>Please enter you password.</span>"	
				}
			}
		});
});
// Customer Reg Validation
$(document).ready(function() {
			$("#custReg").validate({
				rules:{
					accNo: {
						required: true
					},
					pin:{
						required: true
					},
					password: {
						required: true,
						minlength: 6,
							
					},
					confpass:{
						required:true,
						equalTo: '#password',
						minlength:6,
					}
				},
				messages: {
					accNo: {
						required:"<span class='text-danger' style='font-size:14px;'>Please your account number</span>"
					},
					pin: {
						required: "<span class='text-danger' style='font-size:14px;'>Please your PIN</span>"
					},
					password: {
						required: "<span class='text-danger' style='font-size:14px;'>Please Enter a password</span>",
						minlength: "<span class='text-danger' style='font-size:14px;'>Password should be at least 6 characters</span>",	
					},
					confpass:{
						required:"<span class='text-danger' style='font-size:14px;'>Confirm your password</span>",
						equalTo:"<span class='text-danger' style='font-size:14px;'>Password doesn't match</span>"
							
					}
				}
			});
        });
	</script>

  </body>

</html>
