<?php
require_once("sms.php");
if(isset($_POST['btnSubmit']) && $_POST['btnSubmit']=='Send'){
	$mobileNumber = $_POST['receiverNumber'];
	$smsBody = $_POST['textSms'];
	$sms = new SMS();
	$sms->sendSMS($mobileNumber,$smsBody);
}
?>

<div>
	<form name="frmSms" method="post" action="index.php" onsubmit="return validateForm()">
		<div>
			<label>
				Receiver Mobile #
			</label>
			<input type="text" name="receiverNumber" id="receiverNumber" required="true">
		</div>
		<div>
			<label>
				Text SMS
			</label>
			<textarea name="textSms" id="textSms" required="true"></textarea>
		</div>
		<div><input type="submit" name="btnSubmit" id="btnSubmit" value="Send"></div>
	</form>
</div>

<script type="text/javascript">
	var checkMobileNo = function(mobileNumber){
		var phoneno = /^(?:\+?88)?01[15-9]\d{8}$/;
  		if(mobileNumber.match(phoneno)) {
		    return true;
	  	} else {
		    return false;
	  	}
	}

	var validateForm = function(){
		var mobileNumber = document.getElementById('receiverNumber').value;
		var textSms = document.getElementById('textSms').value;
		if(mobileNumber =='' || textSms == ''){
			alert("enter mobile Number and SMS ");
			return false;
		} 

		if(!checkMobileNo(mobileNumber)){
			alert("Enter valide mobile number");
			return false;
		} else{
			return true;
		}
	}
	
</script>