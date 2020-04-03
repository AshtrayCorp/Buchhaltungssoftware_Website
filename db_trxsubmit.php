<!DOCTYPE html>


<?php

	$DB = new PDO('mysql:host=localhost;dbname=buchhaltung;charset=utf8', 'pdo_user', 'buchhaltung');

	$amount = $_POST['AMOUNT'];
	$category = $_POST['CATEGORY'];
	$account = $_POST['ACCOUNT'];
	$catid = "";
	$accid = "";
	echo $amount, $category, $account;
	
	$timestamp = DATE("Y-M-D H:I:S");
	$date = DATE("Y-M-D");
	
	if($amount != "0") 
		{
		$accid_query = $DB->query("SELECT ID FROM DB_ACCOUNTS WHERE DESCRIPTION = '.$account.';");
		while ($accid_row = $accid_query->fetch(PDO::FETCH_ASSOC)){
			if(isset($accid_row["DESCRIPTION"])){
				$accid = $accid_row['DESCRIPTION'];
			}
			else {
				echo "ERROR";
			}
		}
		}
		
		//$catid_query = "SELECT ID FROM MAP_TRX_CATEGORY WHERE CATEGORY_KEY = '".$category."';";
		
		
		echo $catid ;
		echo $accid ;
		//echo $amount;
		
		/*while($categoryid = mysqli_fetch_assoc($resultcatid) && $accountid = mysqli_fetch_assoc($resultaccid))
			{
			$trxsubmit_query = "INSERT INTO db_transactions(TX_DATE, TX_TIMESTAMP, AMOUNT, ID_TRX_CATEGORY, ID_ACCOUNT) VALUES (".$date.",".$timestamp.",".$amount.",".$categoryid.",".$accountid."); ";
			mysqli_query($conn, $trxsubmit_query);
			}*/
		
?>