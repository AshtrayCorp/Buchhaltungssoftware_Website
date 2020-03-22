<!DOCTYPE html>


<?php
	$amount = $_POST['AMOUNT'];
	$category = $_POST['CATEGORY'];
	$account = $_POST['ACCOUNT'];
	
	echo $amount, $category, $account;
	
	$timestamp = DATE("Y-M-D H:I:S");
	$date = DATE("Y-M-D");
	
	if($amount != "0") 
		{
		include 'db_connection.php';
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		
		$accid_query = "SELECT ID FROM DB_ACCOUNTS WHERE DESCRIPTION = '".$account."';";
		$catid_query = "SELECT ID FROM MAP_TRX_CATEGORY WHERE CATEGORY_KEY = '".$category."';";#
		
		$resultaccid =mysqli_query($conn, $accid_query);
		$resultcatid = mysqli_query($conn, $catid_query);
		
		while($categoryid = mysqli_fetch_assoc($resultcatid) && $accountid = mysqli_fetch_assoc($resultaccid))
			{
			$trxsubmit_query = "INSERT INTO db_transactions(TX_DATE, TX_TIMESTAMP, AMOUNT, ID_TRX_CATEGORY, ID_ACCOUNT) VALUES (".$date.",".$timestamp.",".$amount.",".$categoryid.",".$accountid."); ";
			mysqli_query($conn, $trxsubmit_query);
			}
		}
?>