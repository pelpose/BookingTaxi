<?php
	//================= Connect to Database =================//
	require_once ('./settings.php');
	$conn = mysqli_connect($host, $user, $pswd, $dbnm);
	
	if(!$conn){
		echo "<h3>Please Check the Database Connection.</h3>";
	}else {

		// Booking List TABLE
		$tableName = "TAXIBOOKING";

		// Booking Request Status (0: All, 1: unassigned, 2: assigned
		$sBookRequest = $_POST['searchBookingRequest'];
		if(trim($sBookRequest) != ""){

				//================= Select Query =================//
				$sqlSearchQuery = "SELECT BOOKING_CODE, CUST_NAME, CUST_MOBILE,"
							. "PICK_SUBURB, DEST_SUBURB, PICKUP_DATETIME "
							. "FROM $tableName "
							. "WHERE BOOKING_STATUS = '".$sBookRequest."'"
							. "ORDER BY PICKUP_DATETIME DESC";
							
				$sqlResults = @mysqli_query($conn, $sqlSearchQuery)
						or die("<h3>Unable to execute the query.</h3>"
						. "<h3>Error code " . mysqli_errno($conn)
						. ": " . mysqli_error($conn)
						. "</h3>");
					
					$numRows = mysqli_num_rows($sqlResults); // number of rows
					$numFields = mysqli_num_fields($sqlResults); // number of fields
					
					// Show how many rows and fields are exists.
					if ($numRows == 0 || $numFields == 0) {
						echo "<h3>There is no record with Booking Request '$pStatus'.</h3>";
					}
				
				// List of all searched results
				while($row = $sqlResults->fetch_assoc()) {
					
					echo "<table width='100%' border='1'>";
					echo "	<tr><td>";
					echo "<table width='780' class='tBody'>";
					echo "	<tr>";
					echo "		<td>Booking Reference No: ",$row["BOOKING_CODE"],"</td>";
					echo "	</tr>";
					echo "	<tr>";
					echo "		<td>Customer Name: ",$row["CUST_NAME"],"</td>";
					echo "	</tr>";
					echo "	<tr>";
					echo "		<td>Contact Number: ",$row["CUST_MOBILE"],"</td>";
					echo "	</tr>";
					echo "	<tr>";
					echo "		<td>Pick-Up Suburb: ",$row["PICK_SUBURB"],"</td>";
					echo "	</tr>";
					echo "	<tr>";
					echo "		<td>Destination Suburb: ",$row["DEST_SUBURB"],"</td>";
					echo "	</tr>";
					echo "	<tr>";
					echo "		<td>Pick-Up Date/Time: ",$row["PICKUP_DATETIME"],"</td>";
					echo "	</tr>";
					echo "</table>";
					echo "</td></tr>";
					echo "</table><br>";
				}
			
		} // end update booking request
		
		// Booking Reference Number (Letters and Alphabet Only)
		$sReferenceNo = $_POST['assignRefNo'];

		if(trim($sReferenceNo) != ""){
			if(!ctype_alnum($sReferenceNo)){
				echo "<font color='orange'>Please Insert Letters and Numbers Only</font>";
			}else{
					
				//================= Update Query =================//
				$sqlUpdateQuery = "UPDATE ".$tableName." SET BOOKING_STATUS = 'assigned' WHERE BOOKING_CODE = '".$sReferenceNo."' AND BOOKING_STATUS = 'unassigned'";
				
				$sqlResults = @mysqli_query($conn, $sqlUpdateQuery)
						or die("<h3><font color='orange'>Please Check the Booking Reference Number again.</font></h3>");

				// Show Booking Successful Message.
				echo "<h3><Center><font color='blue'>The booking request $sReferenceNo has been properly assigned.</font></Center></h3>";
				
			}
		} // end search Booking List
			
		//================= Close the connection =================//
		mysqli_close($conn);

	} // Database connection
?>
