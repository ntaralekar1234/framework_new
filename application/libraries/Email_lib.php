<?php 
class Email_lib {

    public function __construct() {     
     require_once APPPATH.'libraries/PHPMailer/PHPMailerAutoload.php';
    }

    public function SendMail($subject,$body,$email) {
      $mail = new PHPMailer(); // create a new object
      $mail->IsSMTP(); // enable SMTP
      //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
      $mail->SMTPAuth = true; // authentication enabled
      $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
      $mail->Host = "cs-mum-4.webhostbox.net";
      $mail->Port = 587; // or 587
      $mail->IsHTML(true);
      $mail->Username = "webtest@webetron.com";
      $mail->Password = "WebTest@123";
      $mail->SetFrom("webtest@webetron.com");

      $mail->Subject = $subject;
      $mail->msgHTML($body);
      $mail->AddAddress($email);
      if($mail->Send()){
        return true;
      }else{
        return false;
      }
    }


 }