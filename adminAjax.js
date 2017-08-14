var xhr = createRequest();
var checkValueUrl = "adminResults.php";

function searchBookingList(displayList, valBooking) {
	
	if(xhr) {
		
		xhr.open("POST", checkValueUrl, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4 && xhr.status == 200) {
				document.getElementById(displayList).innerHTML = xhr.responseText;
		    }
		};
		xhr.send("searchBookingRequest="+ valBooking);
	}
	
}

function assignBooking(showResult, refNo){
	
	if(refNo.trim() == ""){
		document.getElementById(showResult).innerHTML = "<h3><font color='orange'>Please check the reference number again!</font></h3>";
	}else if(refNo.length != "8"){
		document.getElementById(showResult).innerHTML = "<h3><font color='orange'>The reference number must contain 3 letters and 4 numbers!</font></h3>";
	}else{
		xhr.open("POST", checkValueUrl, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		
		xhr.onreadystatechange = function(){
			if ((xhr.readyState == 4) && (xhr.status == 200)){
				document.getElementById(showResult).innerHTML = xhr.responseText;
			}
		};
		xhr.send("assignRefNo="+ refNo);
	}
}
