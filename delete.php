<?php

if (isset($_GET['Id'])) {
	$getId = $_GET['Id'];

include("Data.php");

DataAccess::DeletePhrase($getId);

header("location:dashboard.php");


}


?>