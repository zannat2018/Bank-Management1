<?php
require_once "../dbconfig.php";

$divisions = $con->query("SELECT * FROM `division`");

$religions = $con->query("SELECT * FROM `religion`");

//$religion = $religions->fetch_object();
//print_r($religion);
?>