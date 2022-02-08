<?php
session_start();
include("Data.php");
$getPass = new DataAccess();
$Password = $getPass->getPassword();
foreach ($Password as $newPass) {
	$pass = $newPass['Password'];
	
}

if (isset($_POST['send']) && $_POST['username']=="Curiousdarkarmy7@gmail.com" && htmlspecialchars(stripslashes(strip_tags(trim($_POST['password'])))) == $pass){
$_SESSION['user'] = $_POST['username'];

header("location:dashboard.php");


}else{
	header("location:admin.php");

 }

?>