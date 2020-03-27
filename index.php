<!DOCTYPE html>

<html lang="ger" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Buchhaltungssoftware INDEX V2</title>
	</head>
	
	<body>
	
	<h1>Transaktionserfassung</h1>
	<hr>

	<form action="db_trxsubmit.php" method="post">		
		<p1>Betrag:</p1> <br>
		<input type="number" name="AMOUNT" step="0.01" value="trxamount"> <br>
		
		<?php
			$DB = new PDO('mysql:host=localhost;dbname=buchhaltung;charset=utf8', 'pdo_user', 'buchhaltung');
			echo '<p2> Kategorie </p2> <br>';
			echo '<select name="CATEGORY" id="CATEGORY">';
			$trxcatquery = 'SELECT CATEGORY_KEY FROM MAP_TRX_CATEGORY;';
			foreach($DB->query($trxcatquery) as $row){
					echo '<option value="'.$row["CATEGORY_KEY"].'">'.$row["CATEGORY_KEY"].'</option>';
				}
			echo '</select> <br>'; 
			
			echo '<p3> Konto </p3> <br>';
			echo '<select name="ACCOUNT" id="ACCOUNT">';
			$accquery = 'SELECT DESCRIPTION FROM DB_ACCOUNTS;';
			foreach($DB->query($accquery) as $row){
				echo'<option value="'.$row["DESCRIPTION"].'">'.$row["DESCRIPTION"].'</option>';
			}
			echo '</select>';
		?> 
		<br> 
		<br>
		<input type="submit" value="Transaktion hinzufügen" id="submit">
	</form>
	

	</body>
</html>