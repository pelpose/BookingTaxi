<?php
	//================= Booking Saving Page =================//

		// Validate Customer Name (Letters Only)
		$uName = $_POST['chkCustName'];
		if(trim($uName) != ""){
			if(preg_match('/^[a-zA-Z ]*$/', $uName)){
				echo "<img src='okValue.png' alt='Validated' style='width:17px;height:17px;'><font color='green' size='2'>Checked</font>";
			}else{
				echo "<font color='orange'>Insert Letters Only</font>";
			}
		}
		
		$uPhone = $_POST['chkPhone'];
		if(trim($uPhone) != ""){
			if(preg_match('/^[0-9]*$/', $uPhone)){
				echo "<img src='okValue.png' alt='Validated' style='width:17px;height:17px;'><font color='green' size='2'>Checked</font>";
			}else{
				echo "<font color='orange'>Insert Numbers Only</font>";
			}
		}

		// Validate Pick-up Unit Number
		$pUnitNo = $_POST['pickUnit'];
		
		// Validate Pick-up Street Number (Numbers Only)
		$pStNo = $_POST['chkPickStNo'];
		if(trim($pStNo) != ""){
			if(preg_match('/^[0-9]*$/', $pStNo)){
				echo "<img src='okValue.png' alt='Validated' style='width:17px;height:17px;'><font color='green' size='2'>Checked</font>";
			}else{
				echo "<font color='orange'>Insert Numbers Only</font>";
			}
		}
		
		// Validate Pick-up Street Name (Letters and Space Only)
		$pStName = $_POST['chkPickStName'];
		if(trim($pStName) != ""){
			if(preg_match('/^[a-zA-Z ]*$/', $pStName)){
				echo "<img src='okValue.png' alt='Validated' style='width:17px;height:17px;'><font color='green' size='2'>Checked</font>";
			}else{
				echo "<font color='orange'>Insert Letters and Space Only</font>";
			}
		}
		
		// Validate Pick-up Suburb (Letters and Space Only)
		$pSuburb = $_POST['chkPickSuburb'];
		if(trim($pSuburb) != ""){
			if(preg_match('/^[a-zA-Z ]*$/', $pSuburb)){
				echo "<img src='okValue.png' alt='Validated' style='width:17px;height:17px;'><font color='green' size='2'>Checked</font>";
			}else{
				echo "<font color='orange'>Insert Letters and Space Only</font>";
			}
		}

		// Validate Destination Unit Number
		$dUnitNo = $_POST['destUnit'];
		
		// Validate Destination Street Number (Numbers Only)
		$dStNo = $_POST['chkDestStNo'];
		if(trim($dStNo) != ""){
			if(preg_match('/^[0-9]*$/', $dStNo)){
				echo "<img src='okValue.png' alt='Validated' style='width:17px;height:17px;'><font color='green' size='2'>Checked</font>";
			}else{
				echo "<font color='orange'>Insert Numbers Only</font>";
			}
		}
		
		// Validate Destination Street Name (Letters and Space Only)
		$dStName = $_POST['chkDestStName'];
		if(trim($dStName) != ""){
			if(preg_match('/^[a-zA-Z ]*$/', $dStName)){
				echo "<img src='okValue.png' alt='Validated' style='width:17px;height:17px;'><font color='green' size='2'>Checked</font>";
			}else{
				echo "<font color='orange'>Insert Letters and Space Only</font>";
			}
		}
		
		// Validate Destination Suburb (Letters and Space Only)
		$dSuburb = $_POST['chkDestSuburb'];
		if(trim($dSuburb) != ""){
			if(preg_match('/^[a-zA-Z ]*$/', $dSuburb)){
				echo "<img src='okValue.png' alt='Validated' style='width:17px;height:17px;'><font color='green' size='2'>Checked</font>";
			}else{
				echo "<font color='orange'>Insert Letters and Space Only</font>";
			}
		}
		
		// Validate Booking Date&Time (After current date&time Only)
		$bookingTime = $_POST['chkBookingTime'];
		if(trim($bookingTime) != ""){
			$curDateTime = date("Y-m-d H:i:s");
			$newDateTime = substr($bookingTime,0,10)." ".substr($bookingTime,11,5).date(":s");
			$chgCurDateTime = strtotime($curDateTime)+(12*60*60);
			$chgNewDateTime = strtotime($newDateTime)+(12*60*60);
			if($chgCurDateTime + 60 > $chgNewDateTime){
				echo "<font color='orange'>Later than current date/time Only</font>";
			}else{
				echo "<img src='okValue.png' alt='Validated' style='width:17px;height:17px;'><font color='green' size='2'>Checked</font>";
			}
		}
?>
