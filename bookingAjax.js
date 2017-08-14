var xhr = createRequest();
var checkValueUrl = "bookingProcess.php";
var confirmBooking = "bookingConfirm.php";

function makeBookingTaxi(displayStatus, uName, uPhone, pUnit, pStNum, pStName, pSuburb, dUnit, dStNum, dStName, dSuburb, pDateTime) {
	
	var cntValue = chkValueCount();
	if(xhr && cntValue == 9) {
	
		var pickDate = pDateTime.slice(0, 10);
		var pickTime = pDateTime.slice(11, 16);
		var pickDateTime = pickDate+" "+pickTime+":"+new Date().getSeconds();
		
		var requestbody ="uCustName="+encodeURIComponent(uName)+"&usrPhone="+encodeURIComponent(uPhone)+"&pickUnit="+encodeURIComponent(pUnit)+"&pickStNo="+encodeURIComponent(pStNum)+"&pickStName="+encodeURIComponent(pStName)+"&pickSuburb="+encodeURIComponent(pSuburb)+"&destUnit="+encodeURIComponent(dUnit)+"&destStNo="+encodeURIComponent(dStNum)+"&destStName="+encodeURIComponent(dStName)+"&destSuburb="+encodeURIComponent(dSuburb)+"&pickUpDateTime="+pickDateTime;
		
		xhr.open("POST", confirmBooking, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4 && xhr.status == 200) {
				//clearDataCheck();
				document.getElementById(displayStatus).innerHTML = xhr.responseText;
		    }
		};
		xhr.send(requestbody);
	}else{
		document.getElementById(displayStatus).innerHTML = "<h3><Center><font color='orange'>Please check the all booking information correctly!</font></Center></h3>";
		alert("Please check the all booking information correctly!");
	}
}

function checkValue(chkValue, showValidated){
	
	if(chkValue.trim() == ""){
		document.getElementById(showValidated).innerHTML = "<font color='orange'>Please insert here!</font>";
	}else{
		xhr.open("POST", checkValueUrl, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		
		xhr.onreadystatechange = function(){
			if ((xhr.readyState == 4) && (xhr.status == 200)){
				document.getElementById(showValidated).innerHTML = xhr.responseText;
			}
		};
		xhr.send(showValidated +"="+ chkValue);
	}
	
	return document.getElementById(showValidated).innerHTML;
}

function clearDataCheck(){
	document.getElementById("chkCustName").innerHTML = "";
	document.getElementById("chkPhone").innerHTML = "";
	document.getElementById("chkPickStNo").innerHTML = "";
	document.getElementById("chkPickStName").innerHTML = "";
	document.getElementById("chkPickSuburb").innerHTML = "";
	document.getElementById("chkDestStNo").innerHTML = "";
	document.getElementById("chkDestStName").innerHTML = "";
	document.getElementById("chkDestSuburb").innerHTML = "";
	document.getElementById("chkBookingTime").innerHTML = "";
	document.getElementById("bookingStatus").innerHTML = "";
}

function getCurrentTime() 
{
	document.getElementById("gDateTime").defaultValue = getNzTime();
}

function getNzTime()
{
	var currDate = new Date();
	var cMonth = (currDate.getMonth()+1).toString();
	
	if(cMonth.length == 1){
		cMonth = "0"+cMonth;
	}
	var cDate = (currDate.getDate()).toString();
	if(cDate.length == 1){
		cDate = "0"+cDate;
	}
	var cHour = (currDate.getHours()).toString();
	if(cHour.length == 1){
		cHour = "0"+cHour;
	}
	var cMin = (currDate.getMinutes()).toString();
	
	if(cMin.length == 1){
		cMin = "0"+cMin;
	}
	
	var currNzDateTime = currDate.getFullYear().toString()+"-"+cMonth+"-"+cDate+"T"+cHour+":"+cMin;
	
	return currNzDateTime;
}

function chkValueCount(){
	var status = [];
	var chkCnt = document.getElementsByTagName("span");
	for(i = 0; i < chkCnt.length-1; i++){
		status[i] = chkCnt[i];
	}
	var valCnt = 0;
	for(j = 0; j < status.length; j++){
		var row = status[j].outerHTML;
		if(row.search("Checked") != -1)
			valCnt = valCnt + 1;
	}
	return valCnt;
}

setInterval(function(){ getCurrentTime(); }, 1000);