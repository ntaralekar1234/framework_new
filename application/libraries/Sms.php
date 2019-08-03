<?php
if(!defined('BASEPATH'))
	exit('No Direct Script Access Allowed');

class Sms
{
	function __construct()
	{
		
	}
	function sendSMS($mobileNumber, $message)
	{
		//log_message('Hay error ala re','in sendSMS');
		//Your authentication key				
		$authKey = "219469An3E4fGhf6gs5b1a021e";
				
		//Multiple mobiles numbers separated by comma
		$mobileNumber = '+91' . $mobileNumber;
				
		//Sender ID,While using route4 sender id should be 6 characters long.
		$senderId = "WATMOS";
				
		//Your message to send, Add URL encoding here.
		$message = urlencode($message);
				
		//Define route 
		//$route = "default";
		$route = 4;
				
		//Prepare you post parameters
		$postData = array(
			'authkey' => $authKey,
			'mobiles' => $mobileNumber,
			'message' => $message,
			'sender' => $senderId,
			'route' => $route
		);
				
		//API URL
		$url="https://control.msg91.com/api/sendhttp.php?unicode=1";
				
		// init the resource
		$ch = curl_init();
				
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $postData
			//,CURLOPT_FOLLOWLOCATION => true
		));

		//Ignore SSL certificate verification				
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		//get response				
		$output = curl_exec($ch);
			
		//Print error if any
		if(curl_errno($ch))
		{
			curl_close($ch);
			//return false;
			//echo 'error:' . curl_error($ch);
			log_message(curl_error($ch)." - Error in sending mail", 'error in sending mail');
		}
				
		curl_close($ch);
		if(!$output){
			log_message($output.'- Error in sending mail', 'error in sending mail');
			//return false;
		}
		//return true;
}
}
?>