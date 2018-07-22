<?php require_once "../dbconfig.php";   ?>
<?php $id=$_REQUEST['polid']; ?>
<?php  
$con->set_charset("utf8");


$sql=$con->query("SELECT int_rate FROM loan_policies WHERE id='$id'");
$data = $sql->fetch_object();
 ?>

		 
		  <input type"text" name="rate" value="<?php echo $data->int_rate; ?>" class="form-control" />
   
       