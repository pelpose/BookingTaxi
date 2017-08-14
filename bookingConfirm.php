<?php
	//================= Connect to Database =================//
	require_once ('./settings.php');
	$conn = mysqli_connect($host, $user, $pswd, $dbnm);
	
	if(!$conn){
		echo "<h3>Please Check the Database Connection.</h3>";
	}else {

			// Validate Customer Name (Letters Only)
			$sUsrName = $_POST['uCustName'];
			$sUsrPhone = $_POST['usrPhone'];
			$sPickUnit = $_POST['pickUnit'];
			$sPickStNo = $_POST['pickStNo'];
			$sPickStName = $_POST['pickStName'];
			$sPickSuburb = $_POST['pickSuburb'];
			$sDestUnit = $_POST['destUnit'];
			$sDestStNo = $_POST['destStNo'];
			$sDestStName = $_POST['destStName'];
			$sDestSuburb = $_POST['destSuburb'];
			$pickDateTime = $_POST['pickUpDateTime'];
			$dPickDate = substr($pickDateTime, 0, 10);
			$dPickTime = substr($pickDateTime, 11, 16);
			
			$cRandBookingRef = substr($sUsrName, 0, 3) . rand(10000, 99999);
			$tableName = "TAXIBOOKING";

			//================= Create Table Query =================//
			$sqlCreateQuery = "CREATE TABLE IF NOT EXISTS ".$tableName." ("
								."BOOKING_CODE VARCHAR(8) PRIMARY KEY,"
								."CUST_NAME VARCHAR(50) NOT NULL,"
								."CUST_MOBILE INT NOT NULL,"
								."PICK_UNIT VARCHAR(20),"
								."PICK_STNO INT NOT NULL,"
								."PICK_STNAME VARCHAR(30) NOT NULL,"
								."PICK_SUBURB VARCHAR(30) NOT NULL,"
								."DEST_UNIT VARCHAR(20),"
								."DEST_STNO INT NOT NULL,"
								."DEST_STNAME VARCHAR(30) NOT NULL,"
								."DEST_SUBURB VARCHAR(30) NOT NULL,"
								."PICKUP_DATETIME VARCHAR(30) NOT NULL,"
								."BOOKING_STATUS VARCHAR(30) DEFAULT 'unassigned',"
								."BOOKING_DATETIME TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

			$sqlCreateResults = mysqli_query($conn, $sqlCreateQuery)
					or die("<h3><font color='orange'>Unable to create the table.</font></h3>");
					
			
			//================= Insert Query =================//
			$sqlQuery = "INSERT INTO ".$tableName."(BOOKING_CODE, CUST_NAME, CUST_MOBILE, PICK_UNIT, PICK_STNO, PICK_STNAME, PICK_SUBURB, DEST_UNIT, DEST_STNO, DEST_STNAME, DEST_SUBURB, PICKUP_DATETIME) VALUES('$cRandBookingRef', '$sUsrName', '$sUsrPhone', '$sPickUnit', '$sPickStNo', '$sPickStName', '$sPickSuburb', '$sDestUnit', '$sDestStNo', '$sDestStName', '$sDestSuburb', '$pickDateTime')";
			
			$sqlResults = @mysqli_query($conn, $sqlQuery)
					or die("<h3><font color='orange'>Unable to insert the data into the table.</font></h3>");

			// Show Booking Successful Message.
			echo "<h4><Center><font color='blue'>Thank you! Your booking reference number is <Strong>$cRandBookingRef</Strong>.<br> You will be picked up in front of your provided address <br> at $dPickTime on $dPickDate.</font></Center></h4>";
					
		//================= Close the connection =================//
		mysqli_close($conn);

	} // Database connection
?>
