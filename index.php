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
		<p>Betrag:</p>
		<input type="number" name="AMOUNT" step="0.01" value="trxamount"> <br>
		
		<?php
			include 'db_connection.php';
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			
			$trxcatquery = 'SELECT CATEGORY_KEY FROM MAP_TRX_CATEGORY;';
			$categories = mysqli_query($conn,$trxcatquery);
			echo "<p>Kategorieauswahl: </p>";
			echo '<select name="CATEGORY" id="CATEGORY">';
				while ($row = mysqli_fetch_assoc($categories)) {	//Aufteilen des Arrays in Kategorieoptionen
					foreach($row as $key => $category);
					echo '<option value="'.$category.'">'.$category.'</option>';
				}
			echo '</select> <br>';
			
			$accountsquery = 'SELECT DESCRIPTION FROM DB_ACCOUNTS;';
			$accounts = mysqli_query($conn, $accountsquery);
			echo "<p>Kontoauswahl: </p>";
			echo '<select name="ACCOUNT" id="ACCOUNT">';
				while ($row = mysqli_fetch_assoc($accounts)) {
					foreach($row as $key => $account);
					echo '<option value="'.$account.'">'.$account.'</option>';

				}
			echo '</select>';
			mysqli_close($conn);
		?> 
		<br> 
		<br>
		<input type="submit" value="Transaktion hinzufügen" id="submit">
	</form>
	

	</body>
</html>