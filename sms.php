<?php
class SMS{
	protected $userName='xxxxxxxxxx';
	protected $userPassword = 'xxxx';
	public function sendSMS($receiverNumber,$smsBody){
		try{
			$soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
			$paramArray = array(
				'userName' => $this->userName,
				'userPassword' => $this->userPassword,
				'mobileNumber' => $receiverNumber,
				'smsText' => $smsBody,
				'type' => "TEXT",
				'maskName' => '',
				'campaignName' => '',
			);
			$value = $soapClient->__call("OneToOne", array($paramArray));
			echo $value->OneToOneResult;
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}
}
?>