<?php require_once "../dbconfig.php";   ?>
<?php $id=$_REQUEST['divid']; ?>
<?php  

$con->set_charset("utf8");

$districts=$con->query("SELECT * FROM district WHERE division_id='$id'") ?>
	
    	<option hidden="" value="">SELECT ONE</option>
        <?php  while ($dist=$districts->fetch_object()){?>
        <option value="<?php echo $dist->id; ?>"><?php echo $dist->name; ?></option>
        <?php   } ?>
   
       